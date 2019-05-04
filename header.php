<?php
session_start();
$pagina = 'inicio';
$usuario = 'NoRegistrado';
include("chollos_model.php");
include("usuarios_model.php");
include("votaciones_model.php");
include("comentarios_model.php");

	if(isset($_SESSION['correo'])){
		$pagina="inicio";
		$usuario=$_SESSION['nombre'];
	}
	else{
		$pagina="login";
	}
	if(isset($_GET['d'])){
			session_unset();
			session_destroy();
			unset($usuario);
			$pagina="login";
    }
    
	if (isset($_POST['login'])) {
        if (!empty($_POST['correo']) && !empty($_POST['pass'])) {
            
    
            $usu = new usuario();
            
            $usu->perfil($_POST['correo']);
            $rows=$usu->get_usuario();
         if(count($rows)==0){
             $pagina='login';
        }
            
            foreach ($rows as $key => $value) {
        
                if ($value['contrasenya'] == $_POST['pass']) {
                    $_SESSION['tipo'] = $value['tipo'];
                    $_SESSION['id'] = $value['id'];
                    $_SESSION['nombre'] = $value['nombre'];
                    $_SESSION['imagen'] = $value['imagen'];
                    $_SESSION['correo'] = $value['correo'];
                    $pagina = 'inicio';
                }
            }
            
        }
    }




        /*
		if(trim($_POST['login'])!="" and trim($_POST['pas'])!=""){
			//usuario valido
			$_SESSION['login']=$_POST['login'];
			$pagina="inicio";
			$usuario=$_SESSION['login'];
		}
		else{
			//usuario no valido
			$pagina="0";
        }
        */
	
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/cuerpo.css">
    <link rel="stylesheet" href="css/chollos.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/detalles.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/login.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Racing+Sans+One" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <title>ElChollazo</title>
</head>

<body>
    <header>
  
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu" class="icon-menu"></label>
        <a href="index.php" class="logo">
            ElChollazö
        </a>
        <form action="index.php?p=inicio" method="post" class="formulario-buscar">
            <input type="search" class="barra_buscar" name='texto_buscar'>
            <button type="submit" name='barrabuscar' class="boton_buscar"><span class="icon-search-1"></span></button>
            <?php
            if(!isset($_SESSION['nombre'])){
                ?>
                <a href="index.php?p=login"><span class="icon-user-circle">Login</span></a>
                <a href="index.php?p=login"><span class="icon-user-circle">Registrate</span></a>
                
            <?php
            }else{
                ?>
                <a href="index.php?p=perfil"><span class="icon-user-circle"><?php echo $_SESSION['nombre']?></span></a>
                <a href="index.php?d=desconectar"><span class="icon-logout-1">Logout</span></a>
                
            <?php
            }
            ?>

            
            
        </form>
        <nav class="menu">
            <ul>
                <li class="oculto"><a href="index.php?p=InsertarChollo">NUEVO CHOLLO<span class="icon-star"></span></a>
                </li>
                <li class="oculto"><a href="#">POPULARES<span class="icon-star"></span></a>
                </li>
                <li class="oculto"><a href="#">ULTIMOS CHOLLOS<span class="icon-star"></span></a>
                </li>
                
                
                <section class="perfil"><a href="index.php?p=perfil"><img src ="<?php if(isset($_SESSION["nombre"])){echo $_SESSION["imagen"];}else{ echo "https://image.flaticon.com/icons/png/512/23/23716.png";}?>"width="50px" heigth="50px"></a></section>
                <li><a href="index.php?p=perfil">PERFIL<span class="icon-user-circle"></span></a></li>
                <li class="submenu"><a href="index.php?p=InsertarChollo">NUEVO CHOLLO<span class="icon-star"></span></a>
                </li>
                <li class="submenu"><a href="index.php?p=contacto">CONTACTO<span class="icon-search-1"></span></a>
                </li>
                
            </ul>
        </nav>
    </header>
    <nav class="menu2">
        <ul>
            <li><a href="index.php?p=InsertarChollo">NUEVO CHOLLO</a></li>
            <li class="submenu"><a href="#">POPULARES</a>
            </li>
            <li class="submenu"><a href="#">ULTIMOS CHOLLOS</a>
            </li>
            
        </ul>
    </nav>
    <script src="menujs.js"></script>