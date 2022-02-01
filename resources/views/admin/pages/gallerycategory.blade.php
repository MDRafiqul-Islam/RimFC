@php
    $count = 0;
    foreach ($data as $category){
        $count = $category->count();
    }
    // dd($count);
@endphp
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
      <td>
       <a href="{{ route('admin.pages.deletecategory', $category->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
        <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
      </svg></a>
      </td>
  </tr>
  @endforeach
</table>
  <br><br>
  @if ($count<4)
  <a href="{{route('admin.pages.createGalleryCategory')}}" class="player_button"><button class="button button5">Add Category</button></a>
  @endif
  <br><br>
@endsection
