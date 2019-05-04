

<?php if(!isset($_SESSION['correo'])){

?>


<div class="formulario-login">
<form method="post" action="index.php?p=login">
<div class="div-formulario-login">
<div class="fuente2">
Login
</div>
<div class="social2"><span class="icon-facebook-squared"></span><span class="icon-twitter-squared"></span><span class="icon-instagram"></span><span class="icon-gplus"></span></div>
<p class="fuente">E-mail</p>        
<input type="e-mail" name="correo"> <br>
<p class="fuente">Contraseña</p>   
 
<input type="password" name="pass"> <br>
<br>
		<a href="index.php?p=registro"><input type="button"  name="registro" value="Registrate"></a><input type="submit" name="login" value="Login">
        
    </form>
</div>

<?php }else{
  
  header("location:index.php?p=inicio");
}
  ?>