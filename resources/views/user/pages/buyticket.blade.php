@extends('user.welcome')
@section('content')
<style>
    .container{
        max-width: 500px;
        height: 356px;
        background-color: lightblue;
        margin-left: 30%;
        margin-top: 5%;
        margin-bottom: 5%;
    }
    h1{
    color: black;
    font-size: 25px;
    padding-left: 25%;
    padding-top: 5%;
    font-family: "Times New Roman", Georgia, serif;
    }
    h2{
    color: black;
    font-size: 22px;
    padding-left: 40%;
    font-family: "Times New Roman", Georgia, serif;
    }
    label{
    color: black;
    font-size: 20px;
    padding-left: 2%;
    font-family: "Times New Roman", Georgia, serif;
    }
    hr {
    border: 0;
    clear:both;
    display:block;
    width: 100%;
    background-color:black;
    height: 1px;
    padding-left: 80px;
    margin-top: 10px;
    }
</style>

<div class="container">
@foreach ( $data as $ticket )
<h1>Ticket For {{ $ticket->date }}</h1>
<br>
<h2>Price {{ $ticket->price }} ৳</h2>
<hr>
<div class="form">
<form action="{{ route('user.pages.cartticket',$ticket->id) }}" method="POST">
    @csrf
  <label for="Quantity">Quantity</label>
  <select type="number" name="quantity" id="age">
  <option type="number" value="1">1</option>
  <option type="number" value="2">2</option>
  <option type="number" value="3">3</option>
  <option type="number" value="4">4</option>
  <option type="number" value="5">5</option>
  <option type="number" value="6">6</option>
  <option type="number" value="7">7</option>
  <option type="number" value="8">8</option>
  <option type="number" value="9">9</option>
  <option type="number" value="10">10</option>
  <option type="number" value="11">11</option>
  <option type="number" value="12">12</option>
  <option type="number" value="13">13</option>
  <option type="number" value="14">14</option>
  <option type="number" value="15">15</option>
</select>
<br>
<br>
@endforeach
<input type="submit" value="proceed" class="button" >
</form>
</div>
</div>

@endsection
