<?php
session_start();

if(isset($_SESSION['mensaje'])) {//isset()
    $mensaje=$_SESSION['mensaje'];//capturamos mensaje que existe
     echo "<script type='text/javascript'>alert('$mensaje');</script>";//imprimimos mensaje
     unset($_SESSION['mensaje']);// eliminamos mensaje
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar cuenta</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">  
    </head>
    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">       
            <div class="row">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>idUsuarios</th>
                            <th>usuTipoDocumento</th>
                            <th>usuDocumento</th>
                            <th>usuNombres</th>
                            <th>usuApellidos</th>
                            <th>idCuentas</th> 
                            <th>cueTipo</th> 
                            <th>cueNombre</th> 
                            <th>cueSaldo</th> 
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './config.php';
                        $query = "SELECT u.idUsuarios, u.usuTipoDocumento, u.usuDocumento, u.usuNombres, ";
                        $query .=  "u.usuApellidos, c.idCuentas, c.cueTipo, c.cueNombre, c.cueSaldo ";
                        $query .= " FROM cuentas c ";
                        $query .= " join usuarios u on c.Usuarios_idUsuarios = u.idUsuarios ";
                        $query .= " order by u.idUsuarios ASC ";
                        $sql = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($sql)) {
                            ?>                       
                            <tr>
                                <td><?php echo $row["idUsuarios"]; ?></td>
                                <td><?php echo $row["usuTipoDocumento"]; ?></td>
                                <td><?php echo $row["usuDocumento"]; ?></td>
                                <td><?php echo $row["usuNombres"]; ?></td>
                                <td><?php echo $row["usuApellidos"]; ?></td>
                                <td><?php echo $row["idCuentas"]; ?></td>    
                                <td><?php echo $row["cueTipo"]; ?></td>  
                                <td><?php echo $row["cueNombre"]; ?></td>  
                                <td><?php echo $row["cueSaldo"]; ?></td>  
                                <td><a href="actualizar.php?id=<?php echo $row["idCuentas"]; ?>">Actualizar</a></td>  
                                <td><a href="borrar.php?id=<?php echo $row["idCuentas"]; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                            </tr>             
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
                                $(document).ready(function () {
                                    $('#example').DataTable();
                                });
</script>
<!--https://eldesvandejose.com/category/jquery/hacks-y-recursos/el-plugin-datatables-->