@extends('manager.welcome')
@section('content')

<style>
    .contain{
        width: 100%;
        height: 100px;
        background: whitesmoke;
        color: lightskyblue;
        font-size: 50px;
        padding-left: 110px;
        margin: 10px;
        padding-top: 20px;
        font-family: "Times New Roman", Georgia, serif;
    }
    .img img{
    margin-left: 22%;
    width: 56px;
    height: 56px;
  }
</style>

<div class="contain">
    <h1>Playing Position</h1>
</div>
<br>
@foreach ($matchplayer as $matchplayer)
<h1>{{ $matchplayer->position }}</h1>
<div class="img">
    <img  src="{{asset('storage/players/'.$matchplayer->player->photo)}}" alt="Item 1">
</div>
@endforeach
@endsection
