<?php

namespace App\Service\Logger\Factory;

use App\Service\Logger\LoggerInterface;

class FileLogger implements LoggerInterface
{

    private $filePath;

    private $loggerType = 'file';

    public function __construct()
    {
        $this->filePath = config('logger.types.file.path');
    }

    /**
     * @param  string  $message
     *
     * @return void
     */
    public function send(string $message): void
    {
        file_put_contents($this->filePath, $message.PHP_EOL, FILE_APPEND);
    }

    /**
     * @param  string  $message
     * @param  string  $loggerType
     *
     * @return void
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->send($message);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->loggerType;
    }

    /**
     * @param  string  $type
     *
     * @return void
     */
    public function setType(string $type): void
    {
        $this->loggerType = $type;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        $content = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($content === false) {
            throw new \RuntimeException("Unable to read file: {$this->filePath}");
        }
        return $content;
    }

}
