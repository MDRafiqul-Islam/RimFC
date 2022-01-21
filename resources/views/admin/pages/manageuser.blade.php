@extends('admin.welcome')

@section('content')

<br>
<table id="players">
  <tr>
    <th>User</th>
    <th>Role</th>
    <th></th>
  </tr>
  @foreach ($user as $users)
  <tr>
   <td width="50%">{{ $users->name }}</td>
   <td width="40%">{{ $users->role }}</td>
   <td ><a href="">Block</a></td>
  </tr>
  @endforeach
</table>
@endsection
