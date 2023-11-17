<?php

namespace App\Service\Logger\Factory;

use App\Models\Logger\Logger;
use App\Service\Logger\LoggerInterface;
use Illuminate\Support\Str;

class DatabaseLogger implements LoggerInterface
{
    private $loggerType = 'database';

    /**
     * @param  string  $message
     *
     * @return void
     */
    public function send(string $message): void
    {
        Logger::create([
          'message' => $message,
        ]);
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->send($message);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return  $this->loggerType;
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
       return  Logger::all()->toArray();
    }

}
