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
    width: 156px;
    height: 156px;
  }
  .sec{
    display: flex;
    /* flex-wrap: wrap; */
    padding-left: 100px;
    gap: 5%;
    margin-bottom: 20px;
  }
  h2{
    color: lightskyblue;
    font-size: 35px;
    padding-left: 120px;
    font-family: "Times New Roman", Georgia, serif;
  }
  .info{
      background-color: whitesmoke;
      font-family: "Times New Roman", Georgia, serif;
      color: black;
      font-size: 18px;
      border: 2px solid white;
      padding: 25px;
      box-shadow:6px 6px 10px grey;
      background-size: 400px;
  }
</style>

<div class="contain">
    <h1>Playing Position</h1>
</div>
<br>
<br>
<h2>Match Players</h2>
<br>
 <section class="sec">
    @foreach ($matchplayer as $matchplayers)
    @if (value($matchplayers->position) == 'CF' && value($matchplayers->status) == 'main')
    <div class="playersec">
    <div class="img">
        <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
    </div>
    </div>
       <div class="info">
            <h4>{{ $matchplayers->position}}</h4><br>
    </div>
    @endif
    @endforeach
</section>


 <section class="sec">
    @foreach ($matchplayer as $matchplayers)
    @if ((value($matchplayers->position) == 'RWF'|| value($matchplayers->position) == 'LWF') && value($matchplayers->status) == 'main')
    <div class="playersec">
    <div class="img">
        <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
    </div>
    </div>
       <div class="info">
            <h4>{{ $matchplayers->position}}</h4><br>
    </div>
    @endif
    @endforeach
</section>


 <section class="sec">

     @foreach ($matchplayer as $matchplayers)
    @if (value($matchplayers->position) == 'AMF' && value($matchplayers->status) == 'main')
    <div class="playersec">
    <div class="img">
        <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
    </div>
    </div>
       <div class="info">
            <h4>{{ $matchplayers->position}}</h4><br>
    </div>
    @endif
    @endforeach
</section>


 <section class="sec">

     @foreach ($matchplayer as $matchplayers)
    @if (value($matchplayers->position) == 'CMF' && value($matchplayers->status) == 'main')
    <div class="playersec">
    <div class="img">
        <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
    </div>
    </div>
       <div class="info">
            <h4>{{ $matchplayers->position}}</h4><br>
    </div>
    @endif
    @endforeach
</section>



 <section class="sec">

     @foreach ($matchplayer as $matchplayers)
    @if (value($matchplayers->position) == 'DMF' && value($matchplayers->status) == 'main')
    <div class="playersec">
    <div class="img">
        <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
    </div>
    </div>
       <div class="info">
            <h4>{{ $matchplayers->position}}</h4><br>
    </div>
    @endif
    @endforeach
</section>


 <section class="sec">

     @foreach ($matchplayer as $matchplayers)
    @if ((value($matchplayers->position) == 'LB'||value($matchplayers->position) == 'RB') && value($matchplayers->status) == 'main')
    <div class="playersec">
    <div class="img">
        <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
    </div>
    </div>
       <div class="info">
            <h4>{{ $matchplayers->position}}</h4><br>
    </div>
    @endif
    @endforeach
</section>


 <section class="sec">

     @foreach ($matchplayer as $matchplayers )
    @if (value($matchplayers->position) == 'CB' && value($matchplayers->status) == 'main')
    <div class="playersec">
    <div class="img">
        <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
    </div>
    </div>
       <div class="info">
            <h4>{{ $matchplayers->position}}</h4><br>
    </div>
    @endif
    @endforeach
</section>


 <section class="sec">

     @foreach ($matchplayer as $matchplayers)
    @if (value($matchplayers->position) == 'GK' && value($matchplayers->status) == 'main')
    <div class="playersec">
    <div class="img">
        <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
    </div>
    </div>
       <div class="info">
            <h4>{{ $matchplayers->position}}</h4><br>
    </div>
    @endif
    @endforeach
</section>
<br>
<h2>Extra Players</h2>
<br>
<section class="sec">
    @foreach ($matchplayer as $matchplayers)
   @if (value($matchplayers->status) == 'extra')
   <div class="playersec">
   <div class="img">
       <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
   </div>
   </div>
   <div class="info">
    <h4>{{ $matchplayers->position}}</h4><br>
    </div>
   @endif
   @endforeach
</section>


@endsection
