<?php

if (isset($_SESSION['actualizarDatosCuentas'])) {
    $actualizarDatosCuentas = $_SESSION['actualizarDatosCuentas'];
    unset($_SESSION['actualizarCuentas']);
}

/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Cuentas</h2>
    <h3 class="panel-title">Actualización de cuenta.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
            <tr>
                    <td>
                        <input class="form-control" placeholder="id Cuenta" name="idCuentas" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosCuentas->idCuentas)){ echo $actualizarDatosCuentas->idCuentas; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Tipo de cuenta" name="cueTipo" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosCuentas->cueTipo)){ echo $actualizarDatosCuentas->cueTipo; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Nombre de la cuenta" name="cueNombre" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosCuentas->cueNombre)){ echo $actualizarDatosCuentas->cueNombre; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="SALDO" name="cueSaldo" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosCuentas->cueSaldo)){ echo $actualizarDatosCuentas->cueSaldo; }
							   ?>">
                    </td>
                </tr>               
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarCuentas">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarCuentas">Actualizar Cuenta</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>

