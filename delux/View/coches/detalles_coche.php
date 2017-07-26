<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
				$id = strip_tags($_GET["id"]);
				?>

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

	<BODY onload='likes(<?php echo $id; ?>); dislikes(<?php echo $id; ?>);'>

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
			        <li class="active"><a href="catalogo.php">Catalogo</a></li>
			      </ul>

			      <ul class="nav navbar-nav navbar-right">
				    <form method="POST" class="navbar-form navbar-left" action="../../Controller/coches/busqueda_coche.php" onsubmit="return validar_busqueda()">
				    	<div class="form-group">
					      <input class="form-control" id="texto_buscar" name="texto_buscar" type="text" placeholder="Search">
					      <button type="submit" class="btn btn-warning">Search</button>
				    	</div>
				    </form>

			        <li><a href="../panel_de_control.php">Configuracion</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iniciar Sesion <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="../clientes/login.php"><i class="fa fa-user fa-fw"></i> Iniciar</a></li>
			            <li><a href="../clientes/add_cliente.php"><i class="fa fa-user-plus fa-fw"></i> Registrarse</a></li>
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
		<main id="body" class="col-lg-12 nopadding" >

				<?php
				
				$boton = strip_tags($_GET["boton"]);

				require('../../Controller/coches/CocheController.php');
				$micoche = new CocheController();
				$array = $micoche->dame_coches_by_id($id);
				$coche = $array[0];
				$descripcion = $coche->get_descripcion();

				$modelo = $coche->get_modelo();
				$marca = $coche->get_marca();
				$precio = $coche->get_precio();
				$foto = $coche->get_foto_portada();
				$tipo = $coche->get_tipo();
				$puertas = $coche->get_puertas();
				$caballos = $coche->get_caballos();
				$combustible = $coche->get_combustible();

				echo '<div class="col-lg-12 row nopadding jumbotron" style="margin-top: 1.5em;">';
				echo '  <h1 class="text-center"> <small class="text-success" style="opacity: 0.8;">Detalles '.$marca.' '.$modelo.' </small></h1>';
				echo '</div>';

				echo '<div class="col-lg-12 row nopadding">';
				echo '	<div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">';

						echo '	<img class="img-responsive img-thumbnail" src="'.$foto.'" alt="'.$modelo.'">';

				/////////BOTONES VALORACION						
				echo '<div class="row text-center" style="margin-top: 1em;" >';
				$megusta = htmlspecialchars("btn_like('".$id."');", ENT_QUOTES);
				echo '		<button type="button" class="btn btn-success" onclick='.$megusta.'><i class="glyphicon glyphicon-thumbs-up"></i> Me Gusta <span class="likes" id="cantidad">0</span></button>';

				$nomegusta = htmlspecialchars("btn_dislike('".$id."');", ENT_QUOTES);
				echo '		<button type="button" class="btn btn-danger" onclick='.$nomegusta.'><i class="glyphicon glyphicon-thumbs-down"></i> No Me Gusta <span class="likes" id="cantidad2">0</span></button>';
				echo '</div>';

				/////////
						echo '<div class="col-lg-12 row" style="margin-top: 1em;"></div>';	
						echo '	   <div class = "caption">';
						echo '	      <h3 class="text-info"><strong>Desde</strong> '.$precio.' €</h3>';
						echo '	      <p class="text-justify"> <i class="fa fa-file-text-o"></i> <strong>Descripción:</strong> '.$descripcion.' </p>';
						echo '	      <p> <i class="fa fa-check-square-o"></i> <strong>Marca: </strong> '.$marca.' </p>';
						echo '	      <p> <span class="glyphicon glyphicon-search" aria-hidden="true"></span> <strong>Modelo:</strong> '.$modelo.' </p>';
						echo '	      <p> <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> <strong>Tipo:</strong> '.$tipo.' </p>';
						echo '	      <p> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <strong>Puertas:</strong> '.$puertas.' </p>';
						echo '	      <p> <i class="fa fa-dashboard"></i> <strong>CC:</strong> '.$caballos.' </p>';
						echo '	      <p> <span class="glyphicon glyphicon-tint" aria-hidden="true"></span> <strong>Combustible:</strong> '.$combustible.' </p>';
						echo '	      <p>';
						echo '		<button type="button" class="btn btn-custom" onclick='.$boton.'><i class="fa fa-cart-plus"></i> Añadir al Carro</button>';
						echo '		<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-share-alt"></i> Compartir</a>';
						echo '	      </p>';

				echo '	</div>';
				echo '</div>';

				
				//////////////////////////////COMENTARIOS

					require('../../Controller/comentarios/comentarioscontroller.php');
					$comm = new ComentarioController();
					$arr = $comm->dame_comentarios($id);
					$cont = 1;
					echo '<div class="col-sm-12 row nopadding" style="margin-top: 5em;">';
					echo '  <h1 class="text-center"> <small class="text-success" style="opacity: 0.8;"> Opiniones </small></h1>';
					echo '<div class="col-sm-8 col-md-8 col-sm-8 col-sm-offset-2 col-md-offset-2 col-sm-offset-2 pComentarios">';
						foreach($arr as $row) {
							$fecha = $row['fecha'];
							$nombre = $row['nombre'];
		            		$comentario = $row['comentario'];
								echo '	   <div class = "caption">';
								echo '	      <h4 class="text-info">'.$nombre.'</h4><h5 class="text-info">'.$fecha.'</h5>';
								echo '	      <p> '.substr($comentario,0,150).' ... </p>';
								echo '	   </div>';						
		            	$cont ++;
						}
					echo '</div>';	
					echo '</div>';
				
				echo '<div class="col-sm-12 row nopadding"  style="margin-top: 0em;">';
				echo '  <h1 class="text-center"> <small class="text-success" style="opacity: 0.8;">Deja tu comentario</small></h1>';
					echo '<div class="col-sm-8 col-sm-offset-2 pComentarios">';
						echo '<form method="POST" onsubmit="return validar_comentario()" action="../../Controller/comentarios/add_new_comentario.php?id='.$id.'">';
							 echo '<div class="form-group">';
							    echo '<label>Comentario</label>';
							    echo '<textarea class="form-control" maxlength="255" id="det_comentario" name="comentario" placeholder="Comentario" rows="5"></textarea>';
							 echo '</div>';
							 echo '<div class="form-group">';
							    echo '<label>Nombre</label>';
							    echo '<input type="text" class="form-control" maxlength="9" id="det_nombre" name="cliente_nombre" placeholder="Nombre cliente">';
							 echo '</div>';
							 echo '<div class="form-group">';
							    echo '<label>E-mail</label>';
							    echo '<input type="email" class="form-control" id="det_email" name="cliente_email" placeholder="Email">';
							 echo '</div>';
							 
							 echo '<button type="submit" class="btn btn-primary">Enviar</button>';

						echo '</form>';
					echo '</div>';
					echo '<div class="col-sm-2"></div>';
				echo '</div>';
				//////////////////////////////COMENTARIOS

				}else{				
				echo '<div class="col-lg-12 row nopadding jumbotron style="margin-top: 5em;">';
				echo '  <h1 class="text-center"> <small class="text-success" style="opacity: 0.8;"> No puedes acceder a esta página. </small></h1>';
				echo '</div>';
				};

				?>

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
		        <h4 class="modal-title" id="myModalLabel">Tu coche se ha agregado correctamente !</h4>
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
				<p class="text-muted text-center">Delux Car &copy; Copyright 2016. <a target="_blank" href="../../View/aviso_legal.php">Aviso Legal</a></p>
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