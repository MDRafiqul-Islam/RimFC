@extends('admin.welcome')
@section('content')
<style>
    .image img{
        width: 96%;
        height: 560px;
        padding-left: 50px;
    }
</style>
<div class="image">
<img src="{{ asset('storage/venu/'.$data1->img)}}" >
</div>
<a href="{{ route('admin.pages.deletevenu',$data1->id) }}" class="player_button"><button class="button button5">Delete</button></a>

@endsection
