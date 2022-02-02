
@extends('admin.welcome')
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
    @if($player_Sellary>=100000)
    <h1>৳{{ $player_Sellary/1000000 }}m</h1>
    @else
    <h1>৳{{ $player_Sellary }}</h1>
    @endif
    <h2>Player Salary</h2>
    </div>
    <div class="cards">
    @if($total_income>=100000)
    <h1>৳{{ $total_income/1000000 }}m</h1>
    @else
    <h1>৳{{ $total_income }}</h1>
     @endif
    <h2>Total Income</h2>
    </div>
    <div class="cards">
        @if($remaining_salary>=100000)
       <h1>৳{{ $remaining_salary/1000000 }}m</h1>
       @else
       <h1>৳{{ $remaining_salary }}</h1>
       @endif
       <h2>Remain Ammont</h2>
       </div>
       <div class="cards">
        <h1>{{ $count - 2 }}</h1>
        <h2>Users</h2>
       </div>
       <div class="cards">
        <h1>{{ $block }}</h1>
        <h2>Blocked Users</h2>
       </div>
</div>

@endsection
