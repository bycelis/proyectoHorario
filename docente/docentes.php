<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$usuario = $_SESSION['usuario'];
$menu = new basedatos();
$res = $menu->informacion_menu($usuario);
$id = $res->num;
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" >
    <title>DOCENTES</title>
</head>
<body>
    <div class="section" id="header">

    </div>
    <div class="section">
        <center>
            <nav class="menu">
                <a href="docentes.php">Home</a>
                <a href="lista_materias_d.php?id=<?php echo $id;?>">Lista Materias</a>
                <a href="../salir.php">Salir</a>
                <div class="animation start-home"></div>
            </nav>
        </center>
    </div>
    <div class="section">
        <nav class="home">
            <h1 class="col-sm-8">Bienvenido <?php echo $_SESSION['usuario']; ?></h1><br>
            <p>TI: <?php  echo $res->tipo_documento;?></p>
            <p>Documento: <?php echo $res->documento; ?></p>
            <p>Nombres: <?php  echo $res->nombres;?></p>
            <p>Apellidos: <?php echo $res->apellidos; ?></p>
            <p>Correo: <?php echo $res->correo; ?></p>
            <p>carrera: <?php echo $res->carrera; ?></p>
        </nav>
    </div>
</body>
</html>
