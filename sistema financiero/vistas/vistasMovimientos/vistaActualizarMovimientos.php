<?php

if (isset($_SESSION['actualizarDatosMovimientos'])) {
    $actualizarDatosMovimientos = $_SESSION['actualizarDatosMovimientos'];
    unset($_SESSION['actualizarMovimientos']);
}

if (isset($_SESSION['registroCuentas'])) { /* * ************************ */
    $registroCuentas = $_SESSION['registroCuentas'];
    $cantCuentas = count($registroCuentas);
}
?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Movimientos</h2>
    <h3 class="panel-title">Actualización de Movimiento.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="idMovimientos" name="idMovimientos" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosMovimientos->idMovimientos)){ echo $actualizarDatosMovimientos->idMovimientos; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <select id="Cuentas_idCuentas" name="Cuentas_idCuentas"> 
							<?php
							for ($j=0; $j< $cantCuentas; $j++) {
							?>
								<option value ="<?php echo $registroCuentas[$j]->idCuentas; ?>" 
								
                                           <?php
                                if (isset($registroCuentas[$j]->idCuentas) && isset($actualizarDatosMovimientos->Cuentas_idCuentas) && ($registroCuentas[$j]->idCuentas == $actualizarDatosMovimientos->Cuentas_idCuentas)) {
                                    echo "selected";
                                }
                                ?>                                       

                                        > 
								
								<?php echo $registroCuentas[$j]->cueNombre; ?></option> 
							<?php
							}
							?>
						</select> 
                    </td>                       
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="tipo de Movimiento" name="movTipo" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosMovimientos->movTipo)){ echo $actualizarDatosMovimientos->movTipo; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="nombre de Movimiento" name="movNombre" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosMovimientos->movNombre)){ echo $actualizarDatosMovimientos->movNombre; }
							   ?>">
                    </td>
                </tr> 
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="cuenta de Uso" name="movCuentaUso" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosMovimientos->movCuentaUso)){ echo $actualizarDatosMovimientos->movCuentaUso; }
							   ?>">
                    </td>
                </tr> 
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="valor Movimiento" name="movValor" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosMovimientos->movValor)){ echo $actualizarDatosMovimientos->movValor; }
							   ?>">
                    </td>
                </tr> 
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="fecha Movimiento" name="movFecha" type="date"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosMovimientos->movFecha)){ echo $actualizarDatosMovimientos->movFecha; }
							   ?>">
                    </td>
                </tr>                
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarMovimientos">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarMovimientos">Actualizar Movimiento</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>