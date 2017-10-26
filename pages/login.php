<?php

    namespace Monitor;

    require_once '../includes/config.php';

    if(isset($_POST['login'])){
        $error = Access::login();
        if(!$error) {
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitor de Bonita OS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Acceso</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login.php">
                            <fieldset>
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input class="form-control" placeholder="Usuario de Bonita OS" name="user" type="text" value="walter.bates" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password" value="bpm">
                                </div>
                                <div class="form-group">
                                    <label>Host de Bonita OS</label>
                                    <input class="form-control" placeholder="Host de Bonita OS" name="host" type="text" value="http://localhost:8080/bonita/">
                                </div>
                                <input name="login" value="login" type="hidden" />
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" >Login</button>
                            </fieldset>
                        </form>
                    </div>

                    <?php
                    if (isset($error)){
                        echo '<div class="panel-footer">';
                            echo '<div class="alert alert-danger">';
                            echo $error;
                            echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
