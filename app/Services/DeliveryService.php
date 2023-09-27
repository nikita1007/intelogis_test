<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Database\QueryException;

class DeliveryService
{
  public function calculateFastDelivery($sourceKladr, $targetKladr, $weight) {
    $query = json_decode((new FastDeliveryService)->calculatePriceAndDate($sourceKladr, $targetKladr, $weight), 1);

    $query['date'] = Carbon::now()->addDays($query['period'])->format('Y-d-m');
    unset($query['period']);

    return $query;
  }

  public function calculateSlowDelivery($sourceKladr, $targetKladr, $weight) {
    $query = json_decode((new SlowDeliveryService)->calculatePriceAndDate($sourceKladr, $targetKladr, $weight), 1);

    $query['price'] = $query['coefficient'];
    unset($query['coefficient']);
    
    return $query;
  }
}