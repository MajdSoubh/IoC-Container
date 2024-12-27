<?php

namespace App\Providers;

use App\Contracts\ContainerInterface;
use App\Contracts\LoggerInterface;
use App\Services\Logger;

class AppServiceProvider
{
    public static function register(ContainerInterface $container): void
    {
        // Bind Logger as a singleton
        $container->singleton(LoggerInterface::class, fn () => new Logger());

        // Bind other services...
    }
}
