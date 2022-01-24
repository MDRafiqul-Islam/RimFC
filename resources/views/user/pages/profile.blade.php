@extends('user.welcome')
@section('content')

<style>
  .sec{
    display: flex;
    flex-wrap: wrap;
    padding-left: 100px;
  }
  h1{
    color: lightskyblue;
    font-size: 35px;
    padding-left: 120px;
    padding-right: 120px;
    font-family: "Times New Roman", Georgia, serif;
    text-transform: capitalize;
    padding-bottom: 50px;
  }
h2{
    color: black;
    font-size: 25px;
    padding-left: 120px;
    padding-right: 120px;
    font-family: "Times New Roman", Georgia, serif;
    padding-bottom: 20px;
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
  </style>
<br>
<br>
<div class="sec">
<div class="img">
<img style="height:100%; width:100%" src={{asset('/storage/users/'.$user->photo)}} alt="event">
</div>
<div class="info">
<h1>{{ $user->name }}</h1>
<h2>Email: {{ $user->email }}</h2>
<h2>Mobile: {{ $user->mobile }}</h2>
<h2>Created At: {{ $user->created_at->diffforhumans()}}</h2>
</div>
</div>
<br>
<br>
@endsection
