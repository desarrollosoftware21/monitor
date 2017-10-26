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
                    <h1 class="page-header">Casos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Casos Activos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                            $response = Cases::getCases();
                            if ($response['success']) {
                                $cases = $response['data'];
                                ?>
                                <table class="table table-bordered" width="100%" id="tablaCases"
                                       cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre Proceso</th>
                                        <th>Fecha Inicio</th>
                                        <th>Comenzado por</th>
                                        <th>Actualizado el</th>
                                        <th>Estado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($cases as $case) {
                                        echo '<tr>';
                                        echo '<td>' . $case->id . '</td>';
                                        echo '<td>' . Process::getProcessName($case->processDefinitionId) . '</td>';
                                        echo '<td>' . $case->start . '</td>';
                                        echo '<td>' . Users::getUserUsername($case->started_by) . '</td>';
                                        echo '<td>' . $case->last_update_date . '</td>';
                                        echo '<td>' . $case->state . '</td>';
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
                            Lista de Casos Archivados
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                            $response = Cases::getArchivedCases();
                            if ($response['success']) {
                                $cases = $response['data'];
                                ?>
                                <table class="table table-bordered" width="100%" id="tablaArchivedCases"
                                       cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre Proceso</th>
                                        <th>Fecha Inicio</th>
                                        <th>Comenzado por</th>
                                        <th>Finalizado</th>
                                        <th>Estado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($cases as $case) {
                                        echo '<tr>';
                                        echo '<td>' . $case->id . '</td>';
                                        echo '<td>' . Process::getProcessName($case->processDefinitionId) . '</td>';
                                        echo '<td>' . $case->start . '</td>';
                                        echo '<td>' . Users::getUserUsername($case->started_by) . '</td>';
                                        echo '<td>' . $case->end_date . '</td>';
                                        echo '<td>' . $case->state . '</td>';
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
            $('#tablaCases').dataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ casos",
                    "search": "Buscar: ",
                    "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ casos",
                    "infoEmpty":      "No hay casos para mostrar",
                    "zeroRecords":    "No hay casos para mostrar. Sin registros.",
                    "emptyTable":     "Tabla vacía",
                    "infoFiltered":   "(filtrados de un total de _MAX_ casos)",
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

            $('#tablaArchivedCases').dataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ casos",
                    "search": "Buscar: ",
                    "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ casos",
                    "infoEmpty":      "No hay casos para mostrar",
                    "zeroRecords":    "No hay casos para mostrar. Sin registros.",
                    "emptyTable":     "Tabla vacía",
                    "infoFiltered":   "(filtrados de un total de _MAX_ casos)",
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
