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
    .img img{
    width: 150px;
    height: 150px;
    border-top-left-radius: 50px 10px;

  }
</style>
<div class="contain">
    <h1>Playing Position</h1>
</div>
<br>
<div class="img">
    {{-- <img  src="{{asset('storage/formation/'.$position->formation)}}" alt="Item 1"> --}}
</div>

@endsection
