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

@stack('before-scripts')
{!! script(mix('js/manifest.js')) !!}
@stack('after-scripts')
</body>
</html>
