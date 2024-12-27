<?php

declare(strict_types=1);

namespace App\Contracts;

interface LoggerInterface
{
    /**
     * Logger constructor.
     *
     * @param string $logFile Path to the log file.
     */
    public function __construct(string $logFile);

    /**
     * Log a message with a specified level.
     *
     * @param string $level The log level (e.g., INFO, ERROR).
     * @param string $message The message to log.
     * @return void
     */
    public function log(string $level, string $message): void;

    /**
     * Log an informational message.
     *
     * @param string $message The message to log.
     * @return void
     */
    public function info(string $message): void;

    /**
     * Log a warning message.
     *
     * @param string $message The message to log.
     * @return void
     */
    public function warning(string $message): void;

    /**
     * Log an error message.
     *
     * @param string $message The message to log.
     * @return void
     */
    public function error(string $message): void;
}
