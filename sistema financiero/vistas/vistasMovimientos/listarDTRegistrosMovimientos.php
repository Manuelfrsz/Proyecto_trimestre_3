<?php
//echo "<pre>";
//print_r($_SESSION['listaDeMovimientos']);
//echo "</pre>";

if (isset($_SESSION['mensaje'])){
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--LAS siguientes lìneas se agregan con el propòsito de dar funcionalidad a un DataTable-->
        <!--**************************************** -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
        <!--**************************************** -->
    </head>
	
	<body>
<?php
if(isset($_SESSION['listaDeMovimientos'])){
	
	 $listaDeMovimientos=$_SESSION['listaDeMovimientos'];
	 unset($_SESSION['listaDeMovimientos']);
	
}
?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>id</th>  
                <th>Tipo de Movimiento</th> 
                <th>Nombre del Movimiento</th>
                <th>Tipo de Cuenta</th>  
                <th>Cuenta de Uso</th>
                <th>valor de Movimiento</th>
                <th>Fecha</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>saldo de Cuenta</th>         
                <th>Edit</th> 
                <th>Delete</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeMovimientos as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeMovimientos[$i]->idMovimientos; ?></td>   
                    <td><?php echo $listaDeMovimientos[$i]->movTipo; ?></td>  
                    <td><?php echo $listaDeMovimientos[$i]->movNombre; ?></td>
                    <td><?php echo $listaDeMovimientos[$i]->cueTipo; ?></td>
                    <td><?php echo $listaDeMovimientos[$i]->movCuentaUso; ?></td>
                    <td><?php echo $listaDeMovimientos[$i]->movValor; ?></td>
                    <td><?php echo $listaDeMovimientos[$i]->movFecha; ?></td>
                    <td><?php echo $listaDeMovimientos[$i]->usuNombres; ?></td>
                    <td><?php echo $listaDeMovimientos[$i]->usuApellidos; ?></td>
                    <td><?php echo $listaDeMovimientos[$i]->cueSaldo; ?></td>    

                    <td><a href="Controlador.php?ruta=actualizarMovimientos&idAct=<?php echo $listaDeMovimientos[$i]->idMovimientos; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarMovimientos&idAct=<?php echo $listaDeMovimientos[$i]->idMovimientos; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeMovimientos=null;
            ?>
        </tbody>
    </table>


    <!--**************************************** -->  
    <!--LAS siguientes lìneas se agregan con el propòsito de dar funcionalidad a un DataTable-->
    <!--**************************************** -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#example').DataTable({
                                pageLength: 5,
                                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
                            });
                        });
    </script>     
    <!--**************************************** -->
    <!--**************************************** -->   



</body>
</html>
	
	
	
	
	
	