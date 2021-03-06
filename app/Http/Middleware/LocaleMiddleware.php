<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        // Set the laravel locale
        app()->setLocale(session()->get('locale'));

        // setLocale for php. Enables ->formatLocalized() with localized values for dates
        setlocale(LC_TIME, session()->get('locale'));

        // setLocale to use Carbon source locales. Enables diffForHumans() localized
        Carbon::setLocale(session()->get('locale'));

        /*
       * Set the session variable for whether or not the app is using RTL support
       * for the current language being selected
       * For use in the blade directive in BladeServiceProvider
       */
        if (session()->get('locale')) {
            session(['lang-rtl' => true]);
        } else {
            session()->forget('lang-rtl');
        }

        return $next($request);
    }
}
