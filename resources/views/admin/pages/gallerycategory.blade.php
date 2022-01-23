@extends('admin.welcome')
@section('content')

<br>
@if(session()->has('success'))
    <p class="alert-success">
        {{session()->get('success')}}
    </p>
@elseif (session()->has('error'))
<p class="alert-error">
    {{session()->get('error')}}
</p>
@endif
<br>
<table id="players">
  <tr>
    <th>Name</th>
    <th></th>
  </tr>
  @foreach ($data as $category)
  <tr>
      <td>{{$category->name}}</td>
  </tr>
  @endforeach
</table>
  <br><br>
  <a href="{{route('admin.pages.createGalleryCategory')}}" class="player_button"><button class="button button5">Add Category</button></a>
  <br><br>
@endsection
