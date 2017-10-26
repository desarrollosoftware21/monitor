<?php

namespace Monitor;

require '../includes/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layout/defaultHead.php'; ?>

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'layout/navbar.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tareas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Tareas Activas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                            $response = Task::getTasks();
                            if ($response['success']) {
                                $tasks = $response['data'];
                                ?>
                                <table class="table table-bordered" width="100%" id="tablaTasks"
                                       cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id del Proceso</th>
                                        <th>Nombre</th>
                                        <th>Descripci&oacute;n</th>
                                        <th>Tipo de Tarea</th>
                                        <th>Asignada</th>
                                        <th>Completada</th>
                                        <th>Prioridad</th>
                                        <th>Estado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($tasks as $task) {
                                        echo '<tr>';
                                        echo '<td>' . $task->processId . '</td>';
                                        echo '<td>' . $task->displayName . '</td>';
                                        echo '<td>' . $task->description . '</td>';
                                        echo '<td>' . $task->type . '</td>';
                                        echo '<td>' . $task->assigned_date . '</td>';
                                        echo '<td>' . $task->reached_state_date . '</td>';
                                        echo '<td>' . $task->priority . '</td>';
                                        echo '<td>' . $task->state . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo $response['message'];
                            }
                            ?>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Tareas Archivadas
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                            $response = Task::getArchivedTasks();
                            if ($response['success']) {
                                $tasks = $response['data'];
                                ?>
                                <table class="table table-bordered" width="100%" id="tablaArchivedTasks"
                                       cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id del Proceso</th>
                                        <th>Nombre</th>
                                        <th>Descripci&oacute;n</th>
                                        <th>Tipo de Tarea</th>
                                        <th>Asignada</th>
                                        <th>Completada</th>
                                        <th>Prioridad</th>
                                        <th>Estado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($tasks as $task) {
                                        echo '<tr>';
                                        echo '<td>' . $task->processId . '</td>';
                                        echo '<td>' . $task->displayName . '</td>';
                                        echo '<td>' . $task->description . '</td>';
                                        echo '<td>' . $task->type . '</td>';
                                        echo '<td>' . $task->assigned_date . '</td>';
                                        echo '<td>' . $task->reached_state_date . '</td>';
                                        echo '<td>' . $task->priority . '</td>';
                                        echo '<td>' . $task->state . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                                echo $response['message'];
                            }
                            ?>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include 'layout/defaultFooter.php'; ?>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
        $(document).ready( function() {
            $('#tablaTasks').dataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ tareas",
                    "search": "Buscar: ",
                    "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ tareas",
                    "infoEmpty":      "No hay tareas para mostrar",
                    "zeroRecords":    "No hay tareas para mostrar. Sin registros.",
                    "emptyTable":     "Tabla vacía",
                    "infoFiltered":   "(filtrados de un total de _MAX_ procesos)",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Última",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "aria": {
                        "sortAscending":  ": ordenar ascendente",
                        "sortDescending": ": ordenar descendente"
                    }
                }
            } );

            $('#tablaArchivedTasks').dataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ tareas",
                    "search": "Buscar: ",
                    "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ tareas",
                    "infoEmpty":      "No hay tareas para mostrar",
                    "zeroRecords":    "No hay tareas para mostrar. Sin registros.",
                    "emptyTable":     "Tabla vacía",
                    "infoFiltered":   "(filtrados de un total de _MAX_ tareas)",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Última",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "aria": {
                        "sortAscending":  ": ordenar ascendente",
                        "sortDescending": ": ordenar descendente"
                    }
                }
            } );
        } );
    </script>
</body>

</html>
