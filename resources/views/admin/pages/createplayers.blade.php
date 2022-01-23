@extends('admin.welcome')

@section('content')
<br>
<br>

<div class="container">

  <form action="{{route('admin.player.add')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-25">
      <label for="jersyno" id="jersyno">Jersy No</label>
    </div>
    <div class="col-75">
      <input type="number" id="jersyno" name="jersyno" placeholder="Jersy">
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
      <label for="position">Position</label>
    </div>
    <div class="col-75">
      <input type="text" id="position" name="position" placeholder="Position">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="age" id="age">Age</label>
    </div>
    <div class="col-75">
      <input type="number" id="age" name="age" placeholder="Age">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="foot">Foot</label>
    </div>
    <div class="col-75">
      <input type="text" id="foot" name="foot" placeholder="Foot">
    </div>
  </div>
     <div class="row">
      <div class="col-25">
        <label for="foot">Salary</label>
      </div>
      <div class="col-75">
        <input type="number" id="age" name="salary" placeholder="Salary">
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
