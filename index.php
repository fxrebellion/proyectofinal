<?php
	include("header.php");
	if(isset($_GET['p']))
		$pagina= $_GET['p'];
	
?>
<section class="cuerpo">

        <article class="chollos">
        <?php
		if($pagina=="login")
            include("pag/login.php");
        if($pagina=="inicio")
            include("pag/inicio.php");
        if($pagina=="detalles")
        include("pag/detalles.php");
        if($pagina=="InsertarChollo")
        include("pag/insertarChollo.php");
        if ($pagina=="perfil")
        include("pag/perfil.php");
        if($pagina=="registro")
        include("pag/registro.php");
        if($pagina=="contacto")
        include("pag/contacto.php");
        
        ?>
        </article>
        
    </section>
    <?php
include("footer.php");
?>