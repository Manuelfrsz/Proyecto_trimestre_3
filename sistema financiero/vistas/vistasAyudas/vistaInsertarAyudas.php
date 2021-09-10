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
    <h2 class="panel-title">Gestión de Ayudas</h2>
    <h3 class="panel-title">Inserción de Ayudas</h3>
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
                        <input class="form-control" placeholder="Codigo de Consejo" name="ayuCodigoConsejo" type="text"  required="required" 
						value=<?php if(isset($_SESSION['ayuCodigoConsejo'])) echo $_SESSION['ayuCodigoConsejo']; unset($_SESSION['ayuCodigoConsejo']);  ?>>
                        <div></div> 
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Consejo" name="ayuConsejo" type="text"  required="required" 
						value=<?php if(isset($_SESSION['ayuConsejo'])) echo $_SESSION['ayuConsejo']; unset($_SESSION['ayuConsejo']);  ?>>
                        <div></div>        
                    </td>
                </tr>          
                <tr>
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarAyudas">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarAyudas">Agregar Conaejo</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>

