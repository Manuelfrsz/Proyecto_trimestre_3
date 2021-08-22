<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $idCuentas = $_POST['idCuentas'];
    $Usuarios_idUsuarios = $_POST['Usuarios_idUsuarios'];
    $cueEstado = $_POST['cueEstado'];
    $cueTipo = $_POST['cueTipo'];
	$cueNombre = $_POST['cueNombre'];
	$cueSaldo = $_POST['cueSaldo'];
    
    $consulta="update cuentas set idCuentas= '$idCuentas', Usuarios_idUsuarios= '$Usuarios_idUsuarios', cueEstado= '$cueEstado', cueTipo= '$cueTipo', cueNombre= '$cueNombre', cueSaldo= '$cueSaldo'  where idCuentas= '$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select * from cuentas where idCuentas=$id";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $idCuentas = $row['idCuentas'];
    $Usuarios_idUsuarios = $row['Usuarios_idUsuarios'];
    $cueEstado = $row['cueEstado'];
    $cueTipo = $row['cueTipo'];
	$cueNombre = $row['cueNombre'];
	$cueSaldo = $row['cueSaldo'];
}
?>
<html>
    <head>
        <title>Actualizando cuentas...</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">
            <div class="row">
                <h3>Actualizando cuentas...</h3>
                <div class="col-sm-6"> 
                    <form action="" method="post" name="form1">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                        </div>
                        <div class="form-group">
                            <label>IDCUENTAS</label>
                            <input type="text" name="idCuentas" class="form-control" value="<?php echo $idCuentas; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Usuarios_idUsuarios</label>
                            <input type="text" name="Usuarios_idUsuarios" class="form-control" value="<?php echo $Usuarios_idUsuarios; ?>">
                        </div>
                        <div class="form-group">
                            <label>cueEstado</label>
                            <input type="text" name="cueEstado" class="form-control" value="<?php echo $cueEstado; ?>">
                        </div>
                        <div class="form-group">
                            <label>cueTipo</label>
                            <input type="text" name="cueTipo" class="form-control" value="<?php echo $cueTipo; ?>">
                        </div>
						<div class="form-group">
                            <label>cueNombre</label>
                            <input type="text" name="cueNombre" class="form-control" value="<?php echo $cueNombre; ?>">
                        </div>
						<div class="form-group">
                            <label>cueSaldo</label>
                            <input type="text" name="cueSaldo" class="form-control" value="<?php echo $cueSaldo; ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="Submit" value="Update" class="btn btn-primary btn-block" name="update">    
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>                    