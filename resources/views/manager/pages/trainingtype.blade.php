@extends('manager.welcome')
@section('content')

<style>
    .cards {
      box-shadow: 0 4px 8px 0 rgba(204, 16, 16, 0.829);
      transition: 0.3s;
      width: 100%;
      border-radius: 10px;
      height: 445px;
      background: rgba(24, 22, 22, 0.897);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
  }
    .card-containers {
      display: grid;
      background-image: url('/uploads/img.gif');
      grid-template-columns: 33.33% 33.33% 33.33%;
      grid-gap: 15px;

  }
</style>
<br>
<div class="card-containers">
    <div class="cards">

    </div>
</div>


@endsection
