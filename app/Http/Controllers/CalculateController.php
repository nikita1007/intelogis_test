<?php

namespace App\Http\Controllers;

use App\Models\Kladr;
use App\Services\DeliveryService;
use App\Services\FastDeliveryService;
use App\Services\KladrService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CalculateController extends Controller
{
    public function show() {
      
        $kladrs = Kladr::all(['id', 'kladr']);

        return view('calculate', ['kladrs' => $kladrs]);
    }

    public function calculate(Request $request) {    
        $validator = Validator::make($request->all(), [
            'sourceKladr' => 'required|string',
            'targetKladr' => 'required|string',
            'weight' => 'required|string|regex:/^\d*.\d{2}$/',
        ], [
            'sourceKladr.required' => "Укажите пункт отправки посылки",
            'targetKladr.required' => "Укажите пункт доставки посылки",
            'weight.required' => "Укажите вес посылки",
            'weight.regex' => "Вес должен быть указан в формате '123.45'",
        ]);

        if ($request['sourceKladr'] == $request['targetKladr']) {
            $validator->errors()->add('sourceKladr.equal.targetKladr', 'Кладры "Откуда" и "Куда" должны быть разными');
        }
        
        if (count($validator->errors()) > 0) {
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }

        $kladrs = (new KladrService)->getSourceAndTargetKladrsName($request['sourceKladr'], $request['targetKladr']);

        if ($request['delivery_type'] === 'fast') {
            $result = (new DeliveryService)->calculateFastDelivery($kladrs[0], $kladrs[1], $request['weight']);
        } elseif ($request['delivery_type'] === 'slow') {
            $result = (new DeliveryService)->calculateSlowDelivery($kladrs[0], $kladrs[1], $request['weight']);
        }

        $result['from'] = $kladrs[0];
        $result['to'] = $kladrs[1];
        $result['weight'] = $request['weight'];

        return view('calculate_result', ['result' => $result]);
    }
}
