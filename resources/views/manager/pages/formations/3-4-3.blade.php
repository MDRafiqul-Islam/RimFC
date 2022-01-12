@extends('manager.welcome')
@section('content')

<style>
.sec{
    display: flex;
    flex-wrap: wrap;
    padding-left: 110px;
}
.img img{
    width: 400px;
    height: 500px;
    border-top-left-radius: 50px 10px;
   }

 select {
  width: 95%;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.btn{
    margin-left: 85%;
    margin-bottom: 20px;
}
h1{
    text-align: center;
    font-size: 30px;
    color: whitesmoke;
    background-color: rgb(75, 126, 158);
}
</style>
<br>
@if(session()->has('success'))
    <p class="alert-success">
        {{session()->get('success')}}
    </p>
@endif
<br>
<div class="sec">
    <div class="img">
    <img src="{{ url('storage/formation/3-4-3.jpg') }}">
</div>

    <form action="{{ route('manager.pages.createFormation') }}" method="POST">
        @csrf
        <h1>Central Forward</h1>
        <table id="dataTable">
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        </table>
        <h1>Mid Fielder</h1>
        <table id="dataTable">
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        </table>
        <h1>Central Back</h1>
        <table id="dataTable">
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        </table>
        <h1>Goal Keeper</h1>
        <table id="dataTable">
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        </table>
        <h1>Extra Player</h1>
        <table id="dataTable">
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
        <tr height="15%;">
        <td><input type="hidden" name="fixture_id[]" value="{{$fixture->id}}"></td>
        <td><input type="hidden" name="date[]" value="{{$fixture->date}}"></td>
        <td><input type="hidden" name="formation[]" value="3-4-3.jpg"></td>
        <td><select name="name[]"><option>Select Player</option>@foreach ($players as $key=>$player)<option value="{{$player->id}}">{{$player->name}}</option>@endforeach</select></td>
        <td><select name="position[]"><option>Select position</option>@foreach ($players as $key=>$player)<option value="{{$player->position}}">{{$player->position}}</option>@endforeach</select></td>
        <td><select name="status[]"><option value="main">Match Player</option><option value="extra">Extra Player</option></td>
        </tr>
    </table>
    <br>
    <div class="btn">
      <input type="submit" value="Submit">
    </div>
    <br>
    </form>
    <br>
</div>
</div>
@endsection

