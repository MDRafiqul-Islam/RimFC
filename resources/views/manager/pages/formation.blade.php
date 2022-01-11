@extends('manager.welcome')
@section('content')
<style>
    .contain{
      width: 100%;
      height: 100px;
      background: whitesmoke;
      color: lightskyblue;
      font-size: 50px;
      padding-left: 110px;
      margin: 10px;
      padding-top: 20px;
      font-family: "Times New Roman", Georgia, serif;
    }
    .sec{
    display: flex;
    flex-wrap: wrap;
    padding-left: 110px;


    }
    .img img{
    width: 300px;
    height: 400px;
    border-top-left-radius: 50px 10px;
    padding: 10%;

   }
</style>

<div class="contain">
    <h1>Formation</h1>
</div>
<div class="sec">
<div class="img">
<a href="{{ route('manager.pages.formations.3-4-2-1',$fixture->id) }}"><img src="{{ url('storage/formation/3-4-2-1.jpg') }}"></a>
</div>
<div class="img">
    <a href="{{route('manager.pages.formations.3-4-3',$fixture->id) }}"> <img src="{{ url('storage/formation/3-4-3.jpg') }}"></a>
</div>
<div class="img">
    <a href="{{route('manager.pages.formations.4-1-2-1-2',$fixture->id) }}"><img src="{{ url('storage/formation/4-1-2-1-2.jpg') }}"></a>
</div>
<div class="img">
    <a href="{{route('manager.pages.formations.4-2-1-3',$fixture->id) }}"> <img src="{{ url('storage/formation/4-2-1-3.jpg') }}"></a>
</div>
<div class="img">
    <a href="{{route('manager.pages.formations.4-3-1-2',$fixture->id) }}"> <img src="{{ url('storage/formation/4-3-1-2.jpg') }}"></a>
</div>
<div class="img">
    <a href="{{route('manager.pages.formations.4-3-3-d',$fixture->id)}}"><img src="{{ url('storage/formation/4-3-3-d.jpg') }}"></a>
</div>
<div class="img">
    <a href="{{route('manager.pages.formations.4-4-2',$fixture->id)}}"><img src="{{ url('storage/formation/4-4-2.jpg') }}"></a>
</div>
</div>
@endsection
