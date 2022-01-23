@extends('admin.welcome')
@section('content')
<br>
<br>
<div class="container">

    <form action="{{ route('admin.pages.createpartnerlist') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-25">
        <label for="date" id="age">Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="date" name="date" placeholder="Date">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Name..">
      </div>
    </div>
       <div class="row">
        <div class="col-25">
          <label for="ammount">Ammount</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="ammount" placeholder="Ammount">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="link">link</label>
        </div>
        <div class="col-75">
          <input type="url" id="age" name="link" placeholder="Link">
        </div>
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
