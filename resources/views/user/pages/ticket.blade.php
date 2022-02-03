@extends('user.welcome')
@section('content')
<br>
@if(session()->has('error'))
    <p class="alert-error">
        {{session()->get('error')}}
    </p>
@endif
@if(session()->has('success'))
    <p class="alert-success">
        {{session()->get('success')}}
    </p>
@endif
<br>
<table id="players">
    <tr>
        <th>Date</th>
        <th>Club</th>
        <th>Opponent</th>
        <th>Ticket</th>
        <th>Price</th>
        <th>Stadium</th>
        <th></th>
    <tr>
    @foreach ($data as $tcket )
    <tr>
            <td>{{$tcket->date}}</td>
            <td>RIMFC</td>
            <td>{{$tcket->fixture->opponent}}</td>
            <td>{{$tcket->ticket}}</td>
            <td>{{$tcket->price}}</td>
            <td>{{$tcket->venu->name}}</td>
            <td>
            @if($tcket->fixture->resultstatus == "0")
            <a href="{{ route('user.pages.buyticket',$tcket->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
              </svg></a>
            @endif
            </td>
        </tr>
    @endforeach
    </table>
@endsection
