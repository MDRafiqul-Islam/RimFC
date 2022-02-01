@extends('admin.welcome')
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
    width: 120px;
    height: 120px;
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
  .error{
      color:red;
      background-size: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
</style>

<br>
<div class="contain">
    <h1>Playing Position</h1>
</div>
<br>
<br>
<h2>Match Players</h2>
<br>
<table id="players">
    <tr>
        <th>Player</th>
        <th>Position</th>
        <th></th>
    </tr>
    @foreach ($matchplayer as $matchplayers)
    @if (value($matchplayers->status) == 'main')
    <tr>
        <td width="25%"> <div class="img">
            <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
        </div>
       </td>
        <td>{{ $matchplayers->position}}</td>
    </tr>
    @endif
    @endforeach
</table>
<br>
<h2>Extra Players</h2>
<br>
<table id="players">
    <tr>
        <th>Player</th>
        <th>Position</th>
        <th></th>
    </tr>
    @foreach ($matchplayer as $matchplayers)
   @if (value($matchplayers->status) == 'extra')
   <tr>
    <td width="25%"> <div class="img">
        <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
    </div>
   </td>
    <td>{{ $matchplayers->position}}</td>
</tr>
   @endif
   @endforeach

</table>
<br><br>
@endsection
