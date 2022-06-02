<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$usuarioid = $_SESSION['usuario'];
$materias = new basedatos();
$mensaje = '';
$tabla = false;
$cont = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
        <div class="row">
            <h3>buscar <b>Materia</b></h3>
        </div> 
        <center>
            <?php 
            if(isset($_POST['buscarM']) && !empty($_POST['buscarM'])){
                $buscar = $materias->limpiar_cadena($_POST['buscarM']);
                $b = $materias->buscar_materias($buscar);
                if($b){
                    $mensaje= "";
                    $tabla=true;
                }else{
                    $mensaje="no hay docente";
                    $tabla=false;
                }
            }
            ?>
            <form method="post">
                <input type="text" name="buscarM" id="buscarM" placeholder="Buscar">
                <button type="submit" class="buttonbuscar">BUSCAR</button>
            </form>
        </center>
        <div>
            <?php 
            if ($tabla == true) {
                ?>
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
                        $usuario = new basedatos();
                        $listado=$usuario->buscar_materias($buscar);
                        while ($rowb=mysqli_fetch_object($listado)){
                            $codigo=$rowb->codigo;
                            $grupos=$rowb->grupo;
                            $nombre=$rowb->materia;
                            $salon=$rowb->salon;
                            $dia=$rowb->dia;
                            $hora=$rowb->hora;
                            $id=$rowb->id;
                            ?>
                            <tr>
                                <td><?php $id ?></td>
                                <td><?php echo $codigo;?></td>
                                <td><?php echo $grupos;?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $salon; ?></td>
                                <td><?php echo $dia; ?></td>
                                <td><?php echo $hora; ?></td>
                                <td >
                                    <a href="editar_materia.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="eliminar_materia.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE92B;</i></a>
                                    <a href="escoger_docente.php?id=<?php echo $id;?>" class="escoger" title="Escoger" data-toggle="tooltip">ESCOGER DOCENTE</a>
                                </td>
                            </tr>   
                            <?php
                        }
                        ?>

                    </tbody>
                </table><br>
                <center>
                    <button type="button" class="button" onclick="window.location.href = 'crear_materia.php'">INSENTAR MATERIA</button><br><br>
                    <button type="button" class="button" onclick="window.location.href = 'lista_materias.php'">VER TODA LA LISTA</button>
                </center>
                <?php 
            } else {
                if ($tabla == false) {
                    ?>
                    <div class="section">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8"><h1>Listado de  <b>materias</b></h1></div>
                            </div> 
                        </div>
                        <br>
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
                                $usuario = new basedatos();
                                $listado=$usuario->lista_materias();
                                while ($row=mysqli_fetch_object($listado)){
                                    $codigo=$row->codigo;
                                    $grupos=$row->grupo;
                                    $nombre=$row->materia;
                                    $salon=$row->salon;
                                    $dia=$row->dia;
                                    $hora=$row->hora;
                                    $id=$row->id;
                                    ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $codigo;?></td>
                                        <td><?php echo $grupos;?></td>
                                        <td><?php echo $nombre; ?></td>
                                        <td><?php echo $salon; ?></td>
                                        <td><?php echo $dia; ?></td>
                                        <td><?php echo $hora; ?></td>
                                        <td >
                                            <a href="editar_materia.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                            <a href="eliminar_materia.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE92B;</i></a>
                                            <a href="escoger_docente.php?id=<?php echo $id;?>" class="escoger" title="Escoger" data-toggle="tooltip">ESCOGER DOCENTE</a>
                                        </td>
                                    </tr>   
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <br>
                        <center>
                            <button type="button" class="button" onclick="window.location.href = 'crear_materia.php'">INSENTAR MATERIA</button>
                        </center>
                        <?php 
                    }
                }

                ?>
            </div>
        </div>

    </div>
</body>
</html>
