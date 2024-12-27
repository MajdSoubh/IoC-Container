<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Services\ServiceContainer;
use App\Providers\AppServiceProvider;

interface IUser
{
    public function print(): void;
}
class User implements IUser
{
    static $counter = 0;
    public function __construct(Profile $name)
    {
        static::$counter++;
    }

    public function print(): void
    {
        echo 'User ' . static::$counter . PHP_EOL;
    }
}
class Profile implements IUser
{
    static $counter = 0;
    public function __construct(string $name = 's')
    {
        static::$counter++;
    }

    public function print(): void
    {
        echo 'Profile ' . static::$counter . PHP_EOL;
    }
}
$container = new ServiceContainer();
AppServiceProvider::register($container);

// $reflection = new ReflectionMethod(User::class, 'print');

// $ps = $reflection->getParameters();
// var_dump($ps[0]->getType()->isBuiltin());
// $u = new User(new Profile());

// $ioc->singleton(User::class);
$container->singleton(IUser::class, User::class);
// var_dump(($container->resolve(User::class)));


($container->resolve(IUser::class))->print();
($container->resolve(IUser::class))->print();
// ($ioc->resolve(User::class))->print();
// var_dump(ServiceContainer::$resolving);
// ($ioc->resolve(User::class))->print();
// ($ioc->resolve(User::class))->print();
