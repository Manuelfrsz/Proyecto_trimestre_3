<?php
//echo "<pre>";
//print_r($_SESSION['listaDeCalendarios']);
//echo "</pre>";
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
if(isset($_SESSION['listaDeCalendarios'])){
	
	 $listaDeCalendarios=$_SESSION['listaDeCalendarios'];
	 unset($_SESSION['listaDeCalendarios']);
	
}
?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>idCalendarios</th> 
                <th>Nombres del Usuario</th>
                <th>Apellidos del Usuario</th>  
                <th>Tipo de Pago</th> 
                <th>Nombre de Pago</th> 
                <th>Fecha de Pago</th> 
                <th>Edit</th> 
                <th>Delete</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeCalendarios as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeCalendarios[$i]->idCalendarios; ?></td>  
                    <td><?php echo $listaDeCalendarios[$i]->usuNombres; ?></td>
                    <td><?php echo $listaDeCalendarios[$i]->usuApellidos; ?></td> 
                    <td><?php echo $listaDeCalendarios[$i]->calTipoPago; ?></td>  
                    <td><?php echo $listaDeCalendarios[$i]->calNomPago; ?></td>    
                    <td><?php echo $listaDeCalendarios[$i]->calFechaPago; ?></td>  
                    
                    <td><a href="Controlador.php?ruta=actualizarCalendario&idAct=<?php echo $listaDeCalendarios[$i]->idCalendarios; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarCalendario&idAct=<?php echo $listaDeCalendarios[$i]->idCalendarios; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeCalendarios=null;
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
	
	
	
	
	
	