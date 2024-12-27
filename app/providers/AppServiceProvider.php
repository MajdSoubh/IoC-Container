<?php

namespace App\Providers;

use App\Contracts\ContainerInterface;
use App\Services\Logger;

class AppServiceProvider
{
    public static function register(ContainerInterface $container): void
    {
        // Bind Logger as a singleton
        $container->singleton(Logger::class, fn () => new \App\Services\Logger());

        // Bind other services...
    }
}
