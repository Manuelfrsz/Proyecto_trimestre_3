<?php


if (isset($_SESSION['registroUsuarios'])) {
    $registroUsuarios = $_SESSION['registroUsuarios'];
    $cantUsuarios = count($registroUsuarios);

}
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Cuentas</h2>
    <h3 class="panel-title">Inserción de Cuentas.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <select id="Usuarios_idUsuarios" name="Usuarios_idUsuarios">    
                            <?php
                            for ($j = 0; $j < $cantUsuarios; $j++) {
                                ?>						
                                <option value=<?php echo $registroUsuarios[$j]->idUsuarios; ?>> <?php echo $registroUsuarios[$j]->idUsuarios . " - " . $registroUsuarios[$j]->usuNombres . " " . $registroUsuarios[$j]->usuApellidos; ?>   </option>
						    <?php } ?>
                        </select> 
                    </td>                       
                </tr>  
                <tr>
                    <td>                
                        <input class="form-control" placeholder="TIPO DE CUENTA" name="cueTipo" type="text"   required="required" 
						value=<?php if(isset($_SESSION['cueTipo'])) echo $_SESSION['cueTipo']; unset($_SESSION['cueTipo']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="NOMBRE DE CUENTA" name="cueNombre" type="text"  required="required" 
						value=<?php if(isset($_SESSION['cueNombre'])) echo $_SESSION['cueNombre']; unset($_SESSION['cueNombre']);  ?>>
                        <div></div> 
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="SALDO DE LA CUENTA" name="cueSaldo" type="number"  required="required" 
						value=<?php if(isset($_SESSION['cueSaldo'])) echo $_SESSION['cueSaldo']; unset($_SESSION['cueSaldo']);  ?>>
                        <div></div>        
                    </td>
                </tr>             
                <tr>
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarCuentas">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarCuentas">Agregar Cuenta</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
