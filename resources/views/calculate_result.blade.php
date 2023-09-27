@extends('layouts.default')

@section('main-content')
<div class="calculator">
  <main class="mb-3">
    <div class="row mb-2">
      <div class="col-6">Доставка из:</div>
      <div class="col-6 text-end">{{$result['from']}}</div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Доставка в:</div>
      <div class="col-6 text-end">{{$result['to']}}</div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Цена:</div>
      <div class="col-6 text-end">{{$result['price']}} руб.</div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Вес:</div>
      <div class="col-6 text-end">{{$result['weight']}} кг</div>
    </div>
    <div class="row">
      <div class="col-6">Дата доставки:</div>
      <div class="col-6 text-end">{{$result['date']}}</div>
    </div>
  </main>
  <a href="{{route('calculate')}}" class="btn btn-primary" role="button">Расчитать еще одну доставку</a>
</div>  
@endsection
