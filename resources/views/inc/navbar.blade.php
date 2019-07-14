<nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm">
        <div class="container">
                <img src="https://ves.ac.in/vesit/wp-content/uploads/sites/3/2018/07/Logo.png"  width="48"  height="70"  alt="Institute of Technology Logo"  data-scale="1"  /> 
                        <a  class="navbar-brand" href="https://ves.ac.in/vesit/"  title="Institute of Technology">
                         <h3 style="margin-left: 10px"><font color="blue">VIVEKANAND EDUCATION SOCIETY'S</font></h3>
                         <em style="margin-left: 10px"><font color="blue">Institute of Technology</font></em>
                        </a>
                    </p>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font color="blue">Login</font></a>
                            <div class="dropdown-menu bg-primary" aria-labelledby="dropdown01" >
                              <a class="dropdown-item" href="{{ route('login') }}">Student</a>
                              <a class="dropdown-item" href="/login/teacher">Teacher</a>
                              <a class="dropdown-item" href="/login/admin">Admin</a>
                            </div>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font color="blue">Register</font></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown02">
                                <a class="dropdown-item" href="{{ route('register') }}">Student</a>
                                <a class="dropdown-item" href="/register/teacher">Teacher</a>
                            </div>
                        </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        @if(Auth::guard('teacher')->check())
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="/teacher/profile">
                                 {{ __('Edit Profile') }}
                                </a>
                         @else
                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="/home/profile">
                                    {{ __('Edit Profile') }}
                            </a>
                        @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                            </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>