@extends('admin.welcome')
@section('content')


<br>
<br>
<div class="container">

    <form action="{{ route('admin.pages.crateachievementlist') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-25">
        <label for="number" id="age">UEFA Champions League</label>
      </div>
      <div class="col-75">
        <input type="number" id="age" name="champions" placeholder="UEFA Champions League">
      </div>
    </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">UEFA Europa League</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="europa" placeholder="UEFA Europa League">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">UEFA Europa Conference League</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="conference" placeholder="UEFA Europa Conference League">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">English Premier League</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="premier" placeholder="English Premier League">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">English League Championship</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="english" placeholder="English League Championship">
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




