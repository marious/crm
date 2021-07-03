<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ trans('default.login') }} - {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('before-styles')
    {{ style(mix('css/core.css')) }}
    {{ style(mix('css/fontawesome.css')) }}
    @stack('after-styles')
</head>
<body>

<div id="app">
    <app-auth-login previous-url="{{ url()->previous() }}" :config-data="{{ json_encode(config('settings.application')) }}"></app-auth-login>
</div>

<script>
    window.settings = <?php echo json_encode($settings ?? '') ?>
</script>
<script>
    window.localStorage.setItem('app-language', '<?php echo app()->getLocale() ?? "en"; ?>');
    window.localStorage.setItem('app-languages',
        JSON.stringify(
            <?php echo json_encode(include resource_path().DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.(app()->getLocale() ?? 'en').DIRECTORY_SEPARATOR.'default.php')?>
        )
    );
    window.localStorage.setItem('base_url', '<?php echo request()->root(); ?>');
</script>
@stack('before-scripts')
{!! script(mix('js/manifest.js')) !!}
{!! script(mix('js/vendor.js')) !!}
{!! script(mix('js/core.js')) !!}
@stack('after-scripts')
</body>
</html>
