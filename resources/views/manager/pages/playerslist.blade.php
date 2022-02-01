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
    @foreach ($player as $players)
    <tr>
      <td width="10%">
          <img style="border-radius: 50%; " width="100px;" src=" {{asset('storage/players/'.$players->photo)}}" alt="players">

      </td>
      <td width="14%">{{$players->jersy_no}}</td>
      <td width="19%">{{$players->name}}</td>
      <td width="16%">{{$players->position}}</td>
      <td width="16%">{{$players->age}}</td>
      <td width="16%">{{$players->foot}}</td>
    </tr>
    @endforeach
  </table>
  <br><br>

@endsection
