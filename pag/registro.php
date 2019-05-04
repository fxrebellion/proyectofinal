<?php

if(isset($_POST['registrado'])){


  $usu = new usuario();
  $usu->perfil($_POST['email']);
  $rows=$usu->get_usuario();

  if(count($rows)==0){
    $datos_prod=array('nombre'=>$_POST['nombre'],'correo'=>$_POST['email'],'contrasenya'=>$_POST['contrasenya'],'imagen'=>$_POST['imagenperfil']);
    $usuario=new usuario();
    $usuario->set_usuario($datos_prod);
    
  }
}
?>





<div class="formulario-login">
<form method="post" action="index.php?p=registro" >
<div class="div-formulario-login">
<div class="fuente2">
Registrate
</div>
<p class="fuente">Nombre de usuario</p>        
<input type="text" name="nombre"> <br>
<p class="fuente">Direccion de correo</p>        
<input type="email" name="email"> <br>
<p class="fuente">Contraseña</p>   
<input type="password" name ="contrasenya" cols="30" rows= "10"></textarea><br>
<p class="imagen">URL de la Imagen del perfil</p> 
<input type="text" name="imagenperfil"><br>
<br>
    <input type="submit" name="registrado" value="Registrarse" onclick="validar()">
    <div id="errores">hola</div>
    </form>
</div>

<script>

function validar(){
 var nombre = document.getElementsByTagName("nombre")[0];
 var correo = document.getElementsByTagName("correo")[0];
 var contraseña = document.getElementsByTagName("contraseña")[0];
 if(nombre==""){
alert("hola");
  
 }

 



}

</script>