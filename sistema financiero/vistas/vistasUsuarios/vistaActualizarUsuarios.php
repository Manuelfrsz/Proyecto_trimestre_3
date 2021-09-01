<?php

if (isset($_SESSION['actualizarDatosUsuarios'])) {
    $actualizarDatosUsuarios = $_SESSION['actualizarDatosUsuarios'];
    unset($_SESSION['actualizarUsuarios']);
}

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Usuarios</h2>
    <h3 class="panel-title">Actualización de Usuario.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="idUsuario" name="idUsuarios" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosUsuarios->idUsuarios)){ echo $actualizarDatosUsuarios->idUsuarios; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="tipo De Documento" name="usuTipoDocumento" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosUsuarios->usuTipoDocumento)){ echo $actualizarDatosUsuarios->usuTipoDocumento; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Documento" name="usuDocumento" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosUsuarios->usuDocumento)){ echo $actualizarDatosUsuarios->usuDocumento; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Nombres" name="usuNombres" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosUsuarios->usuNombres)){ echo $actualizarDatosUsuarios->usuNombres; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Apellidos" name="usuApellidos" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosUsuarios->usuApellidos)){ echo $actualizarDatosUsuarios->usuApellidos; }
							   ?>">
                    </td>
                </tr> 
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Fecha De Nacimiento" name="usuFechaNacimiento" type="date"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosUsuarios->usuFechaNacimiento)){ echo $actualizarDatosUsuarios->usuFechaNacimiento; }
							   ?>">
                    </td>
                </tr> 
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Edad" name="usuEdad" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosUsuarios->usuEdad)){ echo $actualizarDatosUsuarios->usuEdad; }
							   ?>">
                    </td>
                </tr> 
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Estrato" name="usuEstrato" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosUsuarios->usuEstrato)){ echo $actualizarDatosUsuarios->usuEstrato; }
							   ?>">
                    </td>
                </tr>                
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarUsuarios">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarUsuarios">Actualizar Usuario</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>