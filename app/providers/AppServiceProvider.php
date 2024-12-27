<?php

namespace App\Providers;

use App\Contracts\ContainerInterface;
use App\Contracts\LoggerInterface;
use App\Contracts\StorageInterface;
use App\Services\Logger;
use App\Services\Storage;

class AppServiceProvider
{
    public static function register(ContainerInterface $container): void
    {
        // Bind Logger as a singleton
        $container->singleton(LoggerInterface::class, fn () => new Logger());
        $container->bind(StorageInterface::class, Storage::class);

        // Bind other services...
    }
}
