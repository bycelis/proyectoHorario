<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
if (isset($_GET['id'])){
    $materia = new basedatos();
    $est_id=intval($_GET['id']);
    $message='';
    $class='';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
        $matricula = new basedatos();
        $resultado=$matricula->buscar_carrera_estudiante($est_id);
        $car_id = $resultado->carrera;
        if(isset($_POST) && !empty($_POST)){
            $inma_mat_id = $matricula->limpiar_cadena($_POST['inma_mat_id']);
            $res = $matricula->matricular($est_id,$inma_mat_id,$car_id);
            if($res){
                header('Location: horario_e.php?id='.$est_id);
                $message= "Usuario y Informacion se creo correctamente";
                $class="alert alert-success alerta";
            }else{
                $message="No se pudieron crear el informacion";
                $class="alert alert-danger";
            }
        }

        ?>
        <div class="<?php echo $class?>">
          <?php 
          echo $message;
          ?>
      </div>
      <form  method="Post">
        <table class="tablahi">
            <thead>
                <tr>
                    <th>#</th>
                    <th>codigo</th>
                    <th>nombre</th>
                    <th>salon</th>
                    <th>dia</th>
                    <th>hora</th>
                </tr>
            </thead>
            <tbody>    
                <?php 
                $listado=$matricula->lista_materias();
                while ($row=mysqli_fetch_object($listado)){
                    $mat_codigo=$row->codigo;
                    $mat_nombre=$row->materia;
                    $mat_salon=$row->salon;
                    $mat_dia=$row->dia;
                    $mat_hora=$row->hora;
                    $mat_id=$row->id;
                    ?>
                    <tr>
                        <td>
                            <input type="radio" id=" inma_mat_id" name=" inma_mat_id" value="<?php echo $mat_id;?>">
                        </td>
                        <td><?php echo $mat_codigo;?></td>
                        <td><?php echo $mat_nombre; ?></td>
                        <td><?php echo $mat_salon; ?></td>
                        <td><?php echo $mat_dia; ?></td>
                        <td><?php echo $mat_hora; ?></td>
                    </tr>   
                    <?php
                }
                ?>

            </tbody>
        </table>
        <center>
            <br>
            <input type="submit" class="button" value="INGRESAR" />
        </center>
    </form>
    <br>

</div>
</body>
</html>
