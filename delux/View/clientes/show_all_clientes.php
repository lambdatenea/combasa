<!DOCTYPE html>
<HTML lang="es">
	<HEAD>
		<meta charset="UTF-8"> 
		<link rel="stylesheet" type="text/css" href="../../Lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../Lib/font-awesome-4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../Lib/css/mycss.css">
		
		<TITLE> Concesionario Delux</TITLE>
		 <link rel="icon" href="../../Lib/img/logo/16x16.png" type="image/png" sizes="16x16">
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
			      <a class="navbar-brand" href="../../index.html"><i class="fa fa-automobile"></i> Delux Car</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="../../index.html">Inicio <span class="sr-only">(current)</span></a></li>
			        <li><a href="../coches/catalogo.php">Catalogo</a></li>
			      </ul>

			      <ul class="nav navbar-nav navbar-right">
				    <form method="POST" class="navbar-form navbar-left" action="../../Controller/coches/busqueda_coche.php" onsubmit="return validar_busqueda()">
				    	<div class="form-group">
					      <input class="form-control" id="texto_buscar" name="texto_buscar" type="text" placeholder="Search">
					      <button type="submit" class="btn btn-warning">Search</button>
				    	</div>
				    </form>

			        <li class="active"><a href="../panel_de_control.php">Configuracion</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iniciar Sesion <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="login.php"><i class="fa fa-user fa-fw"></i> Iniciar</a></li>
			            <li><a href="add_cliente.php"><i class="fa fa-user-plus fa-fw"></i> Registrarse</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="../../Controller/clientes/logout_cliente.php"><i class="fa fa-remove fa-fw"></i> Cerrar</a></li>
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

				<div class="col-lg-12 row nopadding jumbotron style="margin-top: 5em;">
				  <h1 class="text-center"> <small class="text-success" style="opacity: 0.8;"> Clientes </small></h1>
				</div>

			<!-- FORMULARIO -->
				<div class="col-lg-12 row">
					<div class="table-responsive col-lg-10 col-md-10 col-sm-10">
						<table id="tabla_muestra_clientes" class='table table-hover'>
							<tr class="warning">
								<th>Id</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Telefono</th>
								<th>Email</th>
								<th>Password</th>
								<th>Editar</th>
								<th>Borrar</th>
							</tr>

							<?php
							require('../../Controller/clientes/ClienteController.php');
							$cliente = new ClienteController();
							$Tclientes = $cliente->dame_clientes();

							$cont = 1;
							foreach($Tclientes as $row) {
								$editarcliente_html = htmlspecialchars("btn_editar_cliente('".$row->get_id()."','".$row->get_nombre()."','".$row->get_apellido()."','".$row->get_telefono()."','".$row->get_usuario()."','".$row->get_key()."');", ENT_QUOTES);
								$borrarcliente_html = htmlspecialchars("btn_borrar_cliente('".$row->get_id()."');", ENT_QUOTES);
								printf('<tr>');
							    printf('<td> %s </td>', $row->get_id() );
							    printf('<td> %s </td>', $row->get_nombre() );
							    printf('<td> %s </td>', $row->get_apellido() );
							    printf('<td> %s </td>', $row->get_telefono() );
							    printf('<td> %s </td>', $row->get_usuario() );
							    printf('<td> %s </td>', $row->get_key() );
								echo('<td><button class="btn btn-success" onclick='.$editarcliente_html.'> <i class="fa fa-pencil"></i></button></td>');
								printf('<td><button class="btn btn-custom" data-toggle="modal" data-target="#myModal%s"> <i class="fa fa-trash"></i></button></td>', $cont);
								printf('</tr>');

								//<!-- ************************* -->
								//<!-- MODAL -->
								//<!-- ************************* -->

								printf('<div class="modal fade" id="myModal%s" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">', $cont);
								  printf('<div class="modal-dialog modal-lg" role="document">');
								    printf('<div class="modal-content">');
								      printf('<div class="modal-header">');
								        printf('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
								        printf('<h4 class="modal-title" id="myModalLabel"><i class="fa fa-remove"></i> ¿ Esta seguro de que desea borrar el cliente ? </h4>');
								      printf('</div>');
								      printf('<div class="modal-body">');
								      	printf('<h3> Esta apunto de borrar el cliente de la base de datos. </h3>');
								      printf('</div>');
								      printf('<div class="modal-footer">');
								        printf('<button type="button" class="btn btn-custom" onclick='.$borrarcliente_html.'><i class="fa fa-trash fa-sm-icon"></i> Borrar!</button>');
								        printf('<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-sm-icon"></i> Cerrar</button>');
								      printf('</div>');
								    printf('</div>');
								  printf('</div>');
								printf('</div>');
							
								//<!-- ************************* -->
								//<!-- // MODAL -->
								//<!-- ************************* -->
								$cont ++;
							}
							
							?>
						</table>

						<a href="add_cliente.php" class="btn btn-warning">Añadir Cliente</a>
					</div>



					<div class="col-lg-2 col-md-2 col-sm-2">
							<ul class="nav nav-sidebar">
					          <li><a href="../panel_de_control.php"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i> Estadisticas</a></li>
					          <li><a href="show_all_clientes.php"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Clientes</a></li>
					          <li><a href="../pago_sandbox.php"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Carrito</a></li>
					        </ul>
						</div>
				</div>
			<!-- //FIN FORMULARIO -->

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
				<p class="text-muted text-center">Delux Car &copy; Copyright 2016. <a target="_blank" href="../aviso_legal.php">Aviso Legal</a></p>
			</footer>
		</div>
	
		<!-- ************************* -->
		<!-- // PIE DE LA PAGINA -->
		<!-- ************************* -->
	
		<!-- JAVASCRIPT -->
		<!-- Libreria basica de JQuery y Bootstrap -->
    	 <script src="../../Lib/JQuery/jquery1.12.4.js"></script>
		 <script src="../../Lib/bootstrap/js/bootstrap.min.js"></script>
		 <script src="../../Lib/js/myjs.js"></script>
	</BODY>
</HTML>