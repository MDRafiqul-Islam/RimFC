@extends('admin.welcome')

@section('content')
<style>
    .img img{
        width: 96%;
        height: 560px;
        padding-left: 50px;
    }
    .col-25{
        padding-left: 2.5%;
    }
</style>
<br>
<div class="img">
    <img src="{{url('Venu.jpg')}}">
</div>
<br>

<div class="container">

    <form action="{{ route('admin.pages.addvenu') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-25">
          <label for="name">Venu Id</label>
        </div>
        <div class="col-75">
        @foreach ($data as $venu)
          <input type="number" id="age" name="venu_id" value="{{ $venu->id }}">
        @endforeach
        </div>
      </div>
    <div class="row">
        <div class="col-25">
          <label for="name">Photo</label>
        </div>
        <div class="col-75">
          <input type="file" id="photo" name="photo" placeholder="Photo..">
        </div>
      </div>
    <br>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
    </form>
    <br>

@endsection
