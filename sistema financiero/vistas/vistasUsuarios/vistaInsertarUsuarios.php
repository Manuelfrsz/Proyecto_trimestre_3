<?php
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de libros</h2>
    <h3 class="panel-title">Inserción de Libros.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>

                <tr>
                    <td>                
                        <input class="form-control" placeholder="tipo De Documento" name="usuTipoDocumento" type="text"   required="required" 
						value=<?php if(isset($_SESSION['usuTipoDocumento'])) echo $_SESSION['usuTipoDocumento']; unset($_SESSION['usuTipoDocumento']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Documento" name="usuDocumento" type="text"  required="required" 
						value=<?php if(isset($_SESSION['usuDocumento'])) echo $_SESSION['usuDocumento']; unset($_SESSION['usuDocumento']);  ?>>
                        <div></div> 
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Nombres" name="usuNombres" type="text"  required="required" 
						value=<?php if(isset($_SESSION['usuNombres'])) echo $_SESSION['usuNombres']; unset($_SESSION['usuNombres']);  ?>>
                        <div></div>        
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Apellidos" name="usuApellidos" type="text"  required="required" 
						value=<?php if(isset($_SESSION['usuApellidos'])) echo $_SESSION['usuApellidos']; unset($_SESSION['usuApellidos']);  ?>>
                        <div></div>        
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Fecha De Nacimiento" name="usuFechaNacimiento" type="date"  required="required" 
						value=<?php if(isset($_SESSION['usuFechaNacimiento'])) echo $_SESSION['usuFechaNacimiento']; unset($_SESSION['usuFechaNacimiento']);  ?>>
                        <div></div>        
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Edad" name="usuEdad" type="text"  required="required" 
						value=<?php if(isset($_SESSION['usuEdad'])) echo $_SESSION['usuEdad']; unset($_SESSION['usuEdad']);  ?>>
                        <div></div>        
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Estrato" name="usuEstrato" type="text"  required="required" 
						value=<?php if(isset($_SESSION['usuEstrato'])) echo $_SESSION['usuEstrato']; unset($_SESSION['usuEstrato']);  ?>>
                        <div></div>        
                    </td>
                </tr>              
                <tr>
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarUsuarios">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarUsuarios">Agregar Usuario</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>