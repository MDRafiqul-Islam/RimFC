@extends('admin.welcome')

@section('content')

<br>
@if(session()->has('success'))
    <p class="alert-success">
        {{session()->get('success')}}
    </p>
@endif
<br>
<table id="players">
    <tr>
      <th>Player</th>
      <th>Position</th>
      <th>Min</th>
      <th>Trackles</th>
      <th>Clear</th>
      <th>Goal</th>
      <th>Assist</th>
      <th>Clean Sheet</th>
      <th>Saves</th>
      <th></th>
    </tr>
</table>

<br><br>
<a href="{{route('admin.pages.createplayerstate')}}" class="player_button"><button class="button button5">Add Player</button></a>
<br><br>
@endsection
