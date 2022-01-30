@extends('manager.welcome')
@section('content')

<style>
    .contain{
        width: 100%;
        height: 100px;
        background: whitesmoke;
        color: lightskyblue;
        font-size: 50px;
        padding-left: 110px;
        margin: 10px;
        padding-top: 20px;
        font-family: "Times New Roman", Georgia, serif;
    }
    .img img{
    width: 120px;
    height: 120px;
  }
  .sec{
    display: flex;
    /* flex-wrap: wrap; */
    padding-left: 100px;
    gap: 5%;
    margin-bottom: 20px;
  }
  h2{
    color: lightskyblue;
    font-size: 35px;
    padding-left: 120px;
    font-family: "Times New Roman", Georgia, serif;
  }
  .info{
      background-color: whitesmoke;
      font-family: "Times New Roman", Georgia, serif;
      color: black;
      font-size: 18px;
      border: 2px solid white;
      padding: 25px;
      box-shadow:6px 6px 10px grey;
      background-size: 400px;
  }
  .error{
      color:red;
      background-size: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
</style>

@if(session()->has('success'))
                <p class="error">
                    {{session()->get('success')}}
                </p>
                @endif
<br>
<div class="contain">
    <h1>Playing Position</h1>
</div>
<br>
<br>
<h2>Match Players</h2>
<br>
<table id="players">
    <tr>
        <th>Player</th>
        <th>Position</th>
        <th></th>
    </tr>
    @foreach ($matchplayer as $matchplayers)
    @if (value($matchplayers->status) == 'main')
    <tr>
        <td width="25%"> <div class="img">
            <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
        </div>
       </td>
        <td>{{ $matchplayers->position}}</td>
        <td>
            <a href="{{ route('manager.pages.editplayer', $matchplayers->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg></a>
          </td>
    </tr>
    @endif
    @endforeach
</table>
<br>
<h2>Extra Players</h2>
<br>
<table id="players">
    <tr>
        <th>Player</th>
        <th>Position</th>
        <th></th>
    </tr>
    @foreach ($matchplayer as $matchplayers)
   @if (value($matchplayers->status) == 'extra')
   <tr>
    <td width="25%"> <div class="img">
        <img  src="{{asset('storage/players/'.$matchplayers->player->photo)}}" alt="Item 1">
    </div>
   </td>
    <td>{{ $matchplayers->position}}</td>
    <td>
        <a href="{{ route('manager.pages.editplayer', $matchplayers->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
          </svg></a>
    </td>
</tr>
   @endif
   @endforeach

</table>

@endsection
