<?php include "cms/modulos/conexion.php";?>
<?php include "modulos/tipo-cambio.php";?>
<?php
$proceso = $_POST['proceso'];
if($proceso=="enviar"){
	$nombres 	= utf8_decode($_POST['nombres']);
	$apellidos 	= utf8_decode($_POST['apellidos']);
	$email 		= $_POST['email'];
	$telefono 	= $_POST['telefono'];
	
	$boletin = "INSERT INTO boletin(nombres, apellidos, email, telefono) VALUES('$nombres ', '$apellidos', '$email', '$telefono')";
	$resultadocu=mysql_query($boletin);
	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>Yamoshi - Tienda de tecnología</title>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href="css/estilos-yamoshi.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link href="css/flexslider.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<script>
	function Validar(){
		document.boletin.action="index.php";
		if (document.boletin.email.value == "") {
			alert("Debes de ingresar tu Email")
			document.boletin.email.focus()
			return
		}
		if(!document.boletin.condicion.checked){ 
			alert("Debes aceptar las condiciones");
			document.boletin.condicion.focus()
			return 
		}
		document.boletin.proceso.value = "enviar"
		document.boletin.submit()
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		// Set custom style, close if clicked, change title type and overlay color
		$(".fancybox").fancybox({
			wrapCSS    : 'fancybox-custom',
			closeClick : true,
			openEffect : 'none',
			helpers : {
				title : {
					type : 'inside'
				},
				overlay : {
					css : {
						'background' : 'rgba(0,0,0,0.60)'
					}
				}
			}
		});
	});
</script>
<script>
	//funcion para agregar productos al carrito
	function Agregar(Codigo) {
		document.fcarrito.action = "verificar.php"
		document.fcarrito.cod_producto.value = Codigo;
		document.fcarrito.submit()
	}
</script>
<script>
$(document).ready(function(e) {
	$.backstretch([
	<?php 
		$fondo = "SELECT * FROM fondo_web WHERE estado='A'";
		$resultfondo = mysql_query($fondo);
		while($filafondo = mysql_fetch_array($resultfondo)){
		$imagenfondo = $filafondo['img_fondo'];
	?>
	  "fondos-web/<?php echo $imagenfondo; ?>",
	<?php
		}
	?>
	], {
		fade: 750,
		duration: 4000
	});
});
</script>
<script>
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
</script>
<style type="text/css">
#nuevoProducto{
background-color:rgb(247, 0, 0);
color:#F0E0E0;
 text-align:center; font-weight:bold;
  float:right; 
 border-style:double;
  border-radius:5px;"
}
#nuevoProducto:hover{
background-color:#F0E0E0;
color:rgb(247, 0, 0);
 }
#oficial{
    width: 97%;
    
    margin: auto;
}



</style>
</head>

<body>
    <div id="oficial">
<!--Cabecera-->
<?php include "modulos/cabecera.php"; ?>
<!--Banner-->
<div id="contenidoCuerpoBanners">
    <div id="banners"> 
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        $listabanner="SELECT banner_grande, cod_producto FROM productos WHERE banner_grande!='' AND estado='A' ORDER BY RAND() LIMIT 20";
                        $resulBanners=mysql_query($listabanner);
                        while($filaBan=mysql_fetch_array($resulBanners)){
                            $cod_prod = $filaBan['cod_producto'];
                             $banner_grande = $filaBan['banner_grande'];
                        ?>
                        <li><a href="detalle-productos.php?cod_producto=<?php echo $cod_prod; ?>">
                            <img src="productos/banners/<?php echo $banner_grande; ?>" width="670" height="360"  alt=""/>
                        </a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>   
        </div>
<div id="general">
<!--Conteneido-->
<section id="cuerpo">
	<!---->
     <aside id="col-der">
        <?php
        $banner1 = "SELECT * FROM banner_laterales;";
        $ejebanner1 = mysql_query($banner1);
        while($finalb1 = mysql_fetch_array($ejebanner1)){
            if($finalb1['codigo_baner']==1){
                $banner_1=$finalb1['imagen'];
            }
            if($finalb1['codigo_baner']==2){
                $banner_2=$finalb1['imagen'];
            }
            if($finalb1['codigo_baner']==3){
                $banner_3=$finalb1['imagen'];
            }
            if($finalb1['codigo_baner']==4){
                $banner_4=$finalb1['imagen'];
            }
            if($finalb1['codigo_baner']==5){
                $banner_5=$finalb1['imagen'];
            }
        }
        ?>
        <a href="contactenos.php"><img src="imagenes/<?php echo $banner_3; ?>" width="194" height="200" class="borde-img"/></a>
        <a href="exclusividad.php"><img src="imagenes/<?php echo $banner_1; ?>" width="194" height="200"  class="borde-img"/></a>
        <a href="promociones.php"><img src="imagenes/<?php echo $banner_2; ?>" width="194" height="200"  class="borde-img"/></a>
        <div id="boletin">
            <form name="boletin" method="post" action="">
                <h1>Boletín de Ofertas</h1>
                <p>Mandenos su email y le enviaremos nuestras ofertas y novedades periodicamente a su correo.</p>
                <p><input type="email" name="email" placeholder="Ingresar Email" id="email"></p>
                <p><input type="button" name="boton" value="Aceptar" id="boton" onClick="javascript:Validar();"></p>
                <p><input name="condicion" type="checkbox" id="condicion">He leido y acepto las políticas de la empresa</p>
                <input type="hidden" name="proceso">
                <a href="politicas-empresa.php" style="display:block; color:#FFF; margin:6px">Leer Politicas de Empresa</a>
            </form>
        </div>
        <a href="lista-productos.php?tipo_producto=3"><img src="imagenes/<?php echo $banner_5; ?>" width="194" height="200" class="borde-img"/></a>
        <a href="lista-productos.php?tipo_producto=5"><img src="imagenes/<?php echo $banner_4; ?>" width="194" height="200" class="borde-img"/></a>
        <!-- Banners -->
        <?php
        $listabannerlat="SELECT * FROM productos WHERE banner_lateral_int!='' AND estado='A' ORDER BY RAND() LIMIT 5";
        $resulBannerslat=mysql_query($listabannerlat);
        while($filaBanLat=mysql_fetch_array($resulBannerslat)){
            $cod_producto1 = $filaBanLat['cod_producto'];
            $banner_lat = $filaBanLat['banner_lateral_int'];
        ?>
        <a href="detalle-productos.php?cod_producto=<?php echo $cod_producto1; ?>"><img src="productos/banners/<?php echo $banner_lat; ?>" width="194" height="200" class="borde-img"></a>
        <?php
        }
        ?>
    </aside>
        <div id="general-izq">
           
  
        <!--Izquierda-->
        <aside id="col-izq">
            <h1 class="tcategoria">CATEGORIA DE PRODUCTOS</h1>
            <ul class="categorias">
                <?php
                $listaCategorias="SELECT * FROM categoria_productos WHERE estado='A' ORDER BY nom_categoria ASC";
                $resulCategorias = mysql_query($listaCategorias);
                while($filaCat=mysql_fetch_array($resulCategorias)){
                    $cod_categoria 	= $filaCat['cod_categoria'];
                    $categoria 		= utf8_encode($filaCat['nom_categoria']);
                ?>
                <li><a href="categoria-productos.php?cod_categoria=<?php echo $cod_categoria; ?>"><?php echo $categoria; ?></a></li>
                <?php
                }
                ?>
            </ul>
            <ul class="bannerservicios">
                <?php
                $banner2 = "SELECT * FROM banner_laterales;";
                $ejebanner2 = mysql_query($banner2);
                while($finalb2 = mysql_fetch_array($ejebanner2)){
                    if($finalb2['codigo_baner']==8){
                        $banner_6=$finalb2['imagen'];
                    }
                    if($finalb2['codigo_baner']==6){
                        $banner_7=$finalb2['imagen'];
                    }
                    if($finalb2['codigo_baner']==7){
                        $banner_8=$finalb2['imagen'];
                    }
                }
                ?>
                <li><a href="ingresar.php"><img src="imagenes/<?php echo $banner_6; ?>" width="220" height="229"  alt=""/></a></li>
                <li><a href="soporte-tecnico.php"><img src="imagenes/<?php echo $banner_7; ?>" width="220" height="229"  alt=""/></a></li>
                <li><a href="catalogo-digital.php"><img src="imagenes/catalogoleft.jpg" width="220" height="229"  alt=""/></a></li>
            </ul>
        </aside>
        <!--Centro-->
        <article id="col-centro">
            <ul class="tipop">
                <li><a href="lista-productos.php?tipo_producto=1">PRODUCTOS PARA<br>EL HOGAR</a></li>
                <li><a href="lista-productos.php?tipo_producto=2" class="centro">PRODUCTOS PARA<br>LA OFICINA</a></li>
                <li><a href="lista-productos.php?tipo_producto=3" class="centro">PRODUCTOS PARA<br>GAMERS</a></li>
                <li><a href="lista-productos.php?tipo_producto=4" class="derecho">PC<br>ARMADAS</a></li>
            </ul>
            <h1 class="titulocentro">LANZAMIENTO DE LA SEMANA</h1>
            <form name="fcarrito" action="" method="post">
            <input type="hidden" name="cantidad" value="1">
            <input type="hidden" name="cod_producto">
            <div class="productos-blanco">
                <?php
                $listaProductos="SELECT * FROM productos WHERE novedad='SI' AND estado='A' LIMIT 6";
                $resulProductos=mysql_query($listaProductos);
                $totregistros=mysql_num_rows($resulProductos);
                if($totregistros>=1){
                while($filaPro=mysql_fetch_array($resulProductos)){
                    $cod_producto = $filaPro['cod_producto'];
                    $nom_producto = utf8_encode($filaPro['nom_producto']);
                    if($filaPro['oferta']=='SI' && $filaPro['precio_oferta']>0){
                        $p_mostrar = $filaPro['precio_oferta'];
                    }else{
                        $p_mostrar = $filaPro['precio_normal'];
                    }				
                    if($filaPro['img_producto']<>""){
                        $img_producto = $filaPro['img_producto'];
                    }else{
                        $img_producto = "blanco.jpg";
                    }
                    $stock_general = $filaPro['stock_general'];
                    $num++;
                ?>
                <div class="caja-productos"
                <?php
                if($num==4){
                    echo 'style=border-right:none;';
                    $num=0;
                }
                ?>
                >
                    
                    <p id="nuevoProducto">Producto Nuevo</p>
                    <a href="detalle-productos.php?cod_producto=<?php echo $cod_producto; ?>">
                    <img src="productos/productos/<?php echo $img_producto; ?>" width="158" height="119" class="imgpro">
                    </a>
                    <a href="detalle-productos.php?cod_producto=<?php echo $cod_producto; ?>">
                    <h1><?php echo $nom_producto; ?></h1>
                    </a>

                           <p class="precioD">$ <?php echo number_format(($p_mostrar),2); ?></p>
                    <p class="precioS">S/. <?php echo number_format($p_mostrar * $ventaDolar,2); ?></p>
          

                    <p class="unidades">Stock <?php if($stock_general==0){ echo "Consultar"; }else{ echo '>1'; }?></p>
                    <a href="detalle-productos.php?cod_producto=<?php echo $cod_producto; ?>" class="detalles">
                       Ver Detalles</a>
                    <p class="iconosp">
                    <a href="productos/productos/<?php echo $img_producto; ?>" class="fancybox" title="<?php echo $nom_producto; ?>"><img src="imagenes/lupa-gris.png" width="24" height="21"></a>
                    <a href="javascript:Agregar(<?php echo $cod_producto; ?>);"><img src="imagenes/carrito.png" width="24" height="21"></a>
                    <a href="consulta-productos.php?cod_producto=<?php echo $cod_producto; ?>" title="Consultar por el producto"><img src="imagenes/consulta.png" width="24" height="21"></a>
                    </p>
                </div>
                <?php
                }
                }else{
                ?>
                <p class="nohayproductos">En estos momentos no hay productos registrados</p>
                <?php
                }
                ?>
                
                
                <div class="limpiar"></div>
            
    <div class="limpiar"></div>
            </div>
          
            <!-- Ofertas -->
            <h1 class="titulocentro">OFERTAS SOLO POR HOY</h1>
            <div class="productos-blanco">
                <?php
                $listaOfertas="SELECT * FROM productos WHERE oferta='SI' AND estado='A' ORDER BY RAND() LIMIT 8";
                $resulOfertas=mysql_query($listaOfertas);
                $totOfertas=mysql_num_rows($resulOfertas);
                if($totOfertas>=1){
                while($filaOfe=mysql_fetch_array($resulOfertas)){
                    $cod_producto = $filaOfe['cod_producto'];
                    $nom_producto = utf8_encode($filaOfe['nom_producto']);
                    if($filaOfe['oferta']=='SI'  && $filaOfe['precio_oferta']>0){
                        $p_mostrar = $filaOfe['precio_oferta'];
                    }else{
                        $p_mostrar = $filaOfe['precio_normal'];
                    }				
                    if($filaOfe['img_producto']<>""){
                        $img_producto = $filaOfe['img_producto'];
                    }else{
                        $img_producto = "blanco.jpg";
                    }
                    $stock_general 	= $filaOfe['stock_general'];
					$novedad 		= $filaOfe['novedad'];
                    $numc++;
                ?>
                <div class="caja-productos"
                <?php
                if($numc==4){
                    echo 'style=border-right:none;';
                    $numc=0;
                }
                ?>
                >
                    <a href="detalle-productos.php?cod_producto=<?php echo $cod_producto; ?>" >
                    <img src="productos/productos/<?php echo $img_producto; ?>" width="180" height="135" class="imgpro"></a>
                    <a href="detalle-productos.php?cod_producto=<?php echo $cod_producto; ?>" >
                    <h1><?php echo $nom_producto; ?></h1></a>
                    <p class="precioD">$ <?php echo number_format($p_mostrar,2); ?></p>
                    <p class="precioS">S/. <?php echo number_format(($p_mostrar * $ventaDolar),2); ?></p>
                    <p class="unidades">Stock <?php if($stock_general==0){ echo "Consultar"; }else{ echo '>1'; }?></p>
                    <?php
					if($novedad=="SI"){
					?>
                    <p style="color:#CC0700; text-align:center; font-weight:bold;">Producto Nuevo</p>
                    <?php
					}
					?>
                    <a href="detalle-productos.php?cod_producto=<?php echo $cod_producto; ?>" class="detalles">
                        Detalles</a>
                    <p class="iconosp">
                    <a href="productos/productos/<?php echo $img_producto; ?>" class="fancybox" title="<?php echo $nom_producto; ?>"><img src="imagenes/lupa-gris.png" width="24" height="21"></a>
                    <a href="javascript:Agregar(<?php echo $cod_producto; ?>);"><img src="imagenes/carrito.png" width="24" height="21"></a>
                    <a href="consulta-productos.php?cod_producto=<?php echo $cod_producto; ?>" title="Consultar por el producto"><img src="imagenes/consulta.png" width="24" height="21"></a>
                    </p>
                </div>
                <?php
                }
                }else{
                ?>
                <p class="nohayproductos">En estos momentos no hay ofertas registrados...</p>
                <?php
                }
                ?>
                
              <div class="limpiar"></div>

   

</div>
              
          
          </form>  
        </article>  




<div id="oferta-laptops">
        <h1 class="titulocentro">LAPTOPS NEGOCIOS Y EMPRESARIAL</h1>


   <?php   

                $listalap=" SELECT * FROM productos where cod_categoria='89' and estado='A' order by cod_producto desc LIMIT 4";
                $resulOfertas=mysql_query($listalap);
                $totOfertas=mysql_num_rows($resulOfertas);
                if($totOfertas>=1){
                while($filaOfe=mysql_fetch_array($resulOfertas)){
                    $cod_producto = $filaOfe['cod_producto'];
                    $nom_producto = utf8_encode($filaOfe['nom_producto']);
                    if($filaOfe['oferta']=='SI'  && $filaOfe['precio_oferta']>0){
                        $p_mostrar = $filaOfe['precio_oferta'];
                    }else{
                        $p_mostrar = $filaOfe['precio_normal'];
                    }               
                    if($filaOfe['img_producto']<>""){
                        $img_producto = $filaOfe['img_producto'];
                    }else{
                        $img_producto = "blanco.jpg";
                    }
                    $stock_general  = $filaOfe['stock_general'];
                    $novedad        = $filaOfe['novedad'];
                    $numc++;
                ?>



<div class="caja-productos"
                <?php
                if($numc==4){
                    echo 'style=border-right:none;';
                    $numc=0;
                }
                ?>
                >
                    <a href="detalle-productos.php?cod_producto=<?php echo $cod_producto; ?>" >
                    <img src="productos/productos/<?php echo $img_producto; ?>" width="180" height="135" class="imgpro"></a>
                    <a href="detalle-productos.php?cod_producto=<?php echo $cod_producto; ?>" >
                    <h1><?php echo $nom_producto; ?></h1></a><br/>
                    <p class="precioD">$ <?php echo number_format($p_mostrar,2); ?></p>
                    <p class="precioS">S/. <?php echo number_format(($p_mostrar * $ventaDolar),2); ?></p>
                    <p class="unidades">Stock <?php if($stock_general==0){ echo "Consultar"; }else{ echo '>1'; }?></p>
                    <?php
                    if($novedad=="SI"){
                    ?>
                    <p style="color:#CC0700; text-align:center; font-weight:bold;">Producto Nuevo</p>
                    <?php
                    }
                    ?>
                    <a href="detalle-productos.php?cod_producto=<?php echo $cod_producto; ?>" class="detalles">
                        Detalles</a>
                    <p class="iconosp"><!---
                    <a href="productos/productos/<?php echo $img_producto; ?>" class="fancybox" title="<?php echo $nom_producto; ?>"><img src="imagenes/lupa-gris.png" width="24" height="21"></a>
                    <a href="javascript:Agregar(<?php echo $cod_producto; ?>);"><img src="imagenes/carrito.png" width="24" height="21"></a>
                    <a href="consulta-productos.php?cod_producto=<?php echo $cod_producto; ?>" title="Consultar por el producto"><img src="imagenes/consulta.png" width="24" height="21"></a>
                    </p>-->
                </div>
                <?php
                }
                }else{
                ?>
                <p class="nohayproductos">En estos momentos no hay ofertas registrados...</p>
                <?php
                }
                ?>





















</div>
<!---<div id="banner1f">

</div>
<div id="banner2f">

</div>
    </div>
-->
    <!--Derecha-->   
      <div class="limpiar"></div>
   <!--- 
    <div id="banner-inferior">
        <ul>
            <?php
 /*            $listabannerInf="SELECT * FROM productos WHERE banner_lateral_int!='' AND estado='A' ORDER BY RAND() LIMIT 5";
            $resulBannersinf=mysql_query($listabannerInf);
            while($filaBanInf=mysql_fetch_array($resulBannersinf)){
                $cod_producto2 = $filaBanInf['cod_producto'];
                $banner_inf = $filaBanInf['banner_lateral_int'];
                $conta++
            ?>
            <li><a href="detalle-productos.php?cod_producto=<?php echo $cod_producto2; ?>" <?php if($conta==5){echo 'style="margin-right:0;"';} ?>><img src="productos/banners/<?php echo $banner_inf; ?>" width="194" height="200" class="borde-img"></a></li>
            <?php
            }
            */?> 
        </ul>
    </div>
    -->
</section>

</div><!-- Fin Caja General-->
</div>
<!-- Pie de Página -->
<?php include "modulos/piepagina.php"; ?>
</div>
</body>
</html>