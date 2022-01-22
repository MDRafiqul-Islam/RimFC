@extends('admin.welcome')
@section('content')
<br>
@if(session()->has('success'))
    <p class="alert-success">
        {{session()->get('success')}}
    </p>
@endif
<table id="players">
    <tr>
      <th>Name</th>
      <th>Position</th>
      <th>Dribbling</th>
      <th>Shooting</th>
      <th>Crossing</th>
      <th>Turning</th>
      <th>Tackling</th>
      <th>Heading</th>
      <th>Passing</th>
      <th></th>
    </tr>
    @foreach ($data as $key=>$status)
    <tr>
      <td width="20%">{{$status->player_name}}</td>
      <td >{{$status->player_position}}</td>
      <td >{{$status->dribbling}}</td>
      <td >{{$status->shooting}}</td>
      <td >{{$status->crossing}}</td>
      <td >{{$status->turning}}</td>
      <td >{{$status->tackling}}</td>
      <td >{{$status->heading}}</td>
      <td >{{$status->passing}}</td>
      <td>
        <a href="{{ route('admin.pages.editstatus', $status->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
          </svg></a>
      </td>
    </tr>
    @endforeach
  </table>
  <br><br>


@endsection
