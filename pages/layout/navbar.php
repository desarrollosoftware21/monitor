<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Monitor Bonita OS</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <?php echo \Monitor\Access::getUserLogged() . '  '; ?> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                </li>
            </ul>
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="index.php"><i class="fa fa-home fa-fw"></i> Inicio</a>
                </li>
                <li>
                    <a href="usuarios.php"><i class="fa fa-users fa-fw"></i> Usuarios</a>
                </li>
                <li>
                    <a href="procesos.php"><i class="fa fa-th-list fa-fw"></i> Procesos</a>
                </li>
                <li>
                    <a href="casos.php"><i class="fa fa-tasks fa-fw"></i> Casos</a>
                </li>
                <li>
                    <a href="tareas.php"><i class="fa fa-th fa-fw"></i> Tareas</a>
                </li>
                <li>
                    <a href="informacion.php"><i class="fa fa-info-circle fa-fw"></i> Informaci&oacute;n</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>