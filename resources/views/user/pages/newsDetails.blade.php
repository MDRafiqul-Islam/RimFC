@extends('user.welcome')
@section('content')

<style>
 .contain{
      width: 100%;
      padding-bottom: 20px;
      background: whitesmoke;
      color: rgba(0, 0, 0, 0.747);
      font-size: 30px;
      padding-left: 5%;
      margin: 10px;
      padding-top: 20px;
      font-family: "Times New Roman", Georgia, serif;
      background-size: relative;
      text-transform: uppercase;
      padding-right: 3%;
  }

  .img img{
    width: 650x;
    height: 380px;
    padding-left: 25%;
  }

  hr {
    border: 1px solid black;
    width: 90%;
    background-color:black;
    box-shadow:20px 20px 50px grey;

  }

  .detailes{
    width: 75%;
    padding-left: 25%;
    font-family: "Times New Roman", Georgia, serif;
    text-align: justify;
    text-indent: 50px;
    word-spacing: 6px;
    line-height: 1.4;
    font-size: 19px;
    padding-right: 3%;

  }

</style>
<div class="contain">
    <h1>{{ $news->headline }}</h1>
</div>
<br>
<div class="img">
    <img  src="{{asset('storage/news/'.$news->photo)}}" alt="Item 1">
</div>
<br>
<hr>
<br>
<div class="detailes">
    <h2>{{ $news->detailes }}</h2>
</div>
<br><br>
@endsection
