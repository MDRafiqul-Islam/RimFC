<header class="site-header">
      <div class="site-header__top">
        <div class="wrapper site-header__wrapper">
          <div class="site-header__middle">
          <a href="#"><img class="logo" src="{{url('RIMFC.jpg')}}" ></a>
          </div>
          <div class="site-header__end top">
            @if(auth()->user())
            <a href="{{route('user.logout')}}">Logout</a>
            <a style="text-transform: capitalize;" href="{{ route('user.profile', auth()->user()->id) }}"><img style="height:45px; width:45px border: 2px solid red; border-radius: 25px;" src={{asset('/storage/users/'.auth()->user()->photo)}} alt="event"></a>
            <a style="text-transform: capitalize;" href="{{ route('user.profile', auth()->user()->id) }}">{{auth()->user()->name}}</a>
            @else
            <a href="{{route('user.dologin')}}">Login</a>
            @endif
          </div>
        </div>
      </div>
      <div class="site-header__bottom">
        <div class="wrapper site-header__wrapper">
          <div class="site-header__start">
            <nav class="nav">
              <button class="nav__toggle" aria-expanded="false" type="button">
                menu
              </button>
              <ul class="nav__wrapper">
                <li class="nav__item">Fixures
                <div class="dropdown-content">
                    <a href="{{ route('manager.pages.fixture') }}">Fixture</a>
                    <a href="#">Results</a>
                  </div>
                </li>
                <li class="nav__item"><a href="{{ route('manager.pages.playerslist') }}">Players</a></li>
                <li class="nav__item">Match
                  <div class="dropdown-content">
                    <a href="{{ route('manager.pages.position') }}">Position</a>
                    <a href="{{ route('manager.pages.matchplayer') }}">Match Player</a>
                  </div>
                </li>
                <li class="nav__item">Training
                    <div class="dropdown-content">
                    <a href="{{ route('manager.pages.trainingtype') }}">Training</a>
                    <a href="{{ route('manager.pages.trainingstatus') }}">Player Status</a>
                </div>
              </li>
              <li class="nav__item"><a href="{{ route('manager.pages.massage') }}">Massage</a></li>
              </ul>
            </nav>
          </div>
          <div class="site-header__end bottom">
            <div class="search">
              <button class="search__toggle" aria-label="Open search">
                Search
              </button>
              <form class="search__form" action="">
                <label class="sr-only" for="search">Search</label>
                <input
                  type="search"
                  name=""
                  id="search"
                  placeholder="What's on your mind?"
                />
              </form>
            </div>
        </div>
      </div>
    </header>
