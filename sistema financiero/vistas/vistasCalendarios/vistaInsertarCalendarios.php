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
    <h2 class="panel-title">Gestión de Calendarios</h2>
    <h3 class="panel-title">Inserción de Calendarios</h3>
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
                        <input class="form-control" placeholder="Tipo de Pago" name="calTipoPago" type="text"  required="required" 
						value=<?php if(isset($_SESSION['calTipoPago'])) echo $_SESSION['calTipoPago']; unset($_SESSION['calTipoPago']);  ?>>
                        <div></div> 
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Nombre de Pago" name="calNomPago" type="text"  required="required" 
						value=<?php if(isset($_SESSION['calNomPago'])) echo $_SESSION['calNomPago']; unset($_SESSION['calNomPago']);  ?>>
                        <div></div>        
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Fecha De Pago" name="calFechaPago" type="date"  required="required" 
						value=<?php if(isset($_SESSION['calFechaPago'])) echo $_SESSION['calFechaPago']; unset($_SESSION['calFechaPago']);  ?>>
                        <div></div>        
                    </td>
                </tr>           
                <tr>
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarCalendarios">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarCalendarios">Agregar fecha de Calendario</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
