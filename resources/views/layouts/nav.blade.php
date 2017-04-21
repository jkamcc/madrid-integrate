<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">Administración MSE</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        @if (Auth::guest() && (Route::is('login')))
            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in fa-fw"></i>Ingresar</a></li>
        @else
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    {{ Auth::user()->name }}
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        @endif    
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">                
                <li>
                    <a href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i> Inicio</a>
                </li>
                @if (Auth::check())                            
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Estudiantes<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/estudiantes/nuevo"><i class="fa fa-edit fa-fw"></i>Nuevo</a>
                        </li>
                        <li>
                            <a href="/estudiantes/"><i class="fa fa-table fa-fw"></i> Registro</a>
                        </li>                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>                
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Cursos<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif   
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>