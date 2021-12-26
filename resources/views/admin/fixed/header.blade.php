<header class="site-header">
      <div class="site-header__top">
        <div class="wrapper site-header__wrapper">
          <div class="site-header__middle">
          <a href="{{url('/')}}"><img class="logo" src="{{url('RIMFC.jpg')}}" ></a>
          </div>
          <div class="site-header__end top">
            <a href="{{ route('admin.logout') }}">Logout</a>
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
                <li class="nav__item"><a href="{{route('admin.pages.news')}}">News</a></li>
                <li class="nav__item"><a href="#">Gallary</a></li>
                <li class="nav__item">Fixures
                <div class="dropdown-content">
                    <a href="#">Fixture</a>
                    <a href="#">Results</a>
                    <a href="#">Point Tables</a>
                    <a href="#">Player Stats</a>
                    <a href="#">Match Player</a>
                    <a href="#">Match Note</a>
                  </div>
                </li>
                <li class="nav__item"><a href="{{route('admin.pages.playerslist')}}">Players</a></li>
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
              <form class="search__form" action="{{ route('admin.pages.searchplayer') }}">
                <label class="sr-only" for="search">Search</label>
               <input
                  type="search"
                  name="search"
                  id="search"
                  placeholder="What's on your mind?"
                />
              </form>
            </div>
        </div>
      </div>
    </header>
