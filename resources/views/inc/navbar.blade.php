<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li>
                  <a href="/recipes/">All Recipes</a>
                </li>

                <li>
                  <a href="/about">About</a>
                </li>

                <li>
                  <a href="#" id="sidebar-toggle">
                    <span class="glyphicon glyphicon-search"></span>
                  </a>
                </li>

                @if (!Auth::guest())
                <li>
                  <a href="{{ route('recipes.create') }}">
                    Create Recipe
                    <span class="	glyphicon glyphicon-cutlery"></span>
                  </a>
                </li>
              @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                          @if(Auth::check() && Auth::user()->isAdmin())
                          <li>
                            <a href="{{ route('ingredients.index') }}">Ingredients</a>
                          </li>

                          <li>
                            <a href="{{ route('ingredient-categories.index') }}">Ingredient Categories</a>
                          </li>

                          <li>
                            <a href="{{ route('recipe-categories.index') }}">Recipe Categories</a>
                          </li>

                          <li>
                            <a href="{{ route('measurements.index') }}">Measurements</a>
                          </li>
                          @endif

                          <li>
                            <a href="{{ route('recipes.favorites.index') }}">
                              <span class="glyphicon glyphicon-heart"></span>
                              Favourite Recipes
                            </a>
                          </li>

                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  <span class="	glyphicon glyphicon-log-out"></span>
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
