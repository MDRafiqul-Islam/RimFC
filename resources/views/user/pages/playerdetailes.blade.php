@extends('user.welcome')
@section('content')

<style>

  .img img{
    width: 650x;
    height: 380px;
    padding-left: 35%;
  }


  .detailes{
    width: 75%;
    padding-left: 20%;
    font-family: "Times New Roman", Georgia, serif !important;
    text-align: justify;
    text-indent: 50px;
    word-spacing: 6px;
    line-height: 1.4;
    font-size: 19px;

  }

</style>

<br>
<div class="img">
    <img  src="{{asset('storage/players/'.$player->photo)}}" alt="Item 1">
</div>
<br>
<hr>
<br>
<div class="detailes">
    <h2>This is {{ $player->name }}. He contains {{ $player->jersy_no }} jersy. He is {{ $player->age }} years old. He is a {{ $player->foot }} footballer.
        He got {{ $achievement->ballon_d_or }} ballon_d_or, {{ $achievement->fifa_best }} fifa_best award, {{ $achievement->ball }} golden ball, {{ $achievement->boot }} golden boot and {{ $achievement->globes}} golden globes.
        He does {{ $state->tracle }} tracle, {{ $state->clear }} clear, {{ $state->goal }} goal, {{ $state->assist }} assist,
        {{ $state->cleansheet }} cleansheet, {{ $state->save }} save.</h2><br>
</div>
<br><br>
@endsection
