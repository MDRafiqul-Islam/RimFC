@extends('manager.welcome')
@section('content')
<style>
    .btn{
        margin-left: 80%;
    }
</style>
<form action="{{ route('manager.pages.playeredit', $data->id) }}" method="POST">
    @csrf
    @method('PATCH')
<table id="dataTable">
    <tr height="15%;">
    <td><select name="name"><option>{{ $data->player_id }}</option>@foreach($players as $key=>$player) @if ($player->available == 'yes' && $data->player->name != $player->name) <option value="{{$player->id}}">{{$player->name}} </option>@endif @endforeach</select></td>
    <td><select name="position"><option>{{ $data->position }}</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
    <td><select name="status"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
    </tr>
    </table>
    <br>
    <div class="btn">
      <input type="submit" value="Submit">
    </div>
    <br>
</form>
<br><br>
@endsection
