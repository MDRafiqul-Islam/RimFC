@extends('admin.welcome')
@section('content')

<div class="container">

    <form action="{{ route('admin.pages.profileedit', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="col-25">
        <label for="name" id="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" value="{{$data['name']}}">
      </div>
    </div>
      <div class="row">
        <div class="col-25">
          <label for="name">Photo</label>
        </div>
        <div class="col-75">
          <input type="file" id="photo" name="photo" value="{{$data['photo']}}">
        </div>
      </div>
      <br>
      <div class="row">
        <input type="submit" value="Submit">
      </div>
      </form>
    </div>
    <br>
    <br>

@endsection
