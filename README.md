# Laravel v10.32.1 (PHP v8.2.12)

## Logger
-  config
-  middleware
-  enum
-  model

## Using Files

- migration  loggers
- config     logger.php
- Model      Logger.php
- Controller LoggerController.php
- Services   LoggerInterface.php,LoggerFactory.php,DatabaseLogger.php,EmailLogger.php,FileLogger.php
- Enum       LoggerEnum.php
- Added      In factory pattern Service

## Requirements

- PHP >= 8.1

## Installation

- Just clone the project to anywhere in your computer.
- composer install
- ./vendor/bin/sail up  <br>
- ./vendor/bin/sail artisan migrate
- ./vendor/bin/sail artisan db:seed

Now you are done.

# Setting  DEFAULT .env
- LOG_DEFAULT=file
- LOG_EMAIL_ADDRESS=example@example.com
<br>

`http://localhost` serve start.
`http://localhost:8025/` check send email.

## Routing

- Sends a log message to the default logger.
  'http://localhost/log'
- Sends a log message to a special logger.
  'http://localhost/log/to/{type}
- Sends a log message to all loggers.
  'http://localhost/log/to-all'

# If you want to expand logging, then you need to create a new NameLogger based on the principles of the existing ones and add it to the configuration logger.php.
