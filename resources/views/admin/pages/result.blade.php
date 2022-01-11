@extends('admin.welcome')
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
    @foreach ($result as $result)
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
      <td>
          <br>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg></a>
                <br><br>

      </td>
    </tr>
    @endforeach
</table>
<br>


@endsection
