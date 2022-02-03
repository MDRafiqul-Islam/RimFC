@extends('admin.welcome')

@section('content')
<style>
.salary{
  padding: 10px;
  height: 130px;
  width: 30%;
  background-color: whitesmoke;
  margin-left: 68%;
}
h1{
    color: black;
    font-size: 20px;
}
</style>
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

<div class="salary">
<h1>Total Ammount = ৳ {{$Total_salary}}  </h1><br>
<h1>Players Salary = ৳ {{$player_salary}} </h1><br>
<h1>Remaining Ammount = ৳ {{$remain_salary}} </h1>
</div>
<br>
<table id="players">
  <tr>
    <th>Image</th>
    <th>Jersy No</th>
    <th>Player Name</th>
    <th>position</th>
    <th>Age</th>
    <th>Foot</th>
    <th>Salary</th>
    <th>Availability</th>
    <th></th>
  </tr>
  @foreach ($players as $key=>$player)
  <tr>
    <td width="10%">
        <img style="border-radius: 50%; " width="100px;" src=" {{asset('storage/players/'.$player->photo)}}" alt="players">

    </td>
    <td width="8%">{{$player->jersy_no}}</td>
    <td width="17%">{{$player->name}}</td>
    <td width="12%">{{$player->position}}</td>
    <td width="12%">{{$player->age}}</td>
    <td width="12%">{{$player->foot}}</td>
    <td width="12%">{{$player->salary}}</td>
    <td width="12%">{{$player->available}}</td>
    <td>

            <a href="{{route('admin.pages.editplayers', $player->id )}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg></a>

            <a href="{{ route('admin.pages.deleteplayers',$player->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg></a>
              <br><br>
    </td>
  </tr>
  @endforeach
</table>
<br>
<a class="player_button" href="{{ route('admin.pages.createGalleryplayer',$player->id) }}"><button class="button button5">Add Gallery</button></a>
<br><br>
<a href="{{route('admin.pages.createplayers')}}" class="player_button"><button class="button button5">Add Player</button></a>
<br><br>
@endsection
