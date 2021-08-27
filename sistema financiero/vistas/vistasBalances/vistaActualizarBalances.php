<?php

if (isset($_SESSION['actualizarDatosBalances'])) {
    $actualizarDatosBalances = $_SESSION['actualizarDatosBalances'];
    unset($_SESSION['actualizarBalances']);
}

/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de balances</h2>
    <h3 class="panel-title">Actualización del Balance.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="idBalance" name="idBalances" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosBalances->idBalances)){ echo $actualizarDatosBalances->idBalances; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="balance Total" name="balTotal" type="number" required="required" 
                               value="<?php 
									if(isset($actualizarDatosBalances->balTotal)){ echo $actualizarDatosBalances->balTotal; }
							   ?>">
                    </td>
                </tr>
                    <tr>            
                    <td>            
                        <button type="reset" name="ruta" value="cancelarActualizarBalances">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarBalances">Actualizar Balances</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>
