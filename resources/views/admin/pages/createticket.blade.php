@extends('admin.welcome')
@section('content')

<br>
<div class="container">
<form action="{{ route('admin.pages.addticket') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-25">
          <label for="fixture_id" id="age">Fixture_Id</label>
        </div>
        <div class="col-75">
          <input type="number" id="jersyno" name="fixture_id" value="{{$data->id}}">
        </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="date" id="date">Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="date" name="date" value="{{$data->date}}">
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="venu_id" id="age">Venu ID</label>
        </div>
        @foreach ($data1 as $venu)
        <div class="col-75">
          <input type="number" id="age" name="venu_id" value="{{ $venu->id }}">
        </div>
        @endforeach
      </div>
    <div class="row">
        <div class="col-25">
          <label for="quantity" id="age">Quantity</label>
        </div>
        @foreach ($data1 as $venu)
        <div class="col-75">
          <input type="number" id="age" name="ticket" value="{{$venu->capacity}}">
        </div>
        @endforeach
      </div>
    <div class="row">
        <div class="col-25">
          <label for="price" id="age">Price</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="price" placeholder="Price Per Ticket" >
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
