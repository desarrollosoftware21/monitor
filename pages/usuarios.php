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
                    <h1 class="page-header">Usuarios</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Usuarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tablaUsuarios">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Ultima conexion</th>
                                    <th>Habilitado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $usuarios = Users::getUsers();

                                foreach ($usuarios as $usuario){
                                    echo '<tr>';
                                    echo '<td>'. $usuario->id . '</td>';
                                    echo '<td>'. $usuario->userName . '</td>';
                                    echo '<td>'. $usuario->firstname .' ' . $usuario->lastname . '</td>';
                                    echo '<td>'. $usuario->job_title . '</td>';
                                    echo '<td>'. $usuario->last_connection . '</td>';
                                    echo '<td>';
                                    if ($usuario->enabled == "true") echo "Si" ; else echo "No";
                                    echo '</td>';
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
            $('#tablaUsuarios').DataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ usuarios",
                    "search": "Buscar: ",
                    "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ usuarios",
                    "infoEmpty":      "No hay usuarios para mostrar",
                    "zeroRecords":    "No hay usuarios para mostrar. Sin registros.",
                    "emptyTable":     "Tabla vacía",
                    "infoFiltered":   "(filtrados de un total de _MAX_ usuarios)",
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
