<?php

namespace Monitor;

require '../includes/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layout/defaultHead.php'; ?>

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'layout/navbar.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Inicio</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo Users::getCountUsers(); ?> </div>
                                    <div>Usuarios</div>
                                </div>
                            </div>
                        </div>
                        <a href="usuarios.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Usuarios</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-th-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo Process::getCountProcess(); ?> </div>
                                    <div>Procesos</div>
                                </div>
                            </div>
                        </div>
                        <a href="procesos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Procesos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo Cases::getCountCases(); ?></div>
                                    <div>Casos Activos</div>
                                </div>
                            </div>
                        </div>
                        <a href="casos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver todos los Casos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-th fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo Task::getCountTasks(); ?></div>
                                    <div>Tareas Activas</div>
                                </div>
                            </div>
                        </div>
                        <a href="tareas.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver todas las Tareas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Informaci&oacute;n de Sesi&oacute;n
                        </div>
                        <div class="panel-body">
                        <?php $info = Access::getSessionInfo();
                            echo '<p> <strong>ID Usuario: </strong>'. $info->user_id.'</p>';
                            echo '<p> <strong>Usuario: </strong>'. $info->user_name.'</p>';
                            echo '<p> <strong>ID Sesi&oacute;n: </strong>'. $info->session_id.'</p>';
                            echo '<p> <strong>Version Bonita OS: </strong>'. $info->version.'</p>';
                        ?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Informaci&oacute;n de <?php echo Users::getUserUsername($info->user_id); ?>
                        </div>
                        <div class="panel-body">
                        <?php $user = Users::getUserInfo($info->user_id);
                            echo '<p> <strong>ID Usuario: </strong>'. $user->id.'</p>';
                            echo '<p> <strong>Usuario: </strong>'. $user->userName.'</p>';
                            echo '<p> <strong>Nombre: </strong>'. $user->firstname.'</p>';
                            echo '<p> <strong>Apellido: </strong>'. $user->lastname.'</p>';
                            echo '<p> <strong>Cargo: </strong>'. $user->job_title.'</p>';
                            if ($user->manager_id)
                                echo '<p> <strong>Jefe: </strong>'. $user->manager_id->userName.'</p>';
                        ?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-6 -->
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include 'layout/defaultFooter.php'; ?>

</body>

</html>
