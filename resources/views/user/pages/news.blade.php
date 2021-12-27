@extends('user.welcome')
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
  .sec{
    display: inline-block;
    padding-left: 100px;
  }
  .playersec{
    padding: 2%;
    display: flex;
  }

  .img img{
    width: 256px;
    height: 200px;
  }
  .info{
      font-family: "Times New Roman", Georgia, serif;
      color: black;
      font-size: 25px;
      border: 2px solid white;
      padding: 25px;
  }

</style>
<div class="contain">
    <h1>NEWS</h1>

</div>
<br>
<section class="sec">

    @foreach($news as $news)
    <div class="playersec">
    <div class="img">
        <a href="{{ route('user.pages.newsDetails', $news->id) }}"><img  src="{{asset('storage/news/'.$news->photo)}}" alt="Item 1"></a>
    </div>
    <div class="info">
        <a href="{{ route('user.pages.newsDetails', $news->id) }}"><h4>{{ $news->headline }}</h4></a>
    </div>
   </div>
@endforeach
</section>
<br>
<br>
@endsection
