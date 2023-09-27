@extends('layouts.default')

@section('main-content')
<form class="calculator" action="{{ route('calculate') }}" method="POST">
  @csrf
  <header>
    <div class="row">
      <div class="col-6">
        <label for="sourceKladr">Откуда</label>
        <select name="sourceKladr" class="form-select" id="sourceKladr" required>
          <option value="default" hidden>Выберите город</option>
          @foreach ($kladrs as $kladr)
            <option value="{{$kladr['id']}}" {{ old('sourceKladr') == $kladr['id'] ? "selected" : "" }}>{{$kladr['kladr']}}</option>
          @endforeach
        </select>
        <div class="invalid-feedback">
          Выберите пункт отправки
        </div>
      </div>
      <div class="col-6">
        <label for="targetKladr">Куда</label>
        <select name="targetKladr" class="form-select" id="targetKladr" required>
          <option value="default" hidden>Выберите город</option>
          @foreach ($kladrs as $kladr)
            <option value="{{$kladr['id']}}" {{ old('targetKladr') == $kladr['id'] ? "selected" : "" }}>{{$kladr['kladr']}}</option>
          @endforeach
        </select>
        <div class="invalid-feedback">
          Выберите пункт доставки
        </div>
      </div>
    </div>
  </header>
  <main>
    <div class="row">
      <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Вес посылки (кг)<span class="required" title="Обязательное поле"></span></span>
        <input name="weight" type="text" class="form-control" value="{{old('weight')}}" placeholder="123.45 или 12345" pattern="^\d*.\d{1,2}$|^\d*$" required>
      </div>
    </div>
    <div class="row">
      <div class="mb-3">
        <select class="form-select" name="delivery_type" id="delivery_type">
          <option value="default" hidden>Выберите тип доставки</option>
          <option value="slow" {{ old('delivery_type') == "slow" ? "selected" : "" }}>Медленная доставка</option>
          <option value="fast" {{ old('delivery_type') == "fast" ? "selected" : "" }}>Быстрая доставка</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Расчитать стоимость доставки</button>
  </main>
</form>

@if ($errors->any())
  <div class="alert alert-danger mt-3" style="max-width: 700px;margin: auto;">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@endsection
