<?php

namespace App\Service\Logger;

class LoggerFactory
{

    /**
     * @param  string  $loggerType
     *
     * @return array
     */
    public static function createLogger(string $loggerType): array
    {
        $config = config("logger.types.$loggerType");

        if (!$config) {
            throw new \InvalidArgumentException("Invalid logger type: $loggerType");
        }
        $class = $config['class'];
        $logger = new $class();
        $logger->sendByLogger($config['message'], $loggerType);
        return $logger->getContent();
    }

}
