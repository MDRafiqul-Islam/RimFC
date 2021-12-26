<header class="site-header">
      <div class="site-header__top">
        <div class="wrapper site-header__wrapper">
          <div class="site-header__middle">
          <a href="#"><img class="logo" src="{{url('images/RIMFC.jpg')}}" ></a>
          </div>
          <div class="site-header__end top">
            <a href="#">Login</a>
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
                <li class="nav__item"><a href="#">News</a></li>
                <li class="nav__item">Fixures
                <div class="dropdown-content">
                    <a href="#">Fixture</a>
                    <a href="#">Results</a>
                    <a href="#">Point Tables</a>
                  </div>
                </li>
                <li class="nav__item"><a href="#">Players</a></li>
                <li class="nav__item">Match
                  <div class="dropdown-content">
                    <a href="#">Available player</a>
                    <a href="#">Position</a>
                    <a href="#">Match Player</a>
                    <a href="#">Match Note</a>    
                  </div>
                </li>
                <li class="nav__item"><a href="#">Training</a></li>
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