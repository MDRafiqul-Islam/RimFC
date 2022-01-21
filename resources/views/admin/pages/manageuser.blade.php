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
   <td >
    <form action=" {{route('admin.pages.block',$users->id)}} ", method="POST">
        @csrf
        @method('PATCH')
        @if ($users->status == 'active')
          <button class="button" type="submit" name="status" value="block">Block </button>
        @else
          <button class="button" type="submit" name="status" value="active">Unblock </button>
        @endif
      </form>
   </td>
  </tr>
  @endforeach
</table>
@endsection
