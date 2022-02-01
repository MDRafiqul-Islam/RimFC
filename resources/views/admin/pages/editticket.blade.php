@extends('admin.welcome')
@section('content')
<style>
     .contain{
      color: black;
      font-size: 20px;
      padding-bottom: 10px;
  }
</style>
<br>
<div class="container">
    <div class="contain">
    <h1>Fixture_Id: {{$data->fixture_id}}</h1>
    <h1>Date: {{ $data->date }}</h1>
    @foreach ($data1 as $venu)
    <h1>Venu ID: {{ $venu->id }}</h1>
    <h1>Quantity: {{$venu->capacity}}</h1>
    @endforeach
</div>
<form action="{{ route('admin.pages.ticketedit',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-25">
          <label for="price" id="age">Price</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="price" value="{{$data->price}}" >
        </div>
      </div>
    <br>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
    </form>
  </div>
  <br>
  <br>
</div>

@endsection
