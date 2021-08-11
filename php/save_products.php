<?php

session_start();
if($_SESSION['logueado'])
{
    include_once("upload_image.php");
    $modelo=$_POST['modelo'];
    $precio=$_POST['precio'];
    $descripcion=$_POST['descripcion'];
    $genero=$_POST['genero'];
    $disciplina=$_POST['disciplina'];
    $marca=$_POST['marca'];
    $path_img="images/".$nombre_img;
    include_once("config_productos.php");
    include_once("db.php");
    $conn = new db();
    $sql = "insert into zapatillas (modelo,precio,genero,id_marca,imagen,descripcion,disciplina)
            values (?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('sdsisss',$modelo,$precio,$genero,$marca,$path_img,$descripcion,$disciplina);
    if($stmt->execute()){
    ?>
    <script>
     alert("Producto Ingresado : + <?php  echo $modelo   ?>");
     window.location="insert_products.php";
    </script>

<?php
    }
}
?>