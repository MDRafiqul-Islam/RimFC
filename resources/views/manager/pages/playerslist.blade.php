@extends('manager.welcome')
@section('content')
<style>
    .bttn{
        background-color: snow;
        padding: 5px;
    }
</style>
<table id="players">
    <tr>
      <th>Image</th>
      <th>Jersy No</th>
      <th>Player Name</th>
      <th>position</th>
      <th>Age</th>
      <th>Foot</th>
    </tr>
    @foreach ($players as $key=>$player)
    <tr>
      <td width="10%">
          <img style="border-radius: 50%; " width="100px;" src=" {{asset('storage/players/'.$player->photo)}}" alt="players">

      </td>
      <td width="14%">{{$player->jersy_no}}</td>
      <td width="19%">{{$player->name}}</td>
      <td width="16%">{{$player->position}}</td>
      <td width="16%">{{$player->age}}</td>
      <td width="16%">{{$player->foot}}</td>
    </tr>
    @endforeach
  </table>
  <br><br>

@endsection
