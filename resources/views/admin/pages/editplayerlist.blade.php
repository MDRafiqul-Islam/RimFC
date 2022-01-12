@extends('admin.welcome')

@section('content')
<div class="container">

    <form action="{{route('admin.pages.editplayerlist' , $data->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="col-25">
        <label for="jersyno" id="jersyno">Jersy No</label>
      </div>
      <div class="col-75">
        <input type="number" id="jersyno" name="jersyno" value="{{$data['jersy_no']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" value="{{$data['name']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="position">Position</label>
      </div>
      <div class="col-75">
        <input type="text" id="position" name="position" value="{{$data['position']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="age" id="age">Age</label>
      </div>
      <div class="col-75">
        <input type="number" id="age" name="age" value="{{$data['age']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="foot">Foot</label>
      </div>
      <div class="col-75">
        <input type="text" id="foot" name="foot"value="{{$data['foot']}}">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="foot">Salary</label>
      </div>
      <div class="col-75">
        <input type="number" id="age" name="salary"value="{{$data['salary']}}">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="foot">Availability</label>
      </div>
      <div class="col-75">
        <input type="text" id="foot" name="available"value="{{$data['available']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="name">Photo</label>
      </div>
      <div class="col-75">
        <input type="file" id="photo" name="photo">
      </div>
    </div>

    <br>
    <div class="row">
      <input type="submit" value="Update">
    </div>
    </form>
  </div>
  <br>
  <br>

@endsection
