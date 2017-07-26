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
				  <h1 class="text-center"> <small class="text-success" style="opacity: 0.8;">
				   Resultado de la busqueda
				   <?php
				  	if(isset($_GET["rdo"])){
				  		echo ': <strong>'.$_GET["rdo"].'</strong>';
				  	};
				  ?>
				   </small></h1>
				</div>
				<div class="col-lg-12 row">				
					<?php
					require('../Model/Class/Coche.php');
					session_start();

					if(isset($_SESSION['busqueda_coches'])){
						$array = $_SESSION['busqueda_coches'];
						for($i=0; $i< count($array); $i+=1){
			            	$coche1 = $array[$i];
			            	$modeloc1 = str_replace(" ","-",$coche1->get_modelo());
			            	$carritoCoche1 = htmlspecialchars("btn_add_carrito2('".$coche1->get_id()."','".$coche1->get_precio()."','".$coche1->get_marca()."','".$modeloc1."','".$coche1->get_foto_miniatura()."');", ENT_QUOTES);

							echo '<div class="col-lg-12 row" style="margin-top: 1em;">';
							echo '<div class="col-sm-5 col-md-5 col-lg-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">';
							echo '	<img class="img-responsive img-thumbnail" src="'.$coche1->get_foto_mediana().'" alt="'.$coche1->get_modelo().'">';
							echo '	   <div class = "caption">';
							echo '	      <h3 class="text-info">Desde '.$coche1->get_precio().' €</h3>';
							echo '	      <p> '.substr($coche1->get_descripcion(),0,150).' ... </p>';
							echo '	      <p>';
							echo '		<button type="button" class="btn btn-custom" onclick='.$carritoCoche1.'><i class="fa fa-cart-plus fa-sm-icon"></i> Añadir al Carro</button>';
							echo '		<a href="coches/detalles_coche?id='.$coche1->get_id().'&boton='.$carritoCoche1.'" class="btn btn-info" ><i class="fa fa-info"></i> Detalles </a>';
							echo '		<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-share-alt fa-sm-icon"></i> Compartir</a>';
							echo '	      </p>';
							echo '	   </div>';
							echo '</div>';

							if(isset($array[$i+1])){
							$i+=1;
			            	$coche2 = $array[$i];
			            	$modeloc2 = str_replace(" ","-",$coche2->get_modelo());
			            	$carritoCoche2 = htmlspecialchars("btn_add_carrito2('".$coche2->get_id()."','".$coche2->get_precio()."','".$coche2->get_marca()."','".$modeloc2."','".$coche2->get_foto_miniatura()."');", ENT_QUOTES);

								echo '<div class="col-sm-5 col-md-5 col-lg-5">';
								echo '	<img class="img-responsive img-thumbnail" src="'.$coche2->get_foto_mediana().'" alt="'.$coche2->get_modelo().'">';
								echo '	   <div class = "caption">';
								echo '	      <h3 class="text-info">Desde '.$coche2->get_precio().' €</h3>';
								echo '	      <p> '.substr($coche2->get_descripcion(),0,150).' ... </p>';
								echo '	      <p>';
								echo '		<button type="button" class="btn btn-custom" onclick='.$carritoCoche2.'><i class="fa fa-cart-plus fa-sm-icon"></i> Añadir al Carro</button>';
								echo '		<a href="coches/detalles_coche?id='.$coche2->get_id().'&boton='.$carritoCoche2.'" class="btn btn-info" ><i class="fa fa-info"></i> Detalles </a>';
								echo '		<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-share-alt fa-sm-icon"></i> Compartir</a>';
								echo '	      </p>';
								echo '	   </div>';
								echo '</div>';
								echo '</div>';
							};
			            };
					}else{
						echo 'No hay nada que coincida con su busqueda.';
					};
					?>				
				</div>
		</main>
		</div>


		<!-- ************************* -->
		<!-- // CUERPO DE LA PAGINA -->
		<!-- ************************* -->

		<!-- ************************* -->
		<!-- MODAL -->
		<!-- ************************* -->

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Comparte el Coche con Tus amigos</h4>
		      </div>
		      <div class="modal-body">
		      	<a href="#"><i class="fa fa-facebook-official fa-share"></i></a>
		      	<a href="#"><i class="fa fa-twitter fa-share"></i></a>
		      	<a href="#"><i class="fa fa-whatsapp fa-share"></i></a>
		      	<a href="#"><i class="fa fa-youtube fa-share"></i></a>
		      	<a href="#"><i class="fa fa-instagram fa-share"></i></a>
		      	<a href="#"><i class="fa fa-github fa-share"></i></a>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-custom" data-dismiss="modal"><i class="fa fa-share-alt fa-sm-icon"></i> Compartir</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-sm-icon"></i> Cerrar</button>
		      </div>
		    </div>
		  </div>
		</div>
	
		<div class="modal fade" id="myModalAJAX" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Tu corre se ha agregado correctamente !</h4>
		      </div>
		      <div class="modal-body">
		      	<a href="#"><i class="fa fa-github fa-share"></i></a>
		      	<h2>Se agrego correctamente.</h2>
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
		<!-- Libreria basica de Chartist-js -->
		 <script src="../Lib/js/myjs.js"></script>
	</BODY>
</HTML>