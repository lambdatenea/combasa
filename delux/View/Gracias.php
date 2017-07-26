<!DOCTYPE html>
<HTML lang="es">
	<HEAD>
		<meta charset="UTF-8"> 
		<link rel="stylesheet" type="text/css" href="../Lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../Lib/font-awesome-4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../Lib/css/mycss.css">
		
		<TITLE> Concesionario Delux</TITLE>
		 <link rel="icon" href="../Lib/img/logo/16x16.png" type="image/png" sizes="16x16">
	</HEAD>

	<BODY>

		<!-- ************************* -->
		<!-- NAVBAR DE LA PAGINA -->
		<!-- ************************* -->
		<div class="container-fluid nopadding">
		<header id="header" class="col-lg-12 nopadding">

			<nav class="navbar navbar-default nopadding navbar-fixed-top">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="../index.html"><i class="fa fa-automobile"></i> Delux Car</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="../index.html">Inicio <span class="sr-only">(current)</span></a></li>
			        <li><a href="coches/catalogo.php">Catalogo</a></li>
			      </ul>

			      <ul class="nav navbar-nav navbar-right">
				    <form method="POST" class="navbar-form navbar-left" action="../Controller/coches/busqueda_coche.php" onsubmit="return validar_busqueda()">
				    	<div class="form-group">
					      <input class="form-control" id="texto_buscar" name="texto_buscar" type="text" placeholder="Search">
					      <button type="submit" class="btn btn-warning">Search</button>
				    	</div>
				    </form>

			        <li><a href="panel_de_control.php">Configuracion</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iniciar Sesion <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="clientes/login.php"><i class="fa fa-user fa-fw"></i> Iniciar</a></li>
			            <li><a href="clientes/add_cliente.php"><i class="fa fa-user-plus fa-fw"></i> Registrarse</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="../Controller/clientes/logout_cliente.php"><i class="fa fa-remove fa-fw"></i> Cerrar</a></li>
			          </ul>
			        </li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>

		</header>
		</div>
		<!-- ************************* -->
		<!-- // NAVBAR DE LA PAGINA -->
		<!-- ************************* -->
		<!-- ************************* -->
		<!-- CUERPO DE LA PAGINA -->
		<!-- ************************* -->

		<div class="container-fluid nopadding">
		<main id="body" class="col-lg-12 nopadding">

				<div class="col-lg-12 row nopadding jumbotron" style="margin-top:0.9em;padding-bottom:0.9em">
				  <h2 class="text-center"> <small class="text-success" style="opacity: 0.8;">
				   Usuario Creado Correctamente.
				   </small></h2>
				</div>
				<div class="col-lg-12 row nopadding">
					<div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
						<?php
						session_start();
					   	if(isset($_SESSION['QR'])){
					   		echo '<h1>Gracias por confiar en Delux Car !</h1>';
					   		echo '<p>Si tienes cualquier cuestion no dudes en contactar con nosotros, nuestros datos estan en el apartado de <a target="_blank" href="aviso_legal.php">Aviso Legal.</a></p>';
					   		echo '<p>Tu Email es : <strong style="font-size:1.5em;"> '.$_SESSION['tempEmail'].' </strong> </p>';
					   		echo '<p>Tu Contraseña la puedes obtener en el siguiente Codigo QR: <img src="../Controller/clientes/'.$_SESSION['QR'].'" alt="QR Code"> </p>';
					   		echo '<p><a class="btn btn-info" href="clientes/login.php">Ir a Login</a></p>';
					   	};
						?>
						<span></span>
					</div>
					
				</div>
		</main>
		</div>


		<!-- ************************* -->
		<!-- // CUERPO DE LA PAGINA -->
		<!-- ************************* -->

		<!-- ************************* -->
		<!-- PIE DE LA PAGINA -->
		<!-- ************************* -->

		<div class="container-fluid margin-top nopadding">
			<footer class="footer row col-lg-12 nopadding">
				<p class="text-muted text-center">Delux Car &copy; Copyright 2016. <a target="_blank" href="aviso_legal.php">Aviso Legal</a></p>
			</footer>
		</div>
	
		<!-- ************************* -->
		<!-- // PIE DE LA PAGINA -->
		<!-- ************************* -->
	
		<!-- JAVASCRIPT -->
		<!-- Libreria basica de JQuery y Bootstrap -->
    	 <script src="../Lib/JQuery/jquery1.12.4.js"></script>
		 <script src="../Lib/bootstrap/js/bootstrap.min.js"></script>
		<!-- Libreria basica de Chartist-js -->
		 <script src="../Lib/js/myjs.js"></script>
	</BODY>
</HTML>