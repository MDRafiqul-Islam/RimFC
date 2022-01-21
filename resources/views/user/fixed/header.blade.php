<header class="site-header">
      <div class="site-header__top">
        <div class="wrapper site-header__wrapper">
          <div class="site-header__middle">
          <a href="#"><img class="logo" src="{{url('RIMFC.jpg')}}" ></a>
          </div>
          <div class="site-header__end top">
            @if(auth()->user())
            <a href="{{route('user.logout')}}">Logout</a>
            <a href="#">{{auth()->user()->name}}</a>
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
                <li class="nav__item"><a href="{{ route('user.pages.news') }}">News</a></li>
                <li class="nav__item"><a href="{{ route('user.pages.massage') }}">Massage</a></li>
                <li class="nav__item">Fixures
                <div class="dropdown-content">
                    <a href="#">Fixture</a>
                    <a href="#">Results</a>
                    <a href="#">Point Tables</a>
                  </div>
                </li>
                <li class="nav__item"><a href="{{ route('user.pages.playerslist') }}">Players</a></li>
                <li class="nav__item"><a href="#">Ticket</a></li>
                <li class="nav__item"><a href="#">Museum</a></li>
                <li class="nav__item">More
                  <div class="dropdown-content">
                    <a href="#">Club</a>
                    <a href="#">Stadium</a>
                    <a href="#">Fans</a>
                    <a href="#">Partner</a>
                  </div>
                </li>
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
