@extends('user.welcome')
@section('content')

<style>

  .img img{
    width: 650x;
    height: 380px;
    padding-left: 35%;
  }

  hr {
    border: 1px solid black;
    width: 90%;
    background-color:black;
    box-shadow:20px 20px 50px grey;

  }

  .detailes{
    width: 75%;
    padding-left: 25%;
    font-family: "Times New Roman", Georgia, serif;
    text-align: justify;
    text-indent: 50px;
    word-spacing: 6px;
    line-height: 1.4;
    font-size: 19px;

  }

</style>

<br>
<div class="img">
    <img  src="{{asset('storage/players/'.$player->photo)}}" alt="Item 1">
</div>
<br>
<hr>
<br>
<div class="detailes">
    <h2>This is {{ $player->name }}. He contain {{ $player->jersy_no }} jersy. He is {{ $player->age }} years old. He is a {{ $player->foot }}</h2>
</div>
<br><br>
@endsection
