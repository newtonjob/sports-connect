<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
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
        $this->registerResponseMacros();
        $this->registerCarbonMacros();
    }

    public function registerResponseMacros(): void
    {
        Response::macro('api', function ($response, $status = 200) {
            $format = ['status' => ($status < 400), 'title' => '', 'message' => '', 'data' => []];

            // For convenience, if $response is a string, we'll use it as the message...
            if (! is_array($response)) $response = ['message' => $response];

            return response(array_merge($format, $response), $status);
        });
    }

    public function registerCarbonMacros(): void
    {
        Carbon::macro('greet', function () {
            $hour = now()->format('H');

            if ($hour < 12) return 'Morning';

            if ($hour < 17) return 'Afternoon';

            return 'Evening';
        });
    }
}
