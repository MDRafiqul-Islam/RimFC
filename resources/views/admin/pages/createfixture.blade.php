@extends('admin.welcome')
@section('content')

<br><br>
@if(session()->has('success'))
    <p class="alert-success">
        {{session()->get('success')}}
    </p>
@endif
<div class="container">

    <form action="{{ route('admin.pages.addfixture') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-25">
        <label for="date" id="date">Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="date" name="date" placeholder="Date">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="time">Time</label>
      </div>
      <div class="col-75">
        <input type="time" id="time" name="time" placeholder="Time">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="opponent">Opponent</label>
      </div>
      <div class="col-75">
        <select type="text" id="age" name="opponent" >
            <option value="mancity">Man City</option>
            <option value="liverpool">Liverpool</option>
            <option value="chelsea">Chelsea</option>
            <option value="arsenal">Arsenal</option>
            <option value="tottenham">Tottenham</option>
            <option value="manutd">Man Utd</option>
            <option value="leicester">Leicester</option>
            <option value="astonvilla">Aston Villa</option>
        </select>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="venu" id="age">Venu</label>
        </div>
        <div class="col-75">
          <select type="text" id="age" name="venu">
            <option value="home">Home</option>
            <option value="away">Away</option>
          </select>
        </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="name">Opponent Photo</label>
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
