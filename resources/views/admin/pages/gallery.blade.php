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
      grid-template-columns: 33.33% 33.33% 33.33%;
      grid-gap: 15px;

  }
  </style>

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
{{-- @dd($data) --}}
@foreach ($data as $gellary)
<div class="card-containers">
    @foreach (explode('|', $gellary->photo) as $image)
  <div class="cards">
    <img style="height:100%; width:100%" src={{url('/storage/gellary/'.$image)}} alt="event">
</div>
  @endforeach
</div>
<br>
@endforeach

@endsection
