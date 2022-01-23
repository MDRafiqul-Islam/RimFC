@extends('admin.welcome')
@section('content')
<br>
<br>
<div class="container">
    <form action="{{ route('admin.pages.createCategory') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-25">
          <label for="name">Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="name" name="name" placeholder="Name..">
        </div>
      </div>
      <br>
      <br>
      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
</div>
<br>
@endsection
