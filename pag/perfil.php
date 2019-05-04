<?php
$id="";
if(isset($_SESSION["nombre"])){
?>
<div class="contenedor-detalles">

    <h1 class="titulo-detalle"><?php echo $_SESSION["nombre"]?></h1>
    <picture class = "contenedor_imagen"> <img src="<?php echo $_SESSION['imagen']?>"/></picture>
<br>
<br>
<h2 class="valorar">Firma<h2>
<hr>
<br>
<br>
<h3 class="descripcion">Correo</h3>
<p><?php echo $_SESSION['correo']?></p>

<hr>
<h3 class="descripcion">Rango</h3>
<p><?php echo $_SESSION['tipo']?></p>
<hr>
<h3 class="links">Cosas de interes<h3>
<hr>
    <?php
}else{
    echo "<h1>Tienes que estar logeado para acceder a esta página</h1>";
}
?>
</div>