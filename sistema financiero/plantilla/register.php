<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="../javascript/funciones.js"></script>
    <script type="text/javascript" src="../javascript/md5.js"></script>

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src = "imagenes/Imagen de registro .jpg" width="500" height="500"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea una Cuenta!</h1>
                            </div>
                            <form method="POST" action="../Controlador.php" id="formRegistro">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" placeholder="Nombres" name="nombre" type="text"   required="required" 
                                        value=<?php
                                            if (isset($_SESSION['nombre'])){
                                                echo "\"".$_SESSION['nombre']."\"";
                                                unset($_SESSION['nombre']);}
                                            ?>
                               >
                                    </div>
                                    <div class="col-sm-6">
                                    <input class="form-control form-control-user" placeholder="Apellidos" name="apellidos" type="text"  required="required" 
                                    value=<?php
                                        if (isset($_SESSION['apellidos'])){
                                            echo "\"".$_SESSION['apellidos']."\"";
                                            unset($_SESSION['apellidos']);}
                                        ?>
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                <input class="form-control form-control-user" id="InputCorreo" placeholder="Correo Electrónico" name="email" type="email"  required="required" 
                                    value=<?php
                                    if (isset($_SESSION['email'])){
                                    echo "\"".$_SESSION['email']."\"";
                                    unset($_SESSION['email']);}
                                    ?>
						        >
                                </div>
                                <div class="form-group">
                                <input class="form-control form-control-user" placeholder="Documento" name="documento" type="number" required="required" autofocus 
						        value=<?php 
							        if (isset($_SESSION['documento'])){
                                    echo "\"".$_SESSION['documento']."\"";
                                    unset($_SESSION['documento']);}								   
								    ?>							   
						        >
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user" id="InputPassword" placeholder="Contraseña" name="password" type="password" value=""  required="required">
                                    </div>
                                    <div class="col-sm-6">
                                    <input class="form-control form-control-user" id="InputPassword2" class="form-control" placeholder="Confirmar Contraseña" name="password2" type="password" value="">
                                    </div>
                                </div>
                                <input type="hidden" name="ruta" value="gestionDeRegistro">
                                <button class="btn btn-primary btn-user btn-block" onclick="valida_registro()">Registrar</button> 
                                <hr>
                            </form>
                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="./login.php">Ya tienes una Cuenta? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>