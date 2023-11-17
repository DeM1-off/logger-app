<?php

namespace App\Service\Logger\Factory;

use App\Service\Logger\LoggerInterface;
use Illuminate\Support\Facades\Mail;

class EmailLogger implements LoggerInterface
{
    private $email;
    private $loggerType = 'email';
    private $filePath;


    public function __construct()
    {
        $this->email =  config('logger.types.email.email');
        $this->filePath = config('logger.types.email.path');

    }

    public function send(string $message): void
    {
        try {
        Mail::raw($message, function ($mail) {
            $mail->to($this->email)
              ->subject('Log Message');
        });
            file_put_contents($this->filePath, $message.PHP_EOL, FILE_APPEND);
        } catch (\Exception $e) {
            file_put_contents($this->filePath, $message.PHP_EOL, FILE_APPEND);
        }
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->send($message);
    }

    public function getType(): string
    {
        return $this->loggerType;
    }

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
