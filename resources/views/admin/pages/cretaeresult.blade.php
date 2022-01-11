@extends('admin.welcome')
@section('content')

<form action="{{ route('admin.pages.addresult') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-25">
          <label for="jersyno" id="age">Fixture_Id</label>
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
          <label for="myteam" id="jersyno">My Team</label>
        </div>
        <div class="col-75">
          <input type="text" id="age" name="myteam" value="RIMFC">
        </div>
      </div>
    <div class="row">
        <div class="col-25">
          <label for="mygoal" id="jersyno">My Goal</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="mygoal" placeholder="My Goal...">
        </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="opponent" id="jersyno">Opponent</label>
      </div>
      <div class="col-75">
        <input type="text" id="age" name="opponent" value="{{$data->opponent}}">
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="opponentgoal" id="jersyno">Opponent Goal</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="opponentgoal" placeholder="Opponent Goal..">
        </div>
      </div>
    <div class="row">
        <div class="col-25">
          <label for="status" id="jersyno">Status</label>
        </div>
        <div class="col-75">
          <input type="text" id="age" name="status" value="1">
        </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="name">Opponent Photo</label>
      </div>
      <div class="col-75">
        <input type="text" id="photo" name="photo" value="{{$data->photo}}">
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
