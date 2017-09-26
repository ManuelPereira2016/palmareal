<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">            
                @if (empty(Auth::user() -> image))                                
                    <img src="{{ Storage::disk('images') -> url( 'user-default.png' ) }}" alt="Usuario" class="img-circle">
                @else
                    <img src="{{ Storage::disk('admins')->url(Auth::user() -> image) }}" alt="Usuario" class="img-circle">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">Menú Principal</li>
            <li {!! ( Request::is('admin') ? 'class="active"' : '') !!}>
                <a href="{{ url('admin') }}">
                    <i class="fa fa-dashboard"></i><span>Inicio</span>
                </a>
            </li>
            @if (in_array(5, array_column(session('roles'), 'fk_id_module')))
                <li {!! ( Request::is('admin/propiedades') ? 'class="active"' : '') !!}>
                    <a href="{{ route('propiedades.index') }}">
                        <i class="fa fa-home"></i><span>Propiedades</span>
                    </a>
                </li>
            @endif            
            @if (in_array(4, array_column(session('roles'), 'fk_id_module')))
            <li {!! ( Request::is('admin/paginas') ? 'class="active"' : '') !!}>
                <a href="{{ route('paginas.index') }}">
                    <i class="fa fa-file-text "></i> <span>Paginas</span>
                </a>
            </li>
            @endif
            @if (in_array(4, array_column(session('roles'), 'fk_id_module')))
                <li {!! ( Request::is('admin/banners') ? 'class="active"' : '') !!}>
                    <a href="{{ route('banners.index') }}">
                        <i class="fa fa-picture-o"></i><span>Banners</span>
                    </a>
                </li>
            @endif       
            @if (in_array(6, array_column(session('roles'), 'fk_id_module')))
            <li {!! ( Request::is('admin/mensajes') ? 'class="active"' : '') !!}>
                <a href="{{ route('mensajes.index') }}">
                    <i class="fa fa-envelope "></i> <span>Mensajes</span>
                </a>
            </li>
            @endif       
            @if (in_array(3, array_column(session('roles'), 'fk_id_module')))
            <li class="treeview {!! ( Request::is('admin/administradores') ||  Request::is('admin/roles') ? 'active' : '') !!}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Usuarios</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {!! ( Request::is('admin/administradores') ? 'class="active"' : '') !!}><a href="{{ route('administradores.index') }}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                    <li {!! ( Request::is('admin/roles') ? 'class="active"' : '') !!}><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i> Roles</a></li>
                </ul>
            </li>
            @endif       
            @if (in_array(2, array_column(session('roles'), 'fk_id_module')))
            <li {!! ( Request::is('admin/historial') ? 'class="active"' : '') !!}>
                <a href="{{ route('historical.index') }}">
                    <i class="fa fa-align-justify "></i> <span>Historial</span>
                </a>
            </li>
            @endif    
            @if (in_array(1, array_column(session('roles'), 'fk_id_module')))
            <li {!! ( Request::is('admin/logs') ? 'class="active"' : '') !!}>
                <a href="{{ route('logs.index') }}">
                    <i class="fa fa-info-circle"></i> <span>Logs</span>
                </a>
            </li>
            @endif
            <li {!! ( Request::is('admin/perfil') ? 'class="active"' : '') !!}>
                <a href="{{ route('perfil.index') }}">
                    <i class="fa fa-cogs"></i> <span>Perfil</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

  <!-- =============================================== -->