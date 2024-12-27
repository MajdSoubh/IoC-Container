# Lightweight PHP Service Container

A simple and lightweight Service Container implementation to manage dependencies in your PHP application. This container allows you to bind, resolve, and manage services with ease.

## Dependencies

- PHP 7.4+ (Supports typed properties and union types)
- Composer (Dependency management)

## Install

1. Clone the Repository

```shell
git clone https://github.com/MajdSoubh/IoC-Container
```

2. Go to the project directory

```bash
  cd IoC-Container
```

3. Install Dependencies
   **Ensure you have Composer installed, then run:**

```shell
composer install
```

4. Run the Application

```shell
php index.php
```

## How to Use

1. Bind a Service
   You can bind a service to the container using the bind method. It accepts an identifier (interface, abstract class, or string) and a concrete implementation.

```php
$container = new ServiceContainer\ServiceContainer();

// Bind a concrete class
$container->bind('logger', function () {
    return new Logger();
});
```

2. Bind a Singleton
   Use singleton to bind a service as a singleton, ensuring the same instance is used every time.

```php
$container->singleton('fileService', function () use ($container) {
    return new FileService($container->resolve('logger'));
});
```

3. Resolve a Service
   You can resolve a service from the container using its identifier. If the service depends on other classes, the container resolves those dependencies automatically.

```php
$logger = $container->resolve('logger'); // Resolves the Logger instance

$fileService = $container->resolve('fileService'); // Resolves FileService with Logger injected
```

4. Auto-Resolve Classes
   If a class is not explicitly bound, the container attempts to resolve it automatically by analyzing its constructor and injecting dependencies.

```php
$fileController = $container->resolve(App\Controllers\FileController::class);
// Automatically resolves FileController and injects FileService

```

Feel free to explore and enhance the implementation for your specific needs! 🎉
