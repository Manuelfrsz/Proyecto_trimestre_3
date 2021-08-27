<?php

if (isset($_SESSION['actualizarDatosSoportes'])) {
    $actualizarDatosSoportes = $_SESSION['actualizarDatosSoportes'];
    unset($_SESSION['actualizarSoportes']);
}


?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Soportes</h2>
    <h3 class="panel-title">Actualización de Soporte.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
            <tr>
                    <td>
                        <input class="form-control" placeholder="id del soporte" name="idSoportes" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosSoportes->idSoportes)){ echo $actualizarDatosSoportes->idSoportes; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre del comprobante" name="sopNomComprobante" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosSoportes->sopNomComprobante)){ echo $actualizarDatosSoportes->sopNomComprobante; }
							   ?>">
                    </td>
                </tr>              
                <tr>            
                    <td>            
                        <button type="reset" name="ruta" value="cancelarActualizarSoportes">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarSoportes">Actualizar Soporte</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>

