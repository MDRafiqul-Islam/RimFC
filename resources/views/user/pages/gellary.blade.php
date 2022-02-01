@extends('user.welcome')
@section('content')

<style>
    .cards {
      box-shadow: 0 4px 8px 0 black;
      transition: 0.3s;
      width: 95%;
      margin-left: 8px;
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
      grid-gap: 10px;

  }
  </style>
<br>
<br>
@if(session()->has('success'))
    <p class="alert-success">
        {{session()->get('success')}}
    </p>
@elseif (session()->has('error'))
<p class="alert-error">
    {{session()->get('error')}}
</p>
@endif
<br>
<div class="card-containers">
    <div class="cards">
     <a href="{{ route('user.pages.showGalleryplayer') }}"><img style="border-radius: 10px;" width="260px;" height="280px;" src="{{url('player.png')}}" ></a>
    </div>
    <div class="cards">
        <a href="{{ route('user.pages.showGalleryresult') }}"><img style="border-radius: 10px;" width="256px;" height="256px;" src="{{url('result.jpg')}}" ></a>
    </div>
    <div class="cards">
        <a href="{{ route('user.pages.showGalleryachievement') }}"><img style="border-radius: 10px;" width="256px;" height="256px;" src="{{url('achievement.jpg')}}" ></a>
    </div>
    <div class="cards">
        <a href="{{ route('user.pages.showGallerytraining') }}"><img style="border-radius: 10px;" width="256px;" height="256px;" src="{{url('training.jpg')}}" ></a>
    </div>
</div>
<br><br>

@endsection
