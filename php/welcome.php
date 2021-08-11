<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/welcome.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootbox.min.js"></script>
    <script>
        function deleteProduct(cod_zapatilla) {
            bootbox.confirm("Desea ud. eliminar realmente el id " + cod_zapatilla, function(result) {
                if (result) {
                    window.location = "delete.php?q=" + cod_zapatilla;
                }

            });


        }

        function updateProduct(cod_zapatilla) {
            window.location = "edit.php?q=" + cod_zapatilla;

        }
    </script>


</head>

<body>
    <nav class="navtop">
        <div>
            <h1>Area Privada</h1>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="content">
        <?php
        session_start();
        if ($_SESSION['logueado']) {
            echo "Bienvenido/a, " . $_SESSION['username'];
            echo "<br>";
            echo "Horario de Conexión: " . $_SESSION['time'];
            echo "<br>";
        }

        ?>
        <br>

        <a href="insert_products.php" class="btn btn-primary" role="button">Ingresar Producto</a>
        <br>
        <br>

        <!-- Table -->


        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Precio</th>
                    <th>Fecha de Alta</th>
                    <th>Eliminar</th>
                    <th>Actualizar</th>
                </tr>
            </thead>
            <tbody>
                <?php


                include_once("config_productos.php");
                include_once("db.php");
                $conn = new db();
                $sql = "select zapatillas.id_zapatilla as id, marcas.descripcion as descripcion,zapatillas.modelo as modelo, zapatillas.precio as precio,date_format(zapatillas.fecha_alta,'%d/%m/%Y') as fecha from zapatillas,marcas where zapatillas.id_marca=marcas.id_marca";
                $result = $conn->query($sql);




                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['descripcion']; ?>
                        </td>
                        <td>
                            <?php echo $row['modelo']; ?>
                        </td>
                        <td>
                            <?php echo $row['precio']; ?>
                        </td>
                        <td>
                            <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                            <a href="#" onclick="deleteProduct(<?php echo $row['id'] ?>)"> Eliminar Producto</a>
                        </td>
                        <td>
                            <a href="#" onclick="updateProduct(<?php echo $row['id'] ?>)"> Actualizar Producto</a>
                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>





    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>

</html>