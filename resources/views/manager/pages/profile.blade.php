@extends('manager.welcome')
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
    <a href="{{ route('manager.pages.editprofile',$user->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
      </svg></a>
<h1>{{ $user->name }}</h1>
<h2>Email: {{ $user->email }}</h2>
<h2>Mobile: {{ $user->mobile }}</h2>
<h2>Created At: {{ $user->created_at->diffforhumans()}}</h2>
</div>
</div>
<br>
<br>
@endsection
