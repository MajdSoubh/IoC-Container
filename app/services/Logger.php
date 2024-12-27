<?php

namespace App\Services;

use App\Contracts\LoggerInterface;

class Logger implements LoggerInterface
{
    /**
     * Path to the log file.
     *
     * @var string
     */
    private string $logFile;

    public function __construct(string $logFile = __DIR__ . '/../../logs/app.log')
    {
        $this->logFile = $logFile;

        // Ensure the log directory exists.
        $logDir = dirname($this->logFile);
        if (!is_dir($logDir))
        {
            mkdir($logDir, 0755, true);
        }
    }

    public function log(string $level, string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $formattedMessage = "[{$timestamp}] [{$level}] {$message}" . PHP_EOL;

        file_put_contents($this->logFile, $formattedMessage, FILE_APPEND);
    }

    public function info(string $message): void
    {
        $this->log('INFO', $message);
    }


    public function warning(string $message): void
    {
        $this->log('WARNING', $message);
    }

    public function error(string $message): void
    {
        $this->log('ERROR', $message);
    }
}
