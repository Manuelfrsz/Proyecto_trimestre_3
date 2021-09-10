<?php


if (isset($_SESSION['registroUsuarios'])) {
    $registroUsuarios = $_SESSION['registroUsuarios'];
    $cantUsuarios = count($registroUsuarios);

}
if (isset($_SESSION['registroCuentas'])) {
    $registroCuentas = $_SESSION['registroCuentas'];
    $cantCuentas = count($registroCuentas);

}
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Movimientos</h2>
    <h3 class="panel-title">Inserción de Moviminetos.</h3>
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
                        <select id="Cuentas_idCuentas" name="Cuentas_idCuentas">    
                            <?php
                            for ($j = 0; $j < $cantCuentas; $j++) {
                                ?>						
                                <option value=<?php echo $registroCuentas[$j]->idCuentas; ?>> <?php echo $registroCuentas[$j]->idCuentas . " - " . $registroCuentas[$j]->cueNombre; ?>   </option>
						    <?php } ?>
                        </select> 
                    </td>                       
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="TIPO DE MOVIMIENTO" name="movTipo" type="text"   required="required" 
						value=<?php if(isset($_SESSION['movTipo'])) echo $_SESSION['movTipo']; unset($_SESSION['movTipo']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="NOMBRE DE MOVIMIENTO" name="movNombre" type="text"  required="required" 
						value=<?php if(isset($_SESSION['movNombre'])) echo $_SESSION['movNombre']; unset($_SESSION['movNombre']);  ?>>
                        <div></div> 
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="NOMBRE CUENTA EN USO" name="movCuentaUso" type="text"  required="required" 
						value=<?php if(isset($_SESSION['movCuentaUso'])) echo $_SESSION['movCuentaUso']; unset($_SESSION['movCuentaUso']);  ?>>
                        <div></div>        
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="VALOR DEL MOVIMIENTO" name="movValor" type="number"  required="required" 
						value=<?php if(isset($_SESSION['movValor'])) echo $_SESSION['movValor']; unset($_SESSION['movValor']);  ?>>
                        <div></div>        
                    </td>
                </tr>  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="FECHA DEL MOVIMIENTO" name="movFecha" type="date"  required="required" 
						value=<?php if(isset($_SESSION['movFecha'])) echo $_SESSION['movFecha']; unset($_SESSION['movFecha']);  ?>>
                        <div></div>        
                    </td>
                </tr>            
                <tr>
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarMovimientos">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarMovimientos">Agregar Movimientos</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>

