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
                    <h1 class="page-header">Informaci&oacute;n</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <strong> Bonita OS 7.5 - Documentaci&oacute;n </strong>
                        </div>
                        <div class="panel-body">
                            <p>Enlace a la documentaci&oacute;n de Bonita OS.</p>
                            <p><a href="https://documentation.bonitasoft.com/7.5" target="_blank">https://documentation.bonitasoft.com/7.5</a> </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <strong> Bonita OS - Documentaci&oacute;n REST API </strong>
                        </div>
                        <div class="panel-body">
                            <p>Enlace a la documentaci&oacute;n de la API REST de Bonita OS.</p>
                            <p><a href="https://documentation.bonitasoft.com/?page=_rest-api" target="_blank">https://documentation.bonitasoft.com/?page=_rest-api</a> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <strong> Postman </strong>
                        </div>
                        <div class="panel-body">
                            <p>Postman es una herramienta para facilitar la prueba y el desarrollo de aplicaciones que realizan peticiones a la API REST de otras aplicaciones.</p>
                            <p><a href="https://www.getpostman.com/" target="_blank">https://www.getpostman.com/</a> </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <strong> Template Bootstrap </strong>
                        </div>
                        <div class="panel-body">
                            <p>Template utilizado en esta aplicaci&oacute;n.</p>
                            <p><a href="https://startbootstrap.com/template-overviews/sb-admin-2/" target="_blank">https://startbootstrap.com/template-overviews/sb-admin-2//</a> </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include 'layout/defaultFooter.php'; ?>

</body>

</html>
