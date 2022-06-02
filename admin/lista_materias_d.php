<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$usuario = $_SESSION['usuario'];
$listm = new basedatos();
$doc_id=intval($_GET['id']);
$_SESSION['id_docentess'] = $doc_id;
$cont = 0;
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
        <?php 
            $nombrecompleto=$listm->buscar_profesor($doc_id);
         ?>
        <div class="table-title">
            <div class="row">
                <h1>Listado de  <b>Materias del docente: <br> <?php echo $nombrecompleto->nombre_completo; ?> </b></h1>
            </div> 
        </div>
        <table class="tablahi">
            <thead>
                <tr>
                    <th>#</th>
                    <th>codigo</th>
                    <th>grupo</th>
                    <th>nombre</th>
                    <th>salon</th>
                    <th>dia</th>
                    <th>hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>    
                <?php 
                $listado=$listm->lista_materias_d($doc_id);
                while ($row=mysqli_fetch_object($listado)){
                    $codigo=$row->codigo;
                    $grupos=$row->grupo;
                    $nombre=$row->materia;
                    $salon=$row->salon;
                    $dia=$row->dia;
                    $hora=$row->hora;
                    $id=$row->id;
                    $cont = $cont + 1;
                    ?>
                    <tr>
                        <td><?php echo $cont; ?></td>
                        <td><?php echo $codigo;?></td>
                        <td><?php echo $grupos;?></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $salon; ?></td>
                        <td><?php echo $dia; ?></td>
                        <td><?php echo $hora; ?></td>
                        <td >
                            <a href="lista_estudiantes.php?id=<?php echo $id;?>" class="escoger" title="Escoger" data-toggle="tooltip">LISTAS DE ESTUDIANTES</a>
                        </td>
                    </tr>   
                    <?php
                }
                ?>

            </tbody>
        </table>
        <br><br>
        <center>
            <button type="button" class="button" onclick="window.location.href = 'lista_estudiantes-docentes.php'">VOLVER</button>
        </center>
    </div>
</body>
</html>
