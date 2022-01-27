@extends('manager.welcome')
@section('content')
<style>
    .row{
        margin-right: 10%;
    }
</style>
<table class="player">
    @foreach ($data as $ticket)
  <tr>
  <form action="{{ route('manager.pages.edit.turning') }}" method="POST">
    @csrf
      <td>
        <div class="col-75">
          <input type="text" id="name" name="player_id[]" value="{{$ticket->player_id}}" >
        </div>
      </div>
    </td>
<td>
        <div class="col-75">
          <input type="text" id="name" name="name" value="{{$ticket->player->name}}" >
        </div>
      </div>
    </td>
<td>
        <div class="col-75">
          <select type="text" id="name" name="status[]" >
              <option value="poor">Poor</option>
              <option value="average">Average</option>
              <option value="good">Good</option>
          </select>
        </div>
      </div>
</td>
</tr>
      @endforeach
    </table>
      <br>
     <div class="row">
    <input type="submit" value="Submit">
  </div>
</form>
<br><br>
@endsection
