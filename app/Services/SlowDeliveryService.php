<?php

namespace App\Services;

use App\Models\SlowDelivery;
use Carbon\Carbon;

// Имитация сервиса медленной доставки
class SlowDeliveryService
{
    public function calculatePriceAndDate($sourceKladr, $targetKladr, $weight)
    {
        $days = SlowDelivery::where([['from', '=', $sourceKladr], ['to', '=', $targetKladr]])->orWhere([['from', '=', $targetKladr], ['to', '=', $sourceKladr]])->first('days')['days'];
    
        $base_coast = 150;

        $coefficient_per_weight = 5;

        $price = ($weight * $coefficient_per_weight) + ($base_coast * $days);

        $period = Carbon::now()->timezone("Europe/Moscow")->addDays($days)->format('Y-d-m');

        return json_encode(['coefficient' => $price, 'date' => $period, 'error' => '']);
    }
}