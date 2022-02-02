@extends('manager.welcome')
@section('content')

<br>
<table id="players">
    <tr>
      <th>Player</th>
      <th>Min</th>
      <th>Trackles</th>
      <th>Clear</th>
      <th>Goal</th>
      <th>Assist</th>
      <th>Clean Sheet</th>
      <th>Saves</th>
    </tr>
    @foreach ( $state as $states)
        <tr>
        <td>{{$states->player->name }}</td>
        <td>{{$states->min}}</td>
        <td>{{$states->tracle }}</td>
        <td>{{$states->clear }}</td>
        <td>{{$states->goal }}</td>
        <td>{{$states->assist }}</td>
        <td>{{$states->cleansheet }}</td>
        <td>{{$states->save}}</td>
        <td></td>
        </tr>
    @endforeach
</table>
<br>
@endsection
