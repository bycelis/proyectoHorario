<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$inma_inf_id = $_SESSION['id_docentess'];
$usuario = $_SESSION['usuario'];
$listm = new basedatos();
$inma_mat_id=intval($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css" >
    <title>ADMIN</title>
</head>
<body>
    <div class="section" id="header">

    </div>
    <div class="section">
        <nav class="menu">
            <a href="admin.php">Home</a>
            <a href="lista_usuarios_d.php">Lista Docentes</a>
            <a href="lista_usuarios_e.php">Lista Estudiantes</a>
            <a href="lista_materias.php">lista Materias</a>
            <a href="lista_estudiantes-docentes.php">Horarios Estudiantes y docentes</a>
            <a href="../salir.php">Salir</a>
            <div class="animation start-home"></div>
        </nav>
    </div>
    <div class="section">
        <table class="tablahi">
            <thead>
                <tr>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                </tr>
            </thead>
            <tbody>    
                <?php 
                $listado=$listm->lista_estudiantes_d($inma_mat_id,$inma_inf_id);
                while ($row=mysqli_fetch_object($listado)){
                    $apellidos=$row->apellidos;
                    $nombres=$row->nombres;
                    ?>
                    <tr>
                        <td><center><?php echo $apellidos;?></center></td>
                        <td><center><?php echo $nombres;?></center></td>
                    </tr>   
                    <?php
                }
                ?>

            </tbody>
        </table><br>
        <center>
            <button type="button" class="button" onclick="window.location.href = 'lista_materias_d.php?id=<?php echo $inma_inf_id; ?>'">VOLVER</button>
        </center>
    </div>
</body>
</html>