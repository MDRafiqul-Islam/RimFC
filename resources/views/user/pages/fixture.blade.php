@extends('user.welcome')
@section('content')

<br>

<table id="players">
    @foreach ($fixture as $fixture)
    @if ($fixture->resultstatus != 1)
    <tr>
      <td >{{$fixture->date}}</td>
      <td> <img style="border-radius: 50%; " width="56px;" src="{{url('RIMFC.jpg')}}"></td>
      <td >RIMFC</td>
      <td >{{$fixture->time}}</td>
      <td >{{$fixture->opponent}}</td>
      <td>
          <img style="border-radius: 50%; " width="56px;" src=" {{asset('storage/fixture/'.$fixture->photo)}}" alt="players">

      </td>
    </tr>
    @endif
    @endforeach
</table>
<table id="players">
    @foreach ($results as $result )
    <tr>
        <td >{{$result->date}}</td>
        @if(value($result->mygoal)>value($result->opponentgoal))
        <td class="symbol" width="2%">W</td>
        @elseif(value($result->mygoal)<value($result->opponentgoal))
          <td class="symbol1" width="2%">L</td>
      @elseif(value($result->mygoal)== value($result->opponentgoal))
          <td class="symbol2" width="2%">D</td>
          @endif
        <td> <img style="border-radius: 50%; " width="56px;" src="{{url('RIMFC.jpg')}}"></td>
        <td >{{$result->myteam}}</td>
        <td class="goal">{{$result->mygoal}}</td>
        <td class="goal">{{$result->opponentgoal}}</td>
        <td >{{$result->opponent}}</td>
        <td>
            <img style="border-radius: 50%; " width="56px;" src=" {{asset('storage/fixture/'.$result->photo)}}" alt="players">
        </td>
        <td >{{$result->status}}</td>
    </tr>
    @endforeach

</table>
<br><br>


@endsection
