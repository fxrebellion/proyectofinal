<?php

if (isset($_GET['indice'])) {
    $indice = $_GET['indice'];
} else {
    $indice = 0;
}
if (isset($_POST['eliminarchollo'])) {
    $id = $_GET['chollo'];

    $borrarchollo = new chollo();
    $borrarchollo->delete($id);
}

if(isset($_POST['barrabuscar'])){
$descripcion = $_POST['texto_buscar'];
$chollos = new Chollo();
$chollos->barrabuscar($descripcion);
$rows = $chollos->get_chollos();

}else{ 

$chollos = new Chollo();
$chollos->get_todos();
$rows = $chollos->get_chollos();

$numero = count($rows);

$chollos = new Chollo();
$chollos->get_paginado($indice);
$rows = $chollos->get_chollos();
$numerototal = ceil($numero / 8);
}


if (count($rows) > 0) {
    $contador = 1;

    echo "<div class='wrapper'>";
    foreach ($rows as $row) {
        echo "<div class='tablachollos'>";
        ?>
        <div class="cuadradito">
            <h1><?php echo $row['descripcion'] ?></h1><img src="<?php echo $row['imagen'] ?>" width="170px" height="100px"><br>
            <p><?php echo "Puntuación " . $row['nvotos'] ?></p><br>
            <div class="enlace"><a href="index.php?p=detalles&chollo=<?php echo $row['id'] ?>">Ir al chollo</a><br><?php if (isset($_SESSION['tipo'])) {
                                                                                                                        if ($_SESSION['tipo'] != 'usuario') echo "<div><form method='post' action='index.php?p=inicio&chollo=" . $row['id'] . "'><button type='submit' name='eliminarchollo' ><i class='fas fa-trash-alt'></i></button></form></div>";
                                                                                                                    } ?></div>
        </div>
        </div>
        <?php
        $contador++;
        if ($contador == 3) {
            echo "</div>\n";
            $contador = 1;
        }
    }

    if(!isset($_POST['barrabuscar'])){
    echo '<div style="clear:both; text-align:center; ">';
    echo '<ul style="list-style:none; ">';
    if ($indice != 0) {
        echo '<li style="display:inline; padding-left:0.5em; "><a style="text-decoration:none; color:black;" href="index.php?p=inicio&indice=' . ($indice - 1) . '">Anterior</a></li>';
    }
    if ($indice > 0) {
        echo '<li style="display:inline;padding-left:0.5em; "><a style="text-decoration:none; color:black;" href="index.php?p=inicio&indice=' . ($indice - 1) . '">' . ($indice - 1) . '</a></li>';
    }
    echo '<li style="display:inline; padding-left:0.5em; "><a  style="text-decoration:none; color:black;"  href="index.php?p=inicio&indice=' . ($indice) . '">' . ($indice) . '</a></li>';
    if ($indice != $numerototal - 1) {
        echo '<li style="display:inline; padding-left:0.5em; "><a style="text-decoration:none; color:black;" href="index.php?p=inicio&indice=' . ($indice + 1) . '">' . ($indice + 1) . '</a></li>';
    }

    if ($indice != $numerototal - 1) {
        echo '<li style="display:inline; padding-left:0.5em;"><a style="text-decoration:none; color:black;" href="index.php?p=inicio&indice=' . ($indice + 1) . '">Siguiente</a></li>';
    }
    echo '</ul>';
    echo '</div>';
}

    echo "</div>";




    echo "</div>";
} else { //NO HAY PRODUCTOS
    $msg = "NO HAY PRODUCTOS";
}
?>