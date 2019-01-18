<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    @if (! Auth::guest() )
        <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('/img/avatar.png') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i>
                        En Línea</a>
                </div>
            </div>
    @endif
    <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu Principal</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Obra</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/depot') }}"><i class="fa fa-circle-o"></i>Obra</a></li>
                <!--<li><a href="#"><i class="fa fa-circle-o"></i>Categorias</a></li>
            <li><a href="{{ url('/product') }}"><i class="fa fa-circle-o"></i>Productos</a></li>-->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Entradas</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/provider') }}"><i class="fa fa-circle-o"></i>Proveedores</a></li>
                    <li><a href="{{ url('/entryAdd') }}"><i class="fa fa-circle-o"></i>Entradas</a></li>
                    <li><a href="{{ url('/entry') }}"><i class="fa fa-circle-o"></i>Historial de Entradas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Salidas</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                <!--<li><a href="{{ url('/personal') }}"><i class="fa fa-circle-o"></i>Personal</a></li>-->
                    <li><a href="{{ url('/egressAdd') }}"><i class="fa fa-circle-o"></i>Salidas</a></li>
                    <li><a href="{{ url('/egress') }}"><i class="fa fa-circle-o"></i>Historial de Salidas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Inventario</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/inventory"><i class="fa fa-circle-o"></i>General</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Herramientas</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i>Maestros
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('/tools/3') }}"><i class="fa fa-circle-o"></i>Control de Herramientas</a>
                            </li>
                            <li>
                                <a href="{{ url('/box/3') }}"><i class="fa fa-circle-o"></i>Precio Caja</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i>Formato para Imprimir</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i>Ayudantes
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('/tools/4') }}"><i class="fa fa-circle-o"></i>Control de Herramientas</a>
                            </li>
                            <li>
                                <a href="{{ url('/box/4') }}"><i class="fa fa-circle-o"></i>Precio Caja</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i>Formato para Imprimir</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i>Electricos
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('/tools/5') }}"><i class="fa fa-circle-o"></i>Control de Herramientas</a>
                            </li>
                            <li>
                                <a href="{{ url('/box/4') }}"><i class="fa fa-circle-o"></i>Precio Caja</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i>Formato para Imprimir</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Reportes</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Usuarios</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/users/nuevo') }}"><i class="fa fa-circle-o"></i>Agregar</a></li>
                    <li><a href="{{ url('/admin/users') }}"><i class="fa fa-circle-o"></i>Listado</a></li>
                    <li><a href="{{ url('/list') }}"><i class="fa fa-circle-o"></i>Listado Personal/Proveedores</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
