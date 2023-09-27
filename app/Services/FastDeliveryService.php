<?php

namespace App\Services;

use App\Models\FastDelivery;
use Carbon\Carbon;

// Имитация сервиса быстрой доставки
class FastDeliveryService
{
    public function calculatePriceAndDate($sourceKladr, $targetKladr, $weight)
    {
        $days = FastDelivery::where([['from', '=', $sourceKladr], ['to', '=', $targetKladr]])->orWhere([['from', '=', $targetKladr], ['to', '=', $sourceKladr]])->first('days')['days'];

        $base_coast = 200;

        $coast_per_weight = 20;

        $price = ($weight * $coast_per_weight) + ($base_coast * $days);

        $period = Carbon::now()->timezone("Europe/Moscow")->format('h') < 18 ? $days : $days + 1;

        return json_encode(['price' => $price, 'period' => $period, 'error' => '']);
    }
}