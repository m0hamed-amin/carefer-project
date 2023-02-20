<?php

namespace App\Booking\Providers;

use App\Booking\Services\BookingService;
use App\Booking\Services\BookingServiceInterface;
use App\Booking\Services\UserService;
use App\Booking\Services\UserServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProviders extends ServiceProvider implements DeferrableProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BookingServiceInterface::class, BookingService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            BookingServiceInterface::class,
            UserServiceInterface::class,
        ];
    }
}

