<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$usuario = $_SESSION['usuario'];
$id = $_SESSION['user_id'];
$menu = new basedatos();
$res = $menu->informacion_menu($usuario);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" >
    <title>ADMIN</title>
</head>
<body>
    <div class="section" id="header">
        
    </div>
    <div class="section">
        <nav class="menu">
            <a href="estudiantes.php">Home</a>
                <a href="horario_e.php?id=<?php echo $id;?>">Horario</a>
                <a href="../salir.php">Salir</a>
                <div class="animation start-home"></div>
        </nav>
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
