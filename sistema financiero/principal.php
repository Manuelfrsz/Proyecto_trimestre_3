<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>asistente financiero</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
		 #provisional{
			 width: 95%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		 .gestion{
			 width: 90%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		 #contenido{
			 width: 90%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		
        </style>
    </head>
    <body>
	<div id="provisional"> Interface del aplicativo
	 <div class="gestion">Menú Operaciones en Tabla Libros
	 <br/>
	 <a href="Controlador.php?ruta=listarLibros&pag=0">Listar Libros</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarLibros">Agregar Libros</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Usuarios
	 <br/>
	 <a href="Controlador.php?ruta=listarUsuarios&pag=0">Listar Usuarios</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarUsuarios">Agregar Usuarios</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Cuentas
	 <br/>
	 <a href="Controlador.php?ruta=listarCuentas&pag=0">Listar Cuentas</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarCuentas">Agregar Cuentas</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Balances
	 <br/>
	 <a href="Controlador.php?ruta=listarBalances&pag=0">Listar Balances</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarBalances">Agregar Balances</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Movimientos
	 <br/>
	 <a href="Controlador.php?ruta=listarMovimientos&pag=0">Listar Movimientos</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarMovimientos">Agregar Movimientos</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Soportes
	 <br/>
	 <a href="Controlador.php?ruta=listarSoportes&pag=0">Listar Soportes</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarSoportes">Agregar Soportes</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Calendarios
	 <br/>
	 <a href="Controlador.php?ruta=listarCalendarios&pag=0">Listar Calendarios</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarCalendarios">Agregar Calendarios</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Ayudas
	 <br/>
	 <a href="Controlador.php?ruta=listarAyudas&pag=0">Listar Ayudas</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarAyudas">Agregar Ayudas</a>   	 
	 </div>
     <div id="contenido">
		 <br/>
                Zona de Resultados:
	 <br/>
	 <br/>
	 <?php
	 if(isset($_GET['contenido'])){
		 include($_GET['contenido']);
	 }
	 
	 
	 ?>
	</div>
	</div>

	
	
	
	
	</body>
</html>