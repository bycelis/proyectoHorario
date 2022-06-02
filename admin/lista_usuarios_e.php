<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$usuario = $_SESSION['usuario'];
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
        <div class="table-title">
            <div class="row">
                <h1>Listado de  <b>Estudiantes</b></h1>
            </div> 
        </div>
        <br>
        <table class="tablahi" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Usuario</th>
                    <th>Clave</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>    
                <?php 
                $usuario = new basedatos();
                $listado=$usuario->lista_usuario_e();

                while ($row=mysqli_fetch_object($listado)){
                    $id=$row->id;
                    $usuario=$row->usuario;
                    $clave=$row->clave;
                    $nombres=$row->nombres;
                    $apellidos=$row->apellidos;
                    $cont = $cont + 1;
                    ?>
                    <tr>
                        <td><?php echo $cont?></td>
                        <td><?php echo $apellidos; ?></td>
                        <td><?php echo $nombres; ?></td>
                        <td><?php echo $usuario;?></td>
                        <td><?php echo $clave; ?></td>
                        <td >
                            <a href="editar_usuarios_e.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="eliminar_usuarios_e.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE92B;</i></a>
                        </td>
                    </tr>   
                    <?php
                }
                ?>

            </tbody>
        </table>
        <br>
        <center>
            <button type="button" class="button" onclick="window.location.href = 'crear_usuarios_e.php'">CREAR USUARIO ESTUDIANTE</button>
        </center>
    </div>
    
</body>
</html>
