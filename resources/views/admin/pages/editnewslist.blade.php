@extends('admin.welcome')

@section('content')

<br>
<div class="container">

    <form action="{{route('admin.pages.editnewslist',$data->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="col-25">
        <label for="headline" id="headline">Headline</label>
      </div>
      <div class="col-75">
        <input type="text" id="headline" name="headline" value="{{$data['headline']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="detailes">Detailes</label>
      </div>
      <div class="col-75">
        <input type="text" id="detailes" name="detailes" value="{{$data['detailes']}}">
      </div>
      <div class="row">
        <div class="col-25">
          <label for="name">Photo</label>
        </div>
        <div class="col-75">
          <input type="file" id="photo" name="photo" value="{{$data['photo']}}">
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


@endsection
