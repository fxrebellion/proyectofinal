<?php

function chunk_split_unicode($str, $l = 76, $e = "\r\n") {
    $tmp = array_chunk(
        preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY), $l);
    $str = "";
    foreach ($tmp as $t) {
        $str .= join("", $t) . $e;
    }
    return $str;
}
if (isset($_GET['indice'])) {
    $indice = $_GET['indice'];
} else {
    $indice = 0;
}

$id="";
$chollo="";
$booleanovotacion=false;
$textobueno = "";
$contador = "";


//bolleanovotacion = true significa que he hecho la votacion.
if(isset($_POST['comentar'])){
$id = $_GET["chollo"];
$fecha_actual=date("d/m/Y h:i:s");
$datos_comentario=array('texto'=>$_POST['textocomentario'],'autor'=>$_SESSION['nombre'],'fecha'=>$fecha_actual,'id_usuario'=>$_SESSION['id'],'id_chollo'=>$id,'imagen'=>$_SESSION['imagen']);

    $comentario = new comentario();

    $comentario->insertar_comentario($datos_comentario);

}
if(isset($_POST['Votar'])){
    $id = $_GET["chollo"];
    $booleanovotacion=true;
    $votacion = new chollo();
    $votacion->votar($id);
    $actualizar = new voto();
    $actualizar->actualiza_tabla_votaciones($id,$_SESSION['id']);
}
if(isset($_GET["chollo"])){
$id = $_GET["chollo"];
$chollos = new Chollo();
$chollos->get($id);
$rows=$chollos->get_chollos();
    $havotado = new voto();
    $havotado->comprobar_si_ha_votado($id,$_SESSION['id']);
    $contador = $havotado->get_rows();
} 
    if(count($contador)!=0){
    $booleanovotacion = true;
    }       

?>
<div class="contenedor-detalles">
<?php


 foreach ($rows as $row){
    $creador = new Chollo();
    $creador->usuariocreador($row["id_usuario"]);
    $usuariocreador=$creador->get_chollos();
    ?> 
    <h1 class="titulo-detalle"><?php echo $row["descripcion"]?></h1>
    <picture class = "contenedor_imagen"> <img src="<?php echo $row["imagen"]?>"/></picture>
<br>
<br>
<h4>Usuario creador: <?php echo $usuariocreador["0"]["nombre"]?> </h4>
<h2 class="valorar" id="ocultavalorar">Valorar Chollo</h2>
<?php
if($booleanovotacion==false){
?>
    <form id="ocultavalorarhijo" method="post" action="index.php?p=detalles&chollo=<?php echo $id ?>">
    <input type="submit" name="Votar" value="votar">
    </form>
<?php  
}else{
    echo "<h4>Ya has votado este chollo</h4>";
}
?>
<h4 id="votaciones">Votaciones: <?php echo $row["nvotos"]?></h4>

<h3 class="descripcion" id="ocultadescripcion">Descripcion</h3>
<p id="disparador"><?php echo nl2br($row["caracteristicas"])?></p>

<h3 class="links" id="mas">Links<h3>

<h3 class="comentarios" id="ocultacomentarios">Comentarios<h3>
<?php
$comentario = new comentario();
$comentario->get_todos($id);
$todos_los_comentarios=$comentario->get_rows(); 
$numero=count($todos_los_comentarios);
$numerototal = ceil($numero/8);
echo "<section id='comentarius'>";
foreach ($todos_los_comentarios as $row2){
?>


<fieldset style="border-color:#F9BE40;" >
<legend style=""><?php echo $row2["autor"]. " " . "comenta: ";?></legend>
<legend style="text-align:left;"><img  width="50px" height="50px" src="<?php echo $row2["imagen"];?>"> </legend>
<?php $textobueno = chunk_split_unicode($row2['texto'],20);?>
<p> <?php echo $textobueno;?></p>
 <?php echo $row2["fecha"];?>

</fieldset>


<hr>
    <?php
}
echo '</section>';
 }
 echo '<div style="clear:both; text-align:center; ">';
 echo '<ul style="list-style:none; ">'; 
 if(count($todos_los_comentarios)!=0){
 if ($indice !=0) {
     echo '<li style="display:inline; padding-left:0.5em; "><a style="text-decoration:none; color:black;" href="index.php?p=detalles&chollo='.$id.'&indice='.($indice - 1).'">Anterior</a></li>';
 }
 if ($indice> 0) {
     echo '<li style="display:inline;padding-left:0.5em; "><a style="text-decoration:none; color:black;" href="index.php?p=detalles&chollo='.$id.'&indice=' . ($indice- 1) . '">' . ($indice-1) . '</a></li>';
 }
 echo '<li style="display:inline; padding-left:0.5em; "><a  style="text-decoration:none; color:black;"  href="index.php?p=detalles&chollo='.$id.'&indice=' . ($indice) . '">' . ($indice) . '</a></li>';
 if ($indice!=$numerototal-1) {
     echo '<li style="display:inline; padding-left:0.5em; "><a style="text-decoration:none; color:black;" href="index.php?p=detalles&chollo='.$id.'&indice=' . ($indice+ 1) . '">' . ($indice+1) . '</a></li>';
 }

 if ($indice != $numerototal-1) {
     echo '<li style="display:inline; padding-left:0.5em;"><a style="text-decoration:none; color:black;" href="index.php?p=detalles&chollo='.$id.'&indice='.($indice + 1).'">Siguiente</a></li>';
 }
 echo '</ul>';
 echo '</div>';
}



?>
<form method="post" action="index.php?p=detalles&chollo=<?php echo $id; ?>">
<h4>Deja por aqui tu comentario</h4>
<textarea name="textocomentario"></textarea><br>
<input type="submit" name="comentar" value="comentar">
</form>
</div>