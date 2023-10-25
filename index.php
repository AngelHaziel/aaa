<?php 
//require "../PHP/conexion.php";
//$db = new Database();
//$conn =$db->conectar();
$dato = "2";
$nombre = "Olga";
//$total = 0;
//$query = $conn->prepare ("SELECT producto.id, producto.nombre, producto.descripcion, producto.precio, carrito.compra, carrito.cantidad, carrito.estado
//FROM producto INNER JOIN carrito ON producto.id = carrito.id_producto
//WHERE carrito.estado = 1 AND carrito.id_usuario = $dato");
//$query->execute();
//$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
//$sql = $conn->prepare("SELECT * FROM usuario WHERE id=$dato");
//$sql->execute();
//$res = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="carrito.css">
    <link rel="stylesheet" href="barra_nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <title>PokeGarden</title>
    <style>
        .pdf-item {
            display: inline-block;
            width: 150px;
            height: 210px;
            background: url('Ty.png') ;
            background-size: 9em;
            background-repeat: no-repeat;
            background-position: center;
            margin: 10px;
            padding: 10px;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            border: 1px solid #ddd;
            text-align: center;
            border-radius: 1em;
        }

        .pdf-item a {
            display: block;
            height: 100%;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
<header class="header_index">
        <nav class="nav">
            <div class="logo"><a href="index.php?dato=<?php echo $dato ?>">PokeGarden</a></div>
            <ul class="menu">
                <li><a href="ubicacion.php?dato=<?php echo $dato ?>">Ubicación</a></li>
                <li><a href="producto.php?dato=<?php echo $dato ?>">Productos</a></li>
                <li><a href="carrito.php?dato=<?php echo $dato ?>">Carrito</a></li>
                <li><a href="#?dato=<?php echo $dato ?>">Ver Compras</a></li>
                <li><a href="../index.html">Cerrar Sesión</a></li>
                <li><img class="icon" src="usuario.png" alt=""></li>
            </ul>
        </nav>
    </header>
    <section class="cuerpo">
        <h2>Hola usuario: <?php echo $nombre?></h2>
        <h3>Listado de Compras</h3>
        <ul>
    <?php
    $dir = "PDF/$dato/";

    if (!is_dir($dir)) {
        echo "<h3>No hay ninguna compra</h3>";
    } else {
        $files = scandir($dir);
        
        if ($files === false) {
            echo "<h3>Error al leer el directorio</h3>";
        } else {
            $pdfFound = false;
    
            foreach($files as $file) {
                if(pathinfo($file, PATHINFO_EXTENSION) == "pdf") {
                    echo "<div class='pdf-item'><a href='" . $dir . $file . "' target='_blank'>" . htmlspecialchars($file) . "</a></div>";
                    $pdfFound = true;
                }
            }
            
            if (!$pdfFound) {
                echo "<h3>No hay ninguna compra</h3>";
            }
        }
    }
    ?>
</ul>
        
    </section>
</body>
</html>