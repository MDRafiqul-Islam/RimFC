@extends('user.welcome')
@section('content')

<style>
    .cards {
      box-shadow: 0 4px 8px 0 lightblue;
      transition: 0.3s;
      width: 100%;
      border-radius: 10px;
      height: 300px;
      background: rgba(24, 22, 22, 0.897);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-left: 10px;
  }
    .card-containers {
      display: grid;
      background-image: url('/uploads/img.gif');
      grid-template-columns: 30% 30% 30%;
      grid-gap: 15px;

  }
  </style>
<br><br>
  <div class="card-containers">
    @foreach ( $data as $sponsor)

      <div class="cards">
      <a href="{{ url($sponsor->link) }}">
      <div>
        <img  width="90%;" height="90%;" src=" {{asset('storage/sponsor/'.$sponsor->photo)}}" >
      </div>
      <br>
      </a>
      </div>
  @endforeach
</div>
<br><br>
@endsection
