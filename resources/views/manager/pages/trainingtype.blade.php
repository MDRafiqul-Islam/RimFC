@extends('manager.welcome')
@section('content')

<style>
    .cards {
      box-shadow: 0 4px 8px 0 ;
      transition: 0.3s;
      width: 95%;
      border-radius: 10px;
      height: 445px;
      background: rgba(24, 22, 22, 0.897);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
  }
    .card-containers {
      display: grid;
      grid-template-columns: 33% 33% 33%;
      grid-gap: 15px;
  }
  h1{
    color: white;
    font-size: 20px;
    font-family: "Times New Roman", Times, serif;
  }

</style>
<br>
<br>
<div class="card-containers">
    <div class="cards">
        <a href="{{ route('manager.pages.training.dribbling') }}"><img style="border-radius: 10px;" width="260px;" height="280px;" src="{{url('dribbling.jpg')}}" ></a><br>
        <h1>Dribbling</h1>
       </div>
       <div class="cards">
           <a href="{{ route('manager.pages.training.crossing') }}"><img style="border-radius: 10px;" width="256px;" height="256px;" src="{{url('crossing.png')}}" ></a><br>
           <h1>Crossing</h1>
       </div>
       <div class="cards">
           <a href="{{ route('manager.pages.training.heading') }}"><img style="border-radius: 10px;" width="256px;" height="256px;" src="{{url('heading.jpg')}}" ></a><br>
           <h1>Heading</h1>
       </div>
       <div class="cards">
           <a href="{{ route('manager.pages.training.passing') }}"><img style="border-radius: 10px;" width="256px;" height="256px;" src="{{url('passing.jpg')}}" ></a><br>
           <h1>Passing</h1>
       </div>
       <div class="cards">
           <a href="{{ route('manager.pages.training.shooting') }}"><img style="border-radius: 10px;" width="256px;" height="256px;" src="{{url('shooting.jpg')}}" ></a><br>
           <h1>Shooting</h1>
       </div>
       <div class="cards">
           <a href="{{ route('manager.pages.training.tracling') }}"><img style="border-radius: 10px;" width="256px;" height="256px;" src="{{url('tracling.jpg')}}" ></a><br>
           <h1>Tracling</h1>
      </div>
      <div class="cards">
          <a href="{{ route('manager.pages.training.turning') }}"><img style="border-radius: 10px;" width="256px;" height="256px;" src="{{url('turning.jpg')}}" ></a><br>
          <h1>Turning</h1>
      </div>
</div>
<br><br>
@endsection
