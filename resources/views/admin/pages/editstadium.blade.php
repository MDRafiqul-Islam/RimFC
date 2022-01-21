@extends('admin.welcome')
@section('content')

<div class="container">

    <form action="{{ route('admin.pages.editvenulist',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="col-25">
        <label for="name" id="age">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" value="{{$data['name']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="owner" id="age">Owner</label>
      </div>
      <div class="col-75">
        <input type="text" id="position" name="owner" value="{{$data['owner']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="capasity" id="age">Capacity</label>
      </div>
      <div class="col-75">
        <input type="number" id="age" name="capacity" value="{{$data['capacity']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="location" id="age">Loaction</label>
      </div>
      <div class="col-75">
        <input type="text" id="foot" name="location"value="{{$data['location']}}">
      </div>
    <br>
    <br>
    <div class="row">
      <input type="submit" value="Update">
    </div>
    </form>
  </div>
  <br>
  <br>

@endsection
