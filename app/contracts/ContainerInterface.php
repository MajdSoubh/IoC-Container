<?php

declare(strict_types=1);

namespace App\Contracts;

interface ContainerInterface
{
    /**
     * Bind a service or class to the container.
     * 
     * @param string $abstract 
     * @param callable|string $concrete  
     * @return void
     */
    public function bind(string $abstract, object|callable|string $concrete): void;

    /**
     * Bind a singleton service or class to the container.
     * 
     * @param string $abstract 
     * @param callable|string $concrete  
     * @return void
     */
    public function singleton(string $abstract, object|callable|string $concrete): void;

    /**
     * Resolve a service or class from the container.
     * 
     * @param string $abstract 
     * @return object
     */
    public function resolve(string $abstract): object;
}
