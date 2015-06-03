<!--Bootstrap -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


<!--Bootstrap -->


<script>
	function ValidarBusqueda(){
		document.buscarproductos.action = "resultados-yamoshi.php"
		if(document.buscarproductos.buscador.value==""){
			alert("Debes ingresar datos para la b煤squeda")
			document.buscarproductos.buscador.focus()
			return
		}
		document.buscarproductos.submit()
	}
	
	function Evaluar() {
		tecla = (document.all) ? event.keyCode : event.which;
		if (tecla == 13) { 
			ValidarBusqueda()
		}	
	}
	
</script>
<link href='imagenes/favicon.ico' rel='icon' type='image/x-icon'/>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic|Roboto:400,400italic,500,500italic,700,100,300,300italic' rel='stylesheet' type='text/css'>
<header id="cabecera">
	<div id="cajacabecera">
        <figure id="logo">
       	  <a href="index.php"><img src="imagenes/logo.png" width="268" height="53"></a>
        </figure>
        <div id="cabecera-der">
            <p class="enlacesup">| 
            <?php
			if($xAlias<>''){
			?>
            <a href="#"><img src="imagenes/icono2.png" width="11" height="10"> <?php echo $xAlias; ?></a> | 
            <?php
			 }
			if($xAlias==''){
			?>
            <a href="ingresar.php"><img src="imagenes/icono1-2.png" width="9" height="11"> Iniciar Sesi贸n</a> | 
            <?php
			}else{
			?>
            <a href="cerrar-sesion.php"><img src="imagenes/icono1.png" width="9" height="11"> Cerrar Sesi贸n </a> |
            <?php
			}
			?>
            <a href="nuestra-empresa.php">Conocenos</a> |
            <a href="mapa-productos.php">Mapa Productos</a> |
            <a href="trabaja-con-nosotros.php">Trabaja con Nosotros</a> | 
            <a href="locales.php">Tiendas</a> | 
            <a href="libro-de-reclamaciones.php">Libro Reclamaciones</a> |</p>
       	    <form class="buscador" action="" method="post" name="buscarproductos">
            	<input name="buscador" type="text" class="campobus" placeholder="Que deseas buscar"  onkeyup="javascript:Evaluar();">
        		<input name="boton" type="button" value="Buscar" class="botonbus" onclick="javascript:ValidarBusqueda();">
            </form>
            <ul>
                <li><a href="https://www.facebook.com/YAMOSHI?ref=hl" target="_blank"><img src="imagenes/facebook.png" width="30" height="28"></a></li>
                <li><a href="#"><img src="imagenes/twitter.png" width="30" height="28"></a></li>
                <li><a href="#"><img src="imagenes/youtube.png" width="30" height="28"></a></li>
                <li style="padding-top:6px;">Siguenos: </li>
            </ul>
        </div>
    </div>
</header>
<!--Menu-->
<nav id="menu">
	<ul>
    	<li><a href="lista-marcas.php">MARCAS</a></li>
        <li><a href="categoria-productos.php?cod_categoria=101">SERVIDORES</a></li>
    	<li><a href="ofertas.php">OFERTAS</a></li>
        <li><a href="lanzamiento-semana.php">NOVEDADES</a></li>
        <li><a href="lista-productos.php?tipo_producto=4">PC ARMADAS</a></li>
        <li><a href="categoria-productos.php?cod_categoria=100">PC TODO EN UNO</a></li>
        <li><a href="lista-productos.php?tipo_producto=6">PC DE MARCA</a></li>
        <li><a href="contactenos.php">CONTACTENOS</a></li>
        <li><a href="registrarse.php">REGISTRATE COMO CLIENTE</a></li>
        <li><a href="index.php">INICIO</a></li>
    </ul>
</nav>