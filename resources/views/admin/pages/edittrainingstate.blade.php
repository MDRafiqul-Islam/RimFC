@extends('admin.welcome')
@section('content')

    <style>
    h1{

        }
    .contain{
        max-width: 500px;
        height: 650px;
        background-color: lightblue;
        margin-left: 30%;
        margin-top: 5%;
        margin-bottom: 5%;
    }
    .col-25{
        padding-left: 10%;
    }
    .col-75{
        padding-left: 10%;
        padding-top:5%;
    }
    .row1{
        margin-right: 2%;
    }
    h1{
    color: black;
    font-size: 25px;
    padding-left: 40%;
    padding-top: 5%;
    font-family: "Times New Roman", Georgia, serif;
    }
    hr {
    border: 0;
    clear:both;
    display:block;
    width: 100%;
    background-color:black;
    height: 1px;
    padding-left: 80px;
    margin-top: 10px;
    }

    </style>

<div class="contain">
    <h1>{{$data['player_name']}}</h1>
    <br>
    <hr>
    <form action="{{ route('admin.pages.editstatuslist',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="col-25">
        <label for="dribbling" id="age">Dribbling</label>
      </div>
      <div class="col-75">
        <input type="number" id="name" name="dribbling" value="{{$data->dribbling}}">
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="shooting" id="age">Shooting</label>
        </div>
        <div class="col-75">
          <input type="number" id="name" name="shooting" value="{{$data['shooting']}}">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="dribbling" id="age">Crossing</label>
        </div>
        <div class="col-75">
          <input type="number" id="name" name="crossing" value="{{$data['crossing']}}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="turning" id="age">Turning</label>
        </div>
        <div class="col-75">
          <input type="number" id="name" name="turning" value="{{$data['turning']}}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="tackling" id="age">Tackling</label>
        </div>
        <div class="col-75">
          <input type="number" id="name" name="tackling" value="{{$data['tackling']}}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="heading" id="age">Heading</label>
        </div>
        <div class="col-75">
          <input type="number" id="name" name="heading" value="{{$data['heading']}}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="passing" id="age">Passing</label>
        </div>
        <div class="col-75">
          <input type="number" id="name" name="passing" value="{{$data['passing']}}">
        </div>
      </div>
    <br>
    <br>
    <div class="row1">
      <input type="submit" value="Update">
    </div>
    </form>
  </div>
  <br>
  <br>

@endsection
