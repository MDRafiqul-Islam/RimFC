@extends('user.welcome')
@section('content')
<style>
    .container{
        max-width: 500px;
        height: 500px;
        background-color: lightblue;
        margin-left: 30%;
        margin-top: 10%;
        margin-bottom: 5%;
    }
    h2{
    color: black;
    font-size: 22px;
    padding-left: 15%;
    font-family: "Times New Roman", Georgia, serif;
    }
    h3{
    color: black;
    font-size: 22px;
    padding-left: 70%;
    font-family: "Times New Roman", Georgia, serif;
    }
   .button{
       margin-left: 70%;
   }
</style>
<div class="container">
<div id="divToPrint">
    <br>
    <h2>Ticket ID: {{ $tic->ticket_id }}</h2><br>
    <h2>Fixture ID: {{ $tic->fixture_id }} </h2><br>
    <h2>User ID: {{ $tic->user_id }}</h2><br>
    <h2>User Name: {{ $tic->user->name }}</h2><br>
    <h2>Quantity: {{ $tic->quantity }}</h2><br>
    <h2>Price:৳ {{ $tic->price }}</h2><br><br>
    <h3>---------------</h3><br>
    <h3>{{ $tic->user->name }}</h3>
</div>
<br><br>
<input class="button" type="button" onClick="PrintDiv('divToPrint');" value="Print">
</div>
@endsection

<script language="javascript">
    function PrintDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
