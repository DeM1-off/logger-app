<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enum\Enum;
use App\Enum\LoggerEnum;
use App\Models\Logger\Logger;
use App\Service\Logger\LoggerFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i = 0; $i <= 10; ++$i) {
            LoggerFactory::createLogger(LoggerEnum::DATABASE->value);
            LoggerFactory::createLogger(LoggerEnum::EMAIL->value);
            LoggerFactory::createLogger(LoggerEnum::FILE->value);
        }
    }
}
