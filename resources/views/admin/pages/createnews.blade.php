@extends('admin.welcome')

@section('content')
<br>
@if(session()->has('success'))
    <p class="alert-success">
        {{session()->get('success')}}
    </p>
@endif
<br>
<div class="container">

    <form action="{{route('admin.pages.addnews')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-25">
        <label for="headline" id="headline">Headline</label>
      </div>
      <div class="col-75">
        <input type="text" id="headline" name="headline" placeholder="Headline..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="detailes">Detailes</label>
      </div>
      <div class="col-75">
        <input type="text" id="detailes" name="detailes" placeholder="Detailes..">
      </div>
      <div class="row">
        <div class="col-25">
          <label for="name">Photo</label>
        </div>
        <div class="col-75">
          <input type="file" id="photo" name="photo" placeholder="Photo..">
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
