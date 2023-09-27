<?php

namespace Database\Seeders;

use App\Models\FastDelivery;
use App\Models\SlowDelivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FastDeliveryTableSeeder extends Seeder
{
    public function run(): void
    {
        $prepared_data = $this->prepareData();

        foreach ($prepared_data as $data) {
            FastDelivery::create([
                'from' => $data[0],
                'to' => $data[1],
                'days' => $data[2],
            ]);
        }
    }

    private function getKladrs() 
    {
        return SlowDelivery::all(['from', 'to', 'days']);    
    }

    private function prepareData(): array
    {
        $prepared_data = [];
        $kladrs = $this->getKladrs();

        for ($i=0; $i < count($kladrs) - 1; $i++) { 
            array_push($prepared_data, [$kladrs[$i]['from'], $kladrs[$i]['to'], $kladrs[$i]['days'] - rand(1, 2)]);
        }

        return $prepared_data;
    }
}
