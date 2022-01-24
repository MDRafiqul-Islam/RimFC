@extends('user.welcome')
@section('content')

<style>
    .container{
        max-width: 500px;
        height: 250px;
        background-color: lightblue;
        margin-left: 30%;
        margin-top: 10%;
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
    padding-left: 38%;
    font-family: "Times New Roman", Georgia, serif;
    }

    h3{
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
    select
    {
   -webkit-appearance: none;
   -moz-appearance: none;
   text-indent: 1px;
   text-overflow: '';
   }
   .button{
       padding: 10px;
   }
</style>
<div class="container">
<br>


<h3>Quantity: {{ $data->quantity }} </h3><br>
<h3>Price: {{  $data->price }} ৳</h3>
<br>
    <form action="{{ route('user.pages.confirmcart') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="buy" type="submit" value="Confirm" class="button" >
    </form>
    <a class="button" href="{{ route('user.pages.cancleticket', $data->id) }}">Cancle</a>
</div>
</div>

@endsection
