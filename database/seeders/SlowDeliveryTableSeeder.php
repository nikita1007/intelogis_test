<?php

namespace Database\Seeders;

use App\Models\Kladr;
use App\Models\SlowDelivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlowDeliveryTableSeeder extends Seeder
{
    public function run(): void
    {
        $prepared_data = $this->prepareData();

        foreach ($prepared_data as $data) {
            SlowDelivery::create([
                'from' => $data[0],
                'to' => $data[1],
                'days' => $data[2],
            ]);
        }
    }

    private function getKladrs() 
    {
        return Kladr::all(['kladr']);    
    }

    private function prepareData(): array
    {
        $prepared_data = [];
        $kladrs = $this->getKladrs();

        for ($i=0; $i < count($kladrs) - 1; $i++) { 
            for ($j=$i+1; $j < count($kladrs); $j++) { 
                array_push($prepared_data, [$kladrs[$i]['kladr'], $kladrs[$j]['kladr'], rand(3, 8)]);
            }
        }

        return $prepared_data;
    }
}
