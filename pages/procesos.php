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
                    <h1 class="page-header">Procesos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Procesos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table class="table table-bordered" width="100%" id="tablaProcesos" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripci&oacute;n</th>
                                    <th>Versi&oacute;n</th>
                                    <th>Fecha de Carga</th>
                                    <th>Id de inicio</th>
                                    <th>Estado</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $procesos = Process::getAllProcess();

                                foreach ($procesos as $proceso){
                                    echo '<tr>';
                                    echo '<td>'. $proceso->id . '</td>';
                                    echo '<td>'. $proceso->name . '</td>';
                                    echo '<td>'. $proceso->description . '</td>';
                                    echo '<td>'. $proceso->version . '</td>';
                                    echo '<td>'. $proceso->deploymentDate . '</td>';
                                    echo '<td>'. $proceso->actorinitiatorid . '</td>';
                                    echo '<td>'. $proceso->activationState . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

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
            $('#tablaProcesos').dataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ procesos",
                    "search": "Buscar: ",
                    "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ procesos",
                    "infoEmpty":      "No hay procesos para mostrar",
                    "zeroRecords":    "No hay procesos para mostrar. Sin registros.",
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
        } );
    </script>
</body>

</html>
