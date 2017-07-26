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
		<main id="body" class="col-lg-12 nopadding">

				<div class="col-lg-12 row nopadding jumbotron" style="margin-top: 1.5em;">
				  <h1 class="text-center"> <small class="text-success" style="opacity: 0.8;"> Selecciona Una Marca </small></h1>
				</div>

			<!-- Imagenes -->
				<div class="col-lg-12 row">
					<div class="col-sm-4 col-md-4 col-lg-4 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
						<a href="cat_bmw.php">
							<img class="img-responsive img-thumbnail" src="../../Lib/img/logo_bmw.png" alt="Logo BMW">
						</a>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4">
						<a href="cat_porsche.php">
							<img class="img-responsive img-thumbnail" src="../../Lib/img/Logo_Porsche.jpg" alt="Logo Porsche">
						</a>
					</div>
				</div>

				<div class="col-lg-12 row" style="margin-top: 1em;">
					<div class="col-sm-4 col-md-4 col-lg-4 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
						<a href="cat_audi.php">
							<img class="img-responsive img-thumbnail" src="../../Lib/img/logo_audi.png" alt="Logo Audi">
						</a>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4">
						<a href="cat_tesla.php">
							<img class="img-responsive img-thumbnail" src="../../Lib/img/logo_tesla.jpg" alt="Logo Tesla">
						</a>
					</div>
				</div>

				<div class="col-lg-12 row" style="margin-top: 1em;">
					<div class="col-sm-4 col-md-4 col-lg-4 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
						<a href="cat_ferrari.php">
							<img class="img-responsive img-thumbnail" src="../../Lib/img/logo_ferrari.jpg" alt="Logo Ferrari">
						</a>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4">
						<a href="cat_maserati.php">
							<img class="img-responsive img-thumbnail" src="../../Lib/img/logo_maserati.jpg" alt="Logo Maserati">
						</a>
					</div>
				</div>
			<!-- //FIN Imagenes -->
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