<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\FileController;
use App\Services\ServiceContainer;
use App\Providers\AppServiceProvider;

$container = new ServiceContainer();

// Register services
AppServiceProvider::register($container);

// Resolve the FileController
$fileController = $container->resolve(FileController::class);

$folderName = 'demo_folder';
$filePath = "{$folderName}/example.txt";
$content = "Hello, this is a demonstration of Service Container implementation!";

// Create a folder
$fileController->createFolder($folderName);

// Write to a file
$fileController->writeToFile($filePath, $content);

// Read from the file
$fileController->readFromFile($filePath);
