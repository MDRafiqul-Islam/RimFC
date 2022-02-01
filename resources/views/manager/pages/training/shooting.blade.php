@extends('manager.welcome')
@section('content')
<style>
.button{
    margin-left: 45%;
}
.alert-error{
    background-color: rgb(224, 51, 51) !important;
    height: 30px;
    width: 100%;
    color: whitesmoke;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<br>
@if(session()->has('success'))
    <p class="alert-success">
        {{session()->get('success')}}
    </p>
@elseif(session()->has('error'))
    <p class="alert-error">
        {{session()->get('error')}}
    </p>
@endif
<br>
<table id="players">
    <tr>
      <th width="15%">Date</th>
      <th>Name</th>
    </tr>
    @foreach ($data as $training)
    @if($training->shooting == 1)
    <tr>
    <td>{{ $training->date }}</td>
    <td>{{ $training->Player->name }}</td>
    </tr>
    @endif
    @endforeach
</table>
<br><br>
<a class="button" href="{{ route('manager.pages.addtainingshooting') }}">Add Player</a>
{{-- @dd($data) --}}
@foreach ($data as $training)
@if ($training->date != null && $training->shooting == 1)
<a class="button" href="{{ route('manager.pages.shooting') }}">Train</a>
@break
@endif
@endforeach
<br><br>
@endsection
