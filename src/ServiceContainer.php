<?php


class ServiceContainer
{
    /**
     * Array to store bindings for services.
     * 
     * @var array  
     */
    private array $bindings = [];
    /**
     * Array to store singleton instances.
     * 
     * @var array  
     */
    private array $singletons = [];

    /**
     * Bind a service or class to the container.
     * 
     * @param string $abstract 
     * @param callable|string $concrete  
     * @return void
     */
    public function bind(string $abstract, callable|string $concrete): void
    {
        $this->bindings[$abstract] = $concrete;
    }
    /**
     * Bind a singleton service or class to the container.
     * 
     * @param string $abstract 
     * @param callable|string $concrete  
     * @return void
     */
    public function singleton(string $abstract, callable|string $concrete): void
    {
        $this->singletons[$abstract] = $concrete;
    }
}
