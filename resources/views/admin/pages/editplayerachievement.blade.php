@extends('admin.welcome')
@section('content')

<br>
<br>
<div class="container">

    <form action="{{ route('admin.pages.playerachievementedit',$data->player_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="col-25">
        <label for="number" id="age">Ballon_d_or</label>
      </div>
      <div class="col-75">
        <input type="number" id="age" name="ballon_d_or" value="{{ $data->ballon_d_or}}">
      </div>
    </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">Fifa_best</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="fifa_best" value="{{ $data->fifa_best }}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">Golden Ball</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="ball" value="{{ $data->ball }}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">Golden Boot</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="boot" value="{{ $data->boot }}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="number" id="age">Golden Gloves</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="globes" value="{{ $data->globes }}">
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
