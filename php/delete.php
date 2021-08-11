<?php

session_start();
if ($_SESSION['logueado']) {

    include_once("config_productos.php");
    include_once("db.php");
    $conn = new db();
    $idDel = $_GET['q'];
    // Elimino los colores de la zapatilla.
    $sqlC = "delete from colores_zapatillas where id_zapatilla=" . $idDel;
    $result = $conn->query($sqlC);
     // Finalmente elimino el modelo de zapatilla.
    $sqlZ= "delete from zapatillas where id_zapatilla=" . $idDel;
    $result = $conn->query($sqlZ);
    header('location:welcome.php');
}
