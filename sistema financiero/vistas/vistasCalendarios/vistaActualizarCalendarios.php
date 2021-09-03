<?php

if (isset($_SESSION['actualizarDatosCalendarios'])) {
    $actualizarDatosCalendarios = $_SESSION['actualizarDatosCalendarios'];
    unset($_SESSION['actualizarCalendarios']);
}


?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Calendarios</h2>
    <h3 class="panel-title">Actualización de Calendario.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
            <tr>
                    <td>
                        <input class="form-control" placeholder="id del Calendario" name="idCalendarios" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosCalendarios->idCalendarios)){ echo $actualizarDatosCalendarios->idCalendarios; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Tipo del pago" name="calTipoPago" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosCalendarios->calTipoPago)){ echo $actualizarDatosCalendarios->calTipoPago; }
							   ?>">
                    </td>
                </tr>   
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre del pago" name="calNomPago" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosCalendarios->calNomPago)){ echo $actualizarDatosCalendarios->calNomPago; }
							   ?>">
                    </td>
                </tr> 
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Fecha del pago" name="calFechaPago" type="date"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosCalendarios->calFechaPago)){ echo $actualizarDatosCalendarios->calFechaPago; }
							   ?>">
                    </td>
                </tr>          
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarCalendarios">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarCalendarios">Actualizar Calendario</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>
