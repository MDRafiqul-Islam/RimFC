@extends('user.welcome')
@section('content')
<style>
    .symbol{

        color: white;
        background-color: rgb(106, 209, 106);
        background-repeat: no-repeat;
        background-size: 10px 10px cover;
        border-radius: 80px;
        font-size: 20px;
    }
    .symbol1{

        color: white;
        font-size: 20px;
        background-color: rgb(190, 71, 71);
        background-repeat: no-repeat;
        background-size: 10px 10px cover;
        border-radius: 80px;
    }
    .symbol2{
        font-size: 20px;
        color: white;
        background-color: silver;
        background-repeat: no-repeat;
        background-size: 10px 10px cover;
        border-radius: 80px;
    }
    .goal{
        font-size: 35px;
        background-size: 50px 50px;
        border: 1px white;
        background-color: silver;
    }
</style>
<br>

<table id="players">
    @foreach ($results as $result)
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
<br>
@endsection
