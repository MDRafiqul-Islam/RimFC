@extends('admin.welcome')

@section('content')
<style>
    td{
    padding-right: 10px;
}
select {
  -webkit-appearance: none;
  -moz-appearance: none;
  text-indent: 1px;
  text-overflow: '';
}

</style>
<br>
<br>
    <table >
    @foreach ($players as $playerstate)
  <tr>
  <form action="{{ route('admin.pages.addplayerstate') }}" method="POST">
  @csrf
  <td >
    <select name="name[]" style="width: 200px;">><option value="{{$playerstate->player->id}}">{{$playerstate->player->name}}</option></select>
  </td>
  <td >
      <input type="text"  name="position[]" value="{{ $playerstate->position}}" style="width: 100px;">
  </td>
  <td >
      <input type="number"  name="min[]" placeholder="Minutes Played" style="width: 100px;">
  </td>
  <td >
      <input type="number"  name="tracle[]" placeholder="Tracle" style="width: 100px;">
  </td>
  </td >
  <td>
      <input type="number" name="clear[]" placeholder="Clear" style="width: 100px;">
  </td>
  <td >
      <input type="number"  name="goal[]" placeholder="Goal" style="width: 100px;">
  </td>
  <td >
      <input type="number"  name="assist[]" placeholder="Assist" style="width:100px;">
  </td>
<td>
      <input type="number"  name="cleansheet[]" placeholder="Cleansheet" style="width:100px;">
</td>
<td >
      <input type="number"  name="save[]" placeholder="Save" style="width:100px;">
</td>
</tr>
@endforeach
    </table>
  <br>
  <div class="row">
    <input type="submit" value="Submit" >
  </div>
  </form>
</div>
<br>
<br>


@endsection
