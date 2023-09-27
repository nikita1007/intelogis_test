<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(KladrTableSeeder::class);
        $this->command->info('Таблица кладров загружена данными!');
    
        $this->call(SlowDeliveryTableSeeder::class);
        $this->command->info('Таблица кладров загружена данными!');
    
        $this->call(FastDeliveryTableSeeder::class);
        $this->command->info('Таблица кладров загружена данными!');
    }
}
