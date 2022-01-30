@extends('admin.welcome')
@section('content')


<br>
<br>
<div class="container">

    <form action="{{ route('admin.pages.achievementedit',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="col-25">
        <label for="number" id="age">UEFA Champions League</label>
      </div>
      <div class="col-75">
        <input type="number" id="age" name="champions" value="{{ $data->champions }}">
      </div>
    </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">UEFA Europa League</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="europa" value="{{ $data->europa }}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">UEFA Europa Conference League</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="conference" value="{{ $data->conference }}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">English Premier League</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="premier" value="{{ $data->premier }}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">English League Championship</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="english" value="{{ $data->english }}">
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
