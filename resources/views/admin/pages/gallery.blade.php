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
  <tr>

  </tr>

</table>
  <br><br>
  <a href="#" class="player_button"><button class="button button5">Add Gallery</button></a>
  <br><br>

@endsection
