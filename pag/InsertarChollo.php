
<?php 
if(isset($_SESSION['nombre'])){ 

if(isset($_POST['crearchollo'])){
  $datos_prod=array('descripcion'=>$_POST['descripcion'],'imagen'=>$_POST['imagen'],'caracteristicas'=>$_POST['caracteristicas'],'id'=>$_SESSION['id']);
  $chollo=new chollo();
  $chollo->set($datos_prod);
}



?>


<div class="formulario-login">
<form method="post" action="index.php?p=InsertarChollo" >
<div class="div-formulario-login">
<div class="fuente2">
Nuevo Chollo
</div>
<p class="fuente">Titulo</p>        
<input type="text" name="descripcion"> <br>
<p class="fuente">Descripcion</p>   
<textarea name ="caracteristicas" cols="30" rows= "10"></textarea><br>
<p class="imagen">URL de la Imagen </p> 
<input type="text" name="imagen"><br>

<br>
		<input type="submit" name="crearchollo" value="Crear Chollo">
    </form>
</div>
<?php
}else{
  echo "<h1>Tienes que estar logueado para crear un chollo.</h1>";
}
?>