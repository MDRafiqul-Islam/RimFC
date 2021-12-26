<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>RIMFC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{url('css/totalBody.css') }}" />
    <link rel="stylesheet" href="{{url('css/header.css')}}" />
    <link rel="stylesheet" href="{{url('css/navvar.css')}}" />
    <link rel="stylesheet" href="{{url('css/footer.css')}}" />
    <link rel="stylesheet" href="{{url('css/playerlist.css')}}" />
    <link rel="stylesheet" href="{{url('css/playerlistform.css')}}" />
    <link rel="stylesheet" href="{{url('css/min.css')}}" />

  </head>
  <body>

    <!-- Header Start -->
    @include('user.fixed.header')

    @yield('content')

    @include('user.fixed.footer')

    <script src="{{url('js/header.js')}}"></script>
  </body>
</html>
