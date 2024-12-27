<?php

namespace App\Controllers;

use App\Contracts\StorageInterface;

/**
 * FileController class.
 *
 * This class handles file-related operations, delegating the actual file system interactions 
 * to a dedicated StorageInterface.
 */
class FileController
{
    /**
     * @var StorageInterface The storage service.
     */
    private StorageInterface $fileService;

    /**
     * Constructs a new FileController instance.
     *
     * @param StorageInterface $fileService The storage service to use.
     */
    public function __construct(StorageInterface $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * Creates a new folder.
     *
     * @param string $folderName The name of the folder to create.
     *
     * @return void
     */
    public function createFolder(string $folderName): void
    {
        $this->fileService->createFolder($folderName);
    }

    /**
     * Writes content to a file.
     *
     * @param string $filePath The path to the file.
     * @param string $content The content to write to the file.
     *
     * @return void
     */
    public function writeToFile(string $filePath, string $content): void
    {
        $this->fileService->writeFile($filePath, $content);
    }

    /**
     * Reads content from a file.
     *
     * @param string $filePath The path to the file.
     *
     * @return void
     */
    public function readFromFile(string $filePath): void
    {
        $content = $this->fileService->readFile($filePath);
        echo "File Content: {$content}" . PHP_EOL;
    }

    /**
     * Deletes a file.
     *
     * @param string $filePath The path to the file.
     *
     * @return void
     */
    public function deleteFile(string $filePath): void
    {
        $this->fileService->deleteFile($filePath);
    }
}
