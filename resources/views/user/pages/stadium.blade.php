@extends('user.welcome')
@section('content')
<style>
    .img img{
        width: 96%;
        height: 560px;
        padding-left: 50px;
    }
    .image img{
        width: 356px;
        height: 180px;

    }
    .sec{
        display: flex;
        flex-wrap: wrap;
        padding-left: 100px;
    }
</style>
<br>
<br>
<div class="img">
    <img src="{{url('Venu.jpg')}}">
</div>
<br>
<table id="players">
  <tr>
    <th>Name</th>
    <th>Owner</th>
    <th>capacity</th>
    <th>Location</th>
  </tr>
  @foreach ($data as $venu)
  <tr>
    <td>{{ $venu->name }}</td>
    <td>{{ $venu->owner }}</td>
    <td>{{ $venu->capacity }}</td>
    <td>{{ $venu->location }}</td>
  </tr>
  @endforeach
</table>
<div class="sec">
<div class="image">
    @foreach ($data1 as $item)
        <a href="{{route('admin.pages.showvenu',$item->id) }}"><img src="{{ asset('storage/venu/'.$item->img)}}" ></a>
    @endforeach
</div>
</div>
<br><br>


@endsection
