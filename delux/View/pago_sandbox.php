<?php session_start(); ?>
<!DOCTYPE html>
<HTML lang="es">
	<HEAD>
		<meta charset="UTF-8"> 
		<link rel="stylesheet" type="text/css" href="../Lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../Lib/font-awesome-4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../Lib/css/mycss.css">
		
		<TITLE> Concesionario Delux</TITLE>
			<style>
				.midisable{
					background: #fff;
					box-shadow: none;
					pointer-events:none;
				};
			</style>
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

			        <li class="active"><a href="panel_de_control.php">Configuracion</a></li>
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

				<div class="col-lg-12 row nopadding jumbotron style="margin-top: 5em;">
				  <h1 class="text-center"> <small class="text-success" style="opacity: 0.8;"> Carrito  </small></h1>
				</div>

			<!-- FORMULARIO -->
				<div class="col-lg-12 row nopadding">
					<?php
					require('../Controller/carrito/Carrito.php');
					$carrito = new Carrito();
					$carro = $carrito->get_content();
					if($carro)
					{
					echo '<div class="col-lg-10 col-md-10 col-sm-10 nopadding">';
						echo '<div class="table-responsive">';
							echo '<form action="https://www.sandbox.paypal.com/es/cgi-bin/webscr" method="post">';
							echo '<input type="hidden" name="cmd" value="_cart">';
							echo '<input type="hidden" name="upload" value="1">';
							echo '<input type="hidden" name="business" value="delux.carone-facilitator@gmail.com">';
							echo '<input type="hidden" name="email" value="delux.carone-buyer@gmail.com">';
							echo '<input type="hidden" name="currency_code" value="EUR">';
							echo '<input type="hidden" name="return" value="http://localhost/delux">';
							echo '<input type="hidden" name="return_cancel" value="http://localhost/delux">';

							echo '<table class="table table-hover">';
								echo '<tr class="warning">';
									echo '<th></th>';
									echo '<th>Modelo</th>';
									echo '<th>Marca</th>';
									echo '<th>Cantidad</th>';
									echo '<th>Foto</th>';
									echo '<th>Precio</th>';
									echo '<th>Borrar</th>';
								echo '</tr>';

								$cont = 1;
								foreach($carro as $producto){
									$borrar_coche = htmlspecialchars("btn_borrar_prod_carrito('".$producto["unique_id"]."');", ENT_QUOTES);
									echo '<tr>';
										//id
									echo '<td align="center"><input type="hidden" readonly class="midisable"  type="text" name="item_number_'.$cont.'" value=" '.$producto["id"].' "></td>';
										//modelo
									echo '<td><input style="border:none" readonly class="midisable"  type="text" name="item_name_'.$cont.'" value=" '.$producto["modelo"].' "></td>';
										//marca
									echo '<td><input type="hidden" name="on0_'.$cont.'" value="Modelo"><input style="border:none" readonly class="midisable"  type="text" name="os0_'.$cont.'" value=" '.$producto["marca"].' "></td>';
										//cantidad
									echo '<td align="center"><input style="width: 35px; border:none" readonly class="midisable"  type="text" name="quantity_'.$cont.'" value=" '.$producto["cantidad"].' "></td>';
										//foto
									echo '<td><img src="'.$producto["foto"].'"></td>';
										//precio
									echo '<td><input style="width: 70px; border:none" readonly class="midisable"  type="text" name="amount_'.$cont.'" value=" '.$producto["precio"].' "> € </td>';
									printf('<td><a class="btn btn-custom" data-toggle="modal" data-target="#myModal%s"> <i class="fa fa-trash"></i></a></td>', $cont);
									echo '</tr>';


									//<!-- ************************* -->
									//<!-- MODAL -->
									//<!-- ************************* -->

									printf('<div class="modal fade" id="myModal%s" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">', $cont);
									  printf('<div class="modal-dialog modal-lg" role="document">');
									    printf('<div class="modal-content">');
									      printf('<div class="modal-header">');
									        printf('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
									        printf('<h4 class="modal-title" id="myModalLabel"><i class="fa fa-remove"></i> ¿ Esta seguro de que desea borrar el coche del carrito ? </h4>');
									      printf('</div>');
									      printf('<div class="modal-body">');
									      	printf('<h3> Esta apunto de borrar el coche del carrito. </h3>');
									      printf('</div>');
									      printf('<div class="modal-footer">');
									        printf('<button type="button" class="btn btn-custom" onclick='.$borrar_coche.'><i class="fa fa-trash fa-sm-icon"></i> Borrar!</button>');
									        printf('<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-sm-icon"></i> Cerrar</button>');
									      printf('</div>');
									    printf('</div>');
									  printf('</div>');
									printf('</div>');
								
									//<!-- ************************* -->
									//<!-- // MODAL -->
									//<!-- ************************* -->


									$cont += 1;
								};							
							echo '</table>';
							echo '<div  class ="text-center"><input type="image" src="../Lib/img/btn_sandbox.png" name="submit" alt="Make payments with PayPal - its fast, free and secure!"></div>';
						echo '</div>';
					echo '</div>';
					}else{
					echo '<div class="col-lg-10 col-md-10 col-sm-10 nopadding">';
						echo '<h1 align="center"> No hay articulos en el carrito. </h1>';
					echo '</div>';
					};
					?>
					<div class="col-lg-2 col-md-2 col-sm-2 nopadding">
							<ul class="nav nav-sidebar">
					          <li><a href="panel_de_control.php"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i> Estadisticas</a></li>
					          <li><a href="clientes/show_all_clientes.php"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Clientes</a></li>
					          <li><a href="pago_sandbox.php"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Carrito</a></li>
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
		<!-- MODAL -->
		<!-- ************************* -->

		<div class="modal fade" id="myModalAJAX2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Tu coche se ha borrado correctamente !</h4>
		      </div>
		      <div class="modal-body">
		      	<a href="#"><i class="fa fa-github fa-share"></i></a>
		      	<h2>Se borro correctamente.</h2>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" onclick="reload_html()"><i class="fa fa-close fa-sm-icon"></i> Aceptar</button>
		      </div>
		    </div>
		  </div>
		</div>
	
		<!-- ************************* -->
		<!-- // MODAL -->
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
		 <script src="../Lib/js/myjs.js"></script>
	</BODY>
</HTML>