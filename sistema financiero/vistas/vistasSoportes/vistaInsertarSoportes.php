<?php

if (isset($_SESSION['registroMovimientos'])) {
    $registroMovimientos = $_SESSION['registroMovimientos'];
    $cantMovimientos = count($registroMovimientos);

}
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Soportes</h2>
    <h3 class="panel-title">Inserción de Soportes.   </h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <select id="Movimientos_idMovimientos" name="Movimientos_idMovimientos">    
                            <?php
                            for ($j = 0; $j < $cantMovimientos; $j++) {
                                ?>						
                                <option value=<?php echo $registroMovimientos[$j]->idMovimientos; ?>> <?php echo $registroMovimientos[$j]->idMovimientos; ?>   </option>
						    <?php } ?>
                        </select> 
                    </td>                       
                </tr>  
                <tr>
                    <td>                
                        <input class="form-control" placeholder="NOMBRE DEL COMPROBANTE" name="sopNomComprobante" type="text"   required="required" 
						value=<?php if(isset($_SESSION['sopNomComprobante'])) echo $_SESSION['sopNomComprobante']; unset($_SESSION['cueTipo']);  ?>>
                        <div></div>                              
                    </td>
                </tr>            
                <tr>
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarSoportes">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarSoportes">Agregar Soporte</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
