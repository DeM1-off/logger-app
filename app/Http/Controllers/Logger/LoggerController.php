<?php

namespace App\Http\Controllers\Logger;

use App\Http\Controllers\Controller;
use App\Service\Logger\LoggerFactory;

class LoggerController extends Controller
{

    private  string  $defaultLoggerType;

    public function __construct()
    {
        $this->defaultLoggerType = config('logger.default');
    }

    /**
     * Sends a log message to the default logger.
     */
    public function log(): array
    {
        return LoggerFactory::createLogger($this->defaultLoggerType);
    }

    /**
     * Sends a log message to a special logger.
     *
     * @param  string  $type
     */
    public function logTo(string $type): array|string
    {
        try {
            return LoggerFactory::createLogger($type);
        } catch (\InvalidArgumentException $e) {
            return "Invalid logger type.";
        }
    }


    /**
     * Sends a log message to all loggers.
     */
    public function logToAll(): array
    {
        $loggerTypes = config('logger.types');
        $content = [];
        foreach ($loggerTypes as $type => $config) {
            $loggerClass = $config['class'];
            $logger = new $loggerClass();
            $logger->sendByLogger($config['message'], $type);
            $content[] = $logger->getContent();
        }
        return $content;
    }

}
