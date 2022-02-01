
@php
    $total = 0;
    foreach ( $fixture as $tickets){
        $total+=$tickets->price;
    }
@endphp

@extends('admin.welcome')
@section('content')
<br><br>
<table id="players">
    <tr>
        <th>Date</th>
        <th>Ticket ID</th>
        <th>Fixture ID</th>
        <th>User ID</th>
        <th>User Name</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    @foreach ($fixture as $tickets)
        @if($tickets->status == 'confirm'  )
        <tr>
            <td width="15%">{{ $tickets->created_at}}</td>
            <td width="15%">{{ $tickets->ticket_id}}</td>
            <td width="15%">{{ $tickets->fixture_id}}</td>
            <td width="15%">{{ $tickets->user_id}}</td>
            <td width="15%">{{ $tickets->user->name}}</td>
            <td width="15%">{{ $tickets->quantity}}</td>
            <td width="15%">{{ $tickets->price}}</td>
        </tr>
        @endif
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
           <td>{{ $total }}</td>
        </tr>
    </table>
<br><br>
@endsection
