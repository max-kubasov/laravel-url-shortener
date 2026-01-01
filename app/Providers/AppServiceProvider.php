<?php

namespace App\Providers;


use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('shorten_links', function (Request $request) {
            if ($request->user()) {
                return Limit::perMinute(10)->by($request->user()->id);
            }

            // Логика для гостей (защита от IPv6 flood)
            $ip = $request->ip();

            // Если это IPv6, берем только первые 64 бита (подсеть /64)
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                // inet_pton преобразует IP в бинарную строку, substr берет первые 8 байт (64 бита)
                $ip = bin2hex(substr(inet_pton($ip), 0, 8));
            }

            return Limit::perMinute(3)->by($ip);

        });
    }
}
