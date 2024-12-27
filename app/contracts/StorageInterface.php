<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Contracts\LoggerInterface;

interface StorageInterface
{
    public function __construct(LoggerInterface $logger);

    /**
     * Create a new folder.
     * 
     * @param string $folderName
     * @return void
     */
    public function createFolder(string $folderName): void;

    /**
     * Write content to a file.
     * 
     * @param string $filePath
     * @param string $content
     * @return void
     */
    public function writeFile(string $filePath, string $content): void;

    /**
     * Read content from a file.
     * 
     * @param string $filePath
     * @return string
     */
    public function readFile(string $filePath): string;

    /**
     * Delete a file.
     * 
     * @param string $filePath
     * @return void
     */
    public function deleteFile(string $filePath): void;
}
