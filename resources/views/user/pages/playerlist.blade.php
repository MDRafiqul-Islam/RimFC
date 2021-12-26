@extends('user.welcome')
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
  .sec{
    display: flex;
    flex-wrap: wrap;
    padding-left: 100px;
  }
h2{
    color: lightskyblue;
    font-size: 35px;
    padding-left: 120px;
    font-family: "Times New Roman", Georgia, serif;

  }
  .playersec{
    padding: 2%;
    display: flex;
  }
  .img img{
    width: 150px;
    height: 150px;
    border-top-left-radius: 50px 10px;

  }
  .info{
      background-color: whitesmoke;
      font-family: "Times New Roman", Georgia, serif;
      color: black;
      font-size: 18px;
      border: 2px solid white;
      padding: 25px;
      border-bottom-right-radius: 80px 40px;
      border-bottom-style: groove;
      border-bottom-color: rgb(127, 187, 224);
      border-bottom-width: 4px;
      border-left-style:groove;
      border-left-width: 5px;
      box-shadow:20px 20px 10px grey;
      background-size: 400px;
  }
  hr {
  border: 0;
  clear:both;
  display:block;
  width: 96%;
  background-color:black;
  height: 1px;
  padding-left: 80px;
}
</style>
<div class="contain">
    <h1>PLAYERS</h1>
</div>
<br>
<h2>FORWARDS</h2>
<section class="sec">

    @foreach($players as $player)
    @if ( value($player->position) == 'CF'||value($player->position) == 'RWF'|| value($player->position) == 'LWF'||value($player->position) == 'SS')
    <div class="playersec">
    <div class="img">
            <img  src="{{asset('storage/players/'.$player->photo)}}" alt="Item 1">
    </div>
    <div class="info">
            <h4>{{ $player->jersy_no }}</h4><br>
            <h4>{{$player->name}}</h4><br>
            <h4>{{ $player->position }}</h4>
    </div>
   </div>
   @endif
@endforeach
</section>
<br>
<h2>MIDFIELDERS</h2>
<br>
<section class="sec">
    @foreach($players as $player)
    @if ( value($player->position) == 'CMF'||value($player->position) == 'AMF'||value($player->position) == 'DMF')
    <div class="playersec">
    <div class="img">
            <img  src="{{asset('storage/players/'.$player->photo)}}" alt="Item 1">
    </div>
    <div class="info">
            <h4>{{ $player->jersy_no }}</h4><br>
            <h4>{{$player->name}}</h4><br>
            <h4>{{ $player->position }}</h4>
    </div>
   </div>
   @endif
@endforeach
</section>
<br>
<h2>DEFENDERS</h2>
<br>
<section class="sec">

    @foreach($players as $player)
    @if ( value($player->position) == 'CB'||value($player->position) == 'RB'||value($player->position) == 'LB')
    <div class="playersec">
    <div class="img">
            <img  src="{{asset('storage/players/'.$player->photo)}}" alt="Item 1">
    </div>
    <div class="info">
            <h4>{{ $player->jersy_no }}</h4><br>
            <h4>{{$player->name}}</h4><br>
            <h4>{{ $player->position }}</h4>
    </div>
   </div>
   @endif
@endforeach
</section>
<br>
<h2>GOALKEEPERS</h2>
<br>
<section class="sec">
    @foreach($players as $player)
    @if ( value($player->position) == 'GK')
    <div class="playersec">
    <div class="img">
            <img  src="{{asset('storage/players/'.$player->photo)}}" alt="Item 1">
    </div>
    <div class="info">
            <h4>{{ $player->jersy_no }}</h4><br>
            <h4>{{$player->name}}</h4><br>
            <h4>{{ $player->position }}</h4>
    </div>
   </div>
   @endif
@endforeach
</section>

@endsection
