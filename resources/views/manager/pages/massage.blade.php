@extends('manager.welcome')

@section('content')
<style>
    table{
        margin-bottom: 15%;
    }
</style>
<table id="players">
    <tr>
        <th>Available</th>
    </tr>

    @foreach ($userlist as $userslist)
   <tr>
    <td><a href="{{ route('manager.pages.massagelist', $userslist->id) }}">{{ $userslist->name }}</a></td>
   </tr>
   @endforeach

</table>

@endsection
