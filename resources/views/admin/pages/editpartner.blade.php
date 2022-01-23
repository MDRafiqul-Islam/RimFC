@extends('admin.welcome')
@section('content')

<br>
<br>
<div class="container">

    <form action="{{ route('admin.pages.editsponsorlist',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="col-25">
        <label for="date" id="age">Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="date" name="date" value={{ $data->date }}>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" value={{ $data->name }}>
      </div>
    </div>
       <div class="row">
        <div class="col-25">
          <label for="ammount">Ammount</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="ammount" value={{ $data->ammount}}>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="link">link</label>
        </div>
        <div class="col-75">
          <input type="url" id="age" name="link" value={{ $data->link}}>
        </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="name">Photo</label>
      </div>
      <div class="col-75">
        <input type="file" id="photo" name="photo" value={{ $data->photo}}>
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
