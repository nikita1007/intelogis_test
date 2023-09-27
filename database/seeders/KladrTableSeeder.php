<?php

namespace Database\Seeders;

use App\Models\Kladr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KladrTableSeeder extends Seeder
{
    private $prepared_data = [
        'kladrs' => [
            'Москва', 'Санкт-Петербург', 'Новосибирск',
            'Екатеринбург', 'Казань', 'Нижний Новгород',
            'Красноярск', 'Челябинск', 'Самара',
            'Уфа', 'Ростов-на-Дону', 'Краснодар',
            'Омск', 'Воронеж', 'Пермь',
            'Волгоград', 'Саратов', 'Тюмень',
            'Тольятти', 'Барнаул', 'Махачкала',
            'Ижевск', 'Хабаровск', 'Владивосток',
            'Оренбург', 'Сочи', 'Набережные Челны',
        ],
    ];

    public function run(): void
    {
        foreach ($this->prepared_data['kladrs'] as $value) {
            Kladr::create([
                'kladr' => $value,
            ]);
        }
    }
}
