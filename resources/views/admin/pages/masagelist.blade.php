@extends('admin.welcome')

@section('content')
<style>
    .col-75{
        margin-left: 30%;
    }

</style>
<table id="players">
    @foreach ($message  as $massage )
    <tr>
    <td width="20%;">{{ $massage ->user->name}}</td>
    <td width="20%;">{{$massage ->updated_at->diffforhumans()}}</td>
    <td>{{ $massage ->massage }}</td>
    </tr>
    @endforeach
</table>
<br>
<form action="{{route('admin.pages.createmassage', $user_id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-75">
          <input type="text" id="age" name="massage" placeholder="Massage">
        </div>
      </div>
      <br>

</form>

@endsection
