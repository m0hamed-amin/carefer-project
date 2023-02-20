<?php

namespace App\Booking\Providers;

use App\Booking\Repositories\BookingRepository;
use App\Booking\Repositories\BookingRepositoryInterface;
use App\Booking\Repositories\UserRepository;
use App\Booking\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RepositoryProviders extends ServiceProvider implements DeferrableProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            BookingRepositoryInterface::class,
            UserRepositoryInterface::class,
        ];
    }
}
