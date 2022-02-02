@extends('user.welcome')
@section('content')

<style>
    .cards {
      box-shadow: 0 4px 8px 0 black;
      transition: 0.3s;
      width: 80%;
      border-radius: 10px;
      height: 130px;
      background: lightblue;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-bottom: 40px;
  }
  .cards1 {
      box-shadow: 0 4px 8px 0 black;
      transition: 0.3s;
      width: 80%;
      border-radius: 10px;
      height: 300px;
      background: whitesmoke;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
  }
  hr {
    border: 1px solid black;
    width: 90%;
    background-color:black;
    box-shadow:20px 20px 50px grey;

  }
    .card-containers {
      display: grid;
      grid-template-columns: 25% 25% 40%;
      grid-gap: 15px;
      margin-left: 120px;
      margin-top: 40px;
      margin-bottom: 40px;
  }
  h1{
    color: black;
    font-size: 30px;
    font-family: "Times New Roman", Georgia, serif;
    text-transform: capitalize;
  }
  h2{
    color: black;
    font-size: 20px;
    font-family: "Times New Roman", Georgia, serif;
    text-transform: capitalize;
  }

  .sec{
    display: inline-block;
    padding-left: 100px;
  }
  .playersec{
    padding: 2%;
    display: flex;
  }

  .img img{
    width: 300px;
    height: 200px;
  }
  .info{
      font-family: "Times New Roman", Georgia, serif;
      color: black;
      font-size: 25px;
      border: 2px solid white;
      padding: 25px;
  }
  .contain{
      width: 100%;
      height: 100px;
      background: whitesmoke;
      color: lightskyblue;
      font-size: 50px;
      padding-left: 120px;
      margin: 10px;
      padding-top: 20px;
      font-family: "Times New Roman", Georgia, serif;
  }
  h3{
    color: lightskyblue;
    font-size: 50px;
    font-family: "Times New Roman", Georgia, serif;
    text-transform: capitalize;
  }
  </style>

<div class="card-containers">
    <div class="cards">
     <h2>Top Scorer</h2><br>
     <h1>{{ $Player1->goal }} Goal</h1><br>
     <h2>{{ $Player1->player->name }}</h2>
    </div>
    <div class="cards">
    <h2>Top Assist</h2><br>
    <h1>{{ $Player2->assist }} Assist</h1><br>
    <h2>{{ $Player2->player->name }}</h2>
    </div>
    <div class="cards1">
        <h1>Latest Result</h1><br>
        <hr><br>
        @foreach ($result as $results)
        <h2>RIMFC Goal</h2><br>
        <h1>{{ $results->mygoal }}</h1>----
        <h1>{{ $results->opponentgoal  }}</h1><br>
        <h2>{{ $results->opponent }} Goal</h2><br>
        @endforeach
        </div>
</div>
<br>
<br>
<div class="contain">
    <h3>Latest News</h3>
</div>
<section class="sec">

    @foreach($news as $news)
    <div class="playersec">
    <div class="img">
        <a href="{{ route('user.pages.newsDetails', $news->id) }}"><img  src="{{asset('storage/news/'.$news->photo)}}" alt="Item 1"></a>
    </div>
    <div class="info">
        <a href="{{ route('user.pages.newsDetails', $news->id) }}"><h4>{{ $news->headline }}</h4></a>
    </div>
   </div>
@endforeach
</section>
<br>
<div class="contain">
    <h3>Upcoming Fixture</h3>
</div>
<table id="players">
    @foreach ($fixture as $fixtures)
    @if ($fixtures->resultstatus == '0')
    <tr>
        <td >{{$fixtures->date}}</td>
        <td> <img style="border-radius: 50%; " width="56px;" src="{{url('RIMFC.jpg')}}"></td>
        <td >RIMFC</td>
        <td >{{$fixtures->time}}</td>
        <td >{{$fixtures->opponent}}</td>
        <td>
            <img style="border-radius: 50%; " width="56px;" src=" {{asset('storage/fixture/'.$fixtures->photo)}}" alt="players">

        </td>
      </tr>
      @break
      @endif
      @endforeach
</table>
@endsection
