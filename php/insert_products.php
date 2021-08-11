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
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">INGRESO DE PRODUCTOS</h3>
                <br>
            </div>
            <div class="col-md-12">
                <form action="save_products.php" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-group">
                    <div class="form-group">
                        <label for="modelo" class="control-label">MODELO</label>
                        <input type="text" id="modelo" class="form-control" name="modelo" required="" placeholder="MODELO">
                    </div>
                    <div class="form-group">
                        <label for="precio" class="control-label">PRECIO</label>
                        <input type="text" class="form-control" name="precio" required="" placeholder="PRECIO">
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="control-label">DESCRIPCION</label>
                        <textarea class="form-control" name="descripcion" rows=3> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="genero" class="control-label">GÉNERO</label>
                        <select name="genero" class="form-control">
                            <option value="mujer">MUJER</option>
                            <option value="hombre">HOMBRE</option>
                            <option value="niño">NIÑO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="disciplina" class="control-label">DISCIPLINA</label>
                        <select name="disciplina" class="form-control">
                            <option value="futbol">FUTBOL</option>
                            <option value="tenis">TENIS</option>
                            <option value="basket">BASKET</option>
                            <option value="moda">MODA</option>
                            <option value="running">RUNNING</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="marca" class="control-label">MARCA</label>
                        <select name="marca" class="form-control">
                            <?php
                            include_once("config_productos.php");
                            include_once("db.php");
                            $conn = new db();
                            $sql = "select id_marca as id,descripcion as descripcion from marcas order by descripcion";
                            $result = $conn->query($sql);

                            while ($rowBrands = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $rowBrands['id'] ?>"><?php echo $rowBrands['descripcion'] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                        <div class="form-group">
                            <label for="imagen" class="control-label">Seleccione la imagen a subir</label>
                            <input type="file" id="imagen" class="form-control" name="imagen" size="30">
                        </div>
                        <br>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Añadir Producto">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>

</html>