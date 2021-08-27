<?php

if (isset($_SESSION['actualizarDatosAyudas'])) {
    $actualizarDatosAyudas = $_SESSION['actualizarDatosAyudas'];
    unset($_SESSION['actualizarAyudas']);
}

/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de ayudas</h2>
    <h3 class="panel-title">Actualización de ayudas.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="idAyudas" name="idAyudas" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosAyudas->idAyudas)){ echo $actualizarDatosAyudas->idAyudas; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="consejos" name="ayuConsejo" type="text" required="required" 
                               value="<?php 
									if(isset($actualizarDatosAyudas->ayuConsejo)){ echo $actualizarDatosAyudas->ayuConsejo; }
							   ?>">
                    </td>
                </tr>
                    <tr>            
                    <td>            
                        <button type="reset" name="ruta" value="cancelarActualizarAyudas">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarAyudas">Actualizar Balances</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>
