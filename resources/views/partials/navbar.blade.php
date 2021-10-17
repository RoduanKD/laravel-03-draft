<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
          <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="/">
            Main
          </a>
          <a class="navbar-item" href="/contact">
            Contact Us
          </a>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              Language
            </a>
            <div class="navbar-dropdown">
                @if (App::isLocale('ar'))
                <a href="/lang/en" class="navbar-item">
                  English
                </a>
                @else
                <a href="/lang/ar" class="navbar-item">
                  Arabic
                </a>
                @endif
            </div>
          </div>
        </div>
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              {{-- <a class="button is-primary">
                <strong>Sign up</strong>
              </a> --}}
              @guest
                <a class="button is-light" href="{{ route('login') }}">
                    Login
                </a>
              @endguest
              @auth
                <div class="navbar-item">Hello {{ Auth::user()->name }}!</div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="button is-danger">
                        Logout
                    </button>
                </form>
              @endauth
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
