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
			 width: 80%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		 .gestion{
			 width: 80%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		 #contenido{
			 width: 80%;
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
     <a href="">Agregar Libros</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Usuarios
	 <br/>
	 <a href="">Listar Usuarios</a>
     <br/>
     <a href="">Agregar Usuarios</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Cuentas
	 <br/>
	 <a href="">Listar Cuentas</a>
     <br/>
     <a href="">Agregar Cuentas</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Balances
	 <br/>
	 <a href="">Listar Balances</a>
     <br/>
     <a href="">Agregar Balances</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Movimientos
	 <br/>
	 <a href="">Listar Movimientos</a>
     <br/>
     <a href="">Agregar Movimientos</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Soportes
	 <br/>
	 <a href="">Listar Soportes</a>
     <br/>
     <a href="">Agregar Soportes</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Calendarios
	 <br/>
	 <a href="">Listar Calendarios</a>
     <br/>
     <a href="">Agregar Calendarios</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla Ayudas
	 <br/>
	 <a href="">Listar Ayudas</a>
     <br/>
     <a href="">Agregar Ayudas</a>   	 
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