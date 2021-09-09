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
    <h2 class="panel-title">Gestión de Balances</h2>
    <h3 class="panel-title">Inserción de Balances.</h3>
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
                        <input class="form-control" placeholder="BALANCE TOTAL" name="balTotal" type="number"   required="required" 
						value=<?php if(isset($_SESSION['balTotal'])) echo $_SESSION['balTotal']; unset($_SESSION['balTotal']);  ?>>
                        <div></div>                              
                    </td>
                </tr>           
                <tr>
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarBalances">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarBalances">Agregar Balances</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>

