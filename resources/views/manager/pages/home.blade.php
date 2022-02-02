@extends('manager.welcome')
@section('content')

<style>
    .cards {
      box-shadow: 0 4px 8px 0 black;
      transition: 0.3s;
      width: 80%;
      border-radius: 10px;
      height: 100px;
      background: lightblue;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-bottom: 40px;
  }
    .card-containers {
      display: grid;
      grid-template-columns: 28% 28% 28%;
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
  </style>

<div class="card-containers">
    <div class="cards">
        <h1>{{ $player }}</h1>
        <h2>Players</h2>
       </div>
    <div class="cards">
    <h1>{{ $available }}</h1>
    <h2>Available Players</h2>
    </div>
    <div class="cards">
    <h1>{{ $fixavail }}</h1>
    <h2>Fixture Available for Match</h2>
    </div>
</div>
<br><br><br><br><br>
@endsection
