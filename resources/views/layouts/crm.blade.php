<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon-16x16.png') }}">
    @include('layouts.includes.header')
</head>
<body>
<div id="app">
    <div class="container-scroller">
        <!-- Top Navbar -->
        @section('nav-bar')
            @include('layouts.includes.navbar')
        @show
        <!--Sidebar-->
        @section('side-bar')
            @include('layouts.includes.sidebar')
        @show
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <!--Contents-->
                @yield('contents')
            </div>
        </div>
    </div>
</div>

@guest()
    <script>
        window.localStorage.removeItem('permissions');
    </script>
@endguest
@auth
    <script>
        window.localStorage.setItem('permissions', JSON.stringify(
            <?php echo json_encode(array_merge(
                    resolve(\App\Repositories\Core\Auth\UserRepository::class)->getPermissionsForFrontEnd(),
                    [
                        'is_app_admin' => auth()->user()->isAppAdmin(),
                    ]
                )
            )
            ?>
        ));
        window.onload = function () {
            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth'
            })
        };
    </script>
@endauth

<script>
    window.localStorage.setItem('app-languages',
        JSON.stringify(
            <?php echo json_encode(include resource_path() . DIRECTORY_SEPARATOR . 'lang' . DIRECTORY_SEPARATOR . (app()->getLocale() ?? 'en') . DIRECTORY_SEPARATOR . 'default.php')?>
        )
    );

    window.localStorage.setItem('base_url', '<?php echo request()->root(); ?>');
</script>
<script>
    window.settings = <?php echo json_encode($settings) ?>
</script>
<script>
    window.localStorage.setItem('app-language', '<?php echo app()->getLocale() ?? "en"; ?>');
    window.appLanguage = window.localStorage.getItem('app-language');
    window.user = <?php echo auth()->user()->load('profilePicture', 'roles') ?>
</script>
@include('layouts.includes.footer')
</body>
</html>
