<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$menu = new basedatos();
$usuario = $_SESSION['usuario'];
$resm = $menu->informacion_menu($usuario);
$mensaje = '';
$tabla = false;
$mensajee = '';
$tablae = false;
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
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
        <div class="row">
            <h3>buscar <b>Docente</b></h3>
        </div> 
        <center>
            <?php 
            if(isset($_POST['buscarD']) && !empty($_POST['buscarD'])){
                $buscar = $menu->limpiar_cadena($_POST['buscarD']);
                $b = $menu->buscar_docentes($buscar);
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
                <input type="text" name="buscarD" id="buscarD" placeholder="Buscar">
                <button type="submit" class="buttonbuscar">BUSCAR</button>
            </form>
        </center>
        <div>
            <?php 
            if ($tabla == true) {
                ?>
                <table class="tablahi" >
                    <thead>
                        <tr>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Carrera</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>    
                        <?php 
                        while ($a=mysqli_fetch_object($b)){
                            $id=$a->num;
                            $apellidos=$a->apellidos;
                            $nombres=$a->nombres;
                            $carrera=$a->carrera;
                            ?>
                            <tr>
                                <td><?php echo $apellidos;?></td>
                                <td><?php echo $nombres;?></td>
                                <td><?php echo $carrera; ?></td>
                                <td>
                                    <a href="lista_materias_d.php?id=<?php echo $id;?>">MATERIAS DEL DOCENTE</a>
                                </td>
                            </tr>   
                            <?php
                        }
                        ?>

                    </tbody>
                </table><br>
                <center>
                    <button type="button" class="button" onclick="window.location.href = 'lista_estudiantes-docentes.php'">VER TODA LA LISTA</button>
                </center>
                <?php 
            } else {
                if ($tabla == false) {
                    ?>
                    <div class="table-title">
                        <div class="row">
                            <h1>Listado de  <b>Docentes</b></h1>
                        </div> 
                    </div>
                    <br>
                    <table class="tablahi" >
                        <thead>
                            <tr>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Carrera</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>    
                            <?php 
                            $usuario = new basedatos();
                            $listado=$usuario->lista_docentes();

                            while ($row=mysqli_fetch_object($listado)){
                                $id=$row->num;
                                $apellidos=$row->apellidos;
                                $nombres=$row->nombres;
                                $carrera=$row->carrera;
                                ?>
                                <tr>
                                    <td><?php echo $apellidos;?></td>
                                    <td><?php echo $nombres;?></td>
                                    <td><?php echo $carrera; ?></td>
                                    <td>
                                        <a href="lista_materias_d.php?id=<?php echo $id;?>">MATERIAS DEL DOCENTE</a>
                                    </td>
                                </tr>   
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <br>
                    <?php 
                }
            }
            
            ?>
        </div>
    </div>
    
    <div class="section">
        <div class="row">
            <h3>buscar <b>Estudiante</b></h3>
        </div> 
        <center>
            <?php 
            if(isset($_POST['buscarE']) && !empty($_POST['buscarE'])){
                $buscar = $menu->limpiar_cadena($_POST['buscarE']);
                $estb = $menu->buscar_estudiantes($buscar);
                if($estb){
                    $mensajee= "";
                    $tablae=true;
                }else{
                    $mensajee="no hay docente";
                    $tablae=false;
                }
            }
            ?>
            <form method="post">
                <input type="text" name="buscarE" id="buscarE" placeholder="Buscar">
                <button type="submit" class="buttonbuscar">BUSCAR</button>
            </form>
        </center>
        <div>
            <?php 
            if ($tablae == true) {
                ?>
                <table class="tablahi" >
                    <thead>
                        <tr>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Carrera</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>    
                        <?php 
                        while ($esta=mysqli_fetch_object($estb)){
                            $id=$esta->num;
                            $apellidos=$esta->apellidos;
                            $nombres=$esta->nombres;
                            $carrera=$esta->carrera;
                            ?>
                            <tr>
                                <td><?php echo $apellidos;?></td>
                                <td><?php echo $nombres;?></td>
                                <td><?php echo $carrera; ?></td>
                                <td>
                                    <a href="horario_e.php?id=<?php echo $id;?>">HORARIO</a>
                                </td>
                            </tr>   
                            <?php
                        }
                        ?>

                    </tbody>
                </table><br>
                <center>
                    <button type="button" class="button" onclick="window.location.href = 'lista_estudiantes-docentes.php'">VER TODA LA LISTA</button>
                </center>
                <?php 
            } else {
                if ($tablae == false) {
                    ?>
                    <div class="table-title">
                        <div class="row">
                            <h1>Listado de  <b>Estudiantes</b></h1>
                        </div> 
                    </div>
                    <br>
                    <table class="tablahi" >
                        <thead>
                            <tr>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Carrera</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>    
                            <?php 
                            $usuario = new basedatos();
                            $listado=$usuario->lista_estudiantes();

                            while ($row=mysqli_fetch_object($listado)){
                                $id=$row->num;
                                $apellidos=$row->apellidos;
                                $nombres=$row->nombres;
                                $carrera=$row->carrera;
                                ?>
                                <tr>
                                    <td><?php echo $apellidos;?></td>
                                    <td><?php echo $nombres;?></td>
                                    <td><?php echo $carrera; ?></td>
                                    <td>
                                        <a href="horario_e.php?id=<?php echo $id;?>">HORARIO</a>
                                    </td>
                                </tr>   
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <br>
                    <?php 
                }
            }
            
            ?>
        </div>
    </div>
</body>
</html>
