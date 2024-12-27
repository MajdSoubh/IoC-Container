<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\LoggerInterface;
use App\Contracts\StorageInterface;

class Storage implements StorageInterface
{
    /**
     * Logger instance for logging events.
     *
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * Constructs a new Storage instance.
     *
     * @param LoggerInterface $logger The logger instance to use for logging events.
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function createFolder(string $folderName): void
    {
        if (!is_dir($folderName))
        {
            mkdir($folderName, 0755, true);
            $this->logger->info("Folder created: {$folderName}");
        }
        else
        {
            $this->logger->warning("Folder already exists: {$folderName}");
        }
    }

    public function writeFile(string $filePath, string $content): void
    {
        file_put_contents($filePath, $content);
        $this->logger->info("Content written to file: {$filePath}");
    }

    public function readFile(string $filePath): string
    {
        if (!file_exists($filePath))
        {
            $this->logger->warning("File not found: {$filePath}");
            return '';
        }

        $content = file_get_contents($filePath);
        $this->logger->info("Content read from file: {$filePath}");
        return $content;
    }

    public function deleteFile(string $filePath): void
    {
        if (file_exists($filePath))
        {
            unlink($filePath);
            $this->logger->info("File deleted: {$filePath}");
        }
        else
        {
            $this->logger->warning("File not found: {$filePath}");
        }
    }
}
