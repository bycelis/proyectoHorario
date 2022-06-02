<?php 
include ('bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$_SESSION['usuario'] = "";
session_destroy();
header('Location: index.php');
 ?>