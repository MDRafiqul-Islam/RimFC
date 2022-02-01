@extends('admin.welcome')
@section('content')


<br>
<br>

<div class="container">

  <form action="{{ route('admin.pages.addGalleryachievement') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-25">
      <label for="player_id">Achievement ID</label>
    </div>
    <div class="col-75">
      <input type="text" id="name" name="player_id" value={{ $result->id }}>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="player_id">Gellary Category</label>
    </div>
    <div class="col-75">
        <select type="text" id="age" name="category_id" >
            @foreach ($gallery as $galleries)
            <option value="{{ $galleries->id }}">{{ $galleries->name }}</option>
            @endforeach
        </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="date">Date</label>
    </div>
    <div class="col-75">
      <input type="date" id="date" name="date" placeholder="Date">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="name">Image</label>
    </div>
    <div class="col-75">
      <input type="file" name="photo[]" placeholder="Photo" multiple>
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="Submit">
  </div>



@endsection
