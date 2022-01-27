@extends('admin.welcome')
@section('content')

<form action="{{ route('admin.pages.editresultlist',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-25">
          <label for="myteam" id="jersyno">My Team</label>
        </div>
        <div class="col-75">
          <input type="text" id="age" name="myteam" value="RIMFC" disabled>
        </div>
      </div>
    <div class="row">
        <div class="col-25">
          <label for="mygoal" id="jersyno">My Goal</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="mygoal" value="{{$data->mygoal}}">
        </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="opponent" id="jersyno">Opponent</label>
      </div>
      <div class="col-75">
        <input type="text" id="age" name="opponent" value="{{$data->opponent}}" disabled>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="opponentgoal" id="jersyno">Opponent Goal</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="opponentgoal" value="{{$data->opponentgoal}}">
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
