@extends('admin.welcome')
@section('content')
<style>
    .cards {
      box-shadow: 0 4px 8px 0 black;
      transition: 0.3s;
      width: 100%;
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
      padding-left: 8px;

  }
  h1{
        color: green;
        font-size: 20px;
        padding-bottom: 25px;
        padding-top: 25px;
        margin-left: 48%;
  }
  </style>
<br>
{{-- @dd($data) --}}
@foreach ($data as $gellary)
@if($gellary->category_id == 4)
<h1> Date: {{ $gellary->date }}</h1>
<div class="card-containers">
    @foreach (explode('|', $gellary->photo) as $image)
  <div class="cards">
    <img style="height:100%; width:100%" src={{url('/storage/gellary/'.$image)}} alt="event">
</div>
  @endforeach
</div>
@endif
@endforeach
<br>

@endsection
