<?php
//echo "<pre>";
//print_r($_SESSION['listaDeLibros']);
//echo "</pre>";

if (isset($_SESSION['mensaje'])) {
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
if(isset($_SESSION['listaDeCuentas'])){
	
	 $listaDeCuentas=$_SESSION['listaDeCuentas'];
	 unset($_SESSION['listaDeCuentas']);
	
}
?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID Cuenta</th> 
                <th>Tipo de documento</th> 
                <th>Documento</th> 
                <th>Nombres</th> 
                <!--<th>Estado</th>--> 
                <th>Apellidos</th> 
                <th>Tipo de cuenta</th>
                <th>Nombre de cuenta</th>
                <th>Saldo</th>
                <th>Edit</th> 
                <th>Delete</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeCuentas as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeCuentas[$i]->idCuentas; ?></td>  
                    <td><?php echo $listaDeCuentas[$i]->usuTipoDocumento; ?></td>   
                    <td><?php echo $listaDeCuentas[$i]->usuDocumento; ?></td> 
                    <td><?php echo $listaDeCuentas[$i]->usuNombres; ?></td>
                    <td><?php echo $listaDeCuentas[$i]->usuApellidos; ?></td>   
                    <td><?php echo $listaDeCuentas[$i]->cueTipo; ?></td>
                    <td><?php echo $listaDeCuentas[$i]->cueNombre; ?></td>
                    <td><?php echo $listaDeCuentas[$i]->cueSaldo; ?></td>    
                    <!--<td>d>-->    
                    <td><a href="Controlador.php?ruta=actualizarCuentas&idAct=<?php echo $listaDeCuentas[$i]->idCuentas; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarCuentas&idAct=<?php echo $listaDeCuentas[$i]->idCuentas; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeCuentas=null;
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
	
	
	
	
	
	