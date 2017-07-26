<!DOCTYPE html>

<?php session_start(); ?>

<HTML lang="es">
	<HEAD>
		<meta charset="UTF-8"> 
		<link rel="stylesheet" type="text/css" href="../Lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../Lib/font-awesome-4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../Lib/chartist-js/dist/chartist.min.css">
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

				<div class="col-lg-12 row nopadding jumbotron" style="margin-top: 1.5em;">
				  <h1 class="text-center"> <small class="text-success" style="opacity: 0.8;">
				  	<?php
					if(isset($_SESSION['user_log'])){
							echo "Panel de Control";
						}else{
							echo "No estas logeado o no tienes permisos.";
						}; 
					?>
				   </small></h1>
				</div>


				<?php 
				if(isset($_SESSION['user_log'])){

				echo '<div class="row nopadding">';
					echo '<div  class="col-lg-12">';
						echo '<div class="col-lg-10 col-md-10 col-sm-10">';
							
							echo '<div class="row">';
								echo '<div class="col-lg-5 col-md-5 col-sm-5">';
									echo '<h3 class="text-center miCabeceraH3">Ventas</h3>';
									echo '<div class="ct-chart1 ct-perfect-fourth"></div>';
									echo '<div class="desc">';
										echo '<span class="miPaddingLabels" style="background-color: #6b0392;">Ferrari</span>';
										echo '<span class="miPaddingLabels" style="background-color: #f05b4f;">Porsche</span>';
										echo '<span class="miPaddingLabels" style="background-color: #f4c63d;">Tesla</span>';
									echo '</div>';
								echo '</div>';

								echo '<div class="col-lg-5 col-md-5 col-sm-5 mislabel">';
									echo '<h3 class="text-center miCabeceraH3">Preferencias</h3>';
									echo '<div class="ct-chart4 ct-perfect-fourth"></div>';
									echo '<div class="desc">';
										echo '<span class="miPaddingLabels" style="background-color: #6b0392;">Ferrari</span>';
										echo '<span class="miPaddingLabels" style="background-color: #f05b4f;">Porsche</span>';
										echo '<span class="miPaddingLabels" style="background-color: #f4c63d;">Tesla</span>';
									echo '</div>';
								echo '</div>';
							echo '</div>';

							echo '<div class="row">';
								  echo '<h2>Top Usuarios</h2>';
						          echo '<div class="table-responsive">';
						            echo '<table class="table table-striped">';
						              echo '<thead>';
						                echo '<tr>';
						                  echo '<th>#</th>';
						                  echo '<th>Header</th>';
						                  echo '<th>Header</th>';
						                  echo '<th>Header</th>';
						                  echo '<th>Header</th>';
						                echo '</tr>';
						              echo '</thead>';
						              echo '<tbody>';
						                echo '<tr>';
						                  echo '<td>1,001</td>';
						                  echo '<td>Lorem</td>';
						                  echo '<td>ipsum</td>';
						                  echo '<td>dolor</td>';
						                  echo '<td>sit</td>';
						                echo '</tr>';
						                echo '<tr>';
						                  echo '<td>1,002</td>';
						                  echo '<td>amet</td>';
						                  echo '<td>consectetur</td>';
						                  echo '<td>adipiscing</td>';
						                  echo '<td>elit</td>';
						                echo '</tr>';
						                echo '<tr>';
						                  echo '<td>1,003</td>';
						                  echo '<td>Integer</td>';
						                  echo '<td>nec</td>';
						                  echo '<td>odio</td>';
						                  echo '<td>Praesent</td>';
						                echo '</tr>';
						                echo '<tr>';
						                  echo '<td>1,003</td>';
						                  echo '<td>libero</td>';
						                  echo '<td>Sed</td>';
						                  echo '<td>cursus</td>';
						                  echo '<td>ante</td>';
						                echo '</tr>';
						              echo '</tbody>';
						            echo '</table>';
						          echo '</div>';
							echo '</div>';

						echo '</div>';

						echo '<div class="col-lg-2 col-md-2 col-sm-2">';
							echo '<ul class="nav nav-sidebar">';
					          echo '<li><a href="panel_de_control.php"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i> Estadisticas</a></li>';
					          echo '<li><a href="clientes/show_all_clientes.php"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Clientes</a></li>';
					          echo '<li><a href="pago_sandbox.php"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Carrito</a></li>';
					        echo '</ul>';
						echo '</div>';

					echo '</div>';
				echo '</div>';
				};

				?>


				<?php
					if(isset($_SESSION['user_log'])){
						printf("ID: %s", $_SESSION['user_log']['id']);
						echo '</br>';
						printf("Nombre: %s", $_SESSION['user_log']['nombre']);
						echo '</br>';
						printf("Apellido: %s", $_SESSION['user_log']['apellido']);
						echo '</br>';
						printf("Telefono: %s", $_SESSION['user_log']['telefono']);
						echo '</br>';
						printf("E-mail: %s", $_SESSION['user_log']['email']);
						echo '</br>';
						printf("Contraseña: %s", $_SESSION['user_log']['password']);
						echo '</br>';

					};
				?>

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
				<p class="text-muted text-center">Delux Car &copy; Copyright 2016. <a target="_blank" href="../View/aviso_legal.php">Aviso Legal</a></p>
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
		 <script src="../Lib/chartist-js/dist/chartist.min.js"></script>
		 <script src="../Lib/js/myjs.js"></script>
	</BODY>
</HTML>