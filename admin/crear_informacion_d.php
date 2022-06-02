<?php 
include ('../bd/conexion.php');
session_start();
$usu_nomb = $_SESSION['usu_nomb'];
$rol_nomb = "DOCENTES";
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$message='';
$class='';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css" >
    <title>Estudiante</title>
</head>
<body>
    <div class="section" id="header">

    </div>
    <div class="section">
        <center>
            <div class="sctionform">

                <div class="table-title">
                    <div class="row">
                        <h1>Crear <b>informacion docente</b></h1>
                    </div> 
                </div>
                <?php
                $informacion = new basedatos();
                if(isset($_POST) && !empty($_POST)){
                    $inf_tido_id = $informacion->limpiar_cadena($_POST['inf_tido_id']);
                    $inf_documento = $informacion->limpiar_cadena($_POST['inf_documento']);
                    $inf_nombres = $informacion->limpiar_cadena($_POST['inf_nombres']);
                    $inf_apellidos = $informacion->limpiar_cadena($_POST['inf_apellidos']);
                    $info_correo = $informacion->limpiar_cadena($_POST['info_correo']);
                    $inf_usu_id = $informacion->limpiar_cadena($_POST['inf_usu_id']);
                    $inf_rol_id = $informacion->limpiar_cadena($_POST['inf_rol_id']);
                    $inf_car_id = $informacion->limpiar_cadena($_POST['inf_car_id']);
                    $res = $informacion->crear_informacion($inf_tido_id,$inf_documento,$inf_nombres,$inf_apellidos,$info_correo,$inf_usu_id,$inf_rol_id,$inf_car_id);
                    if($res){
                        header('Location: lista_usuarios_d.php');
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
              <div class="form">
                <div class="row">
                    <!-- el método post envia los datos capturados en un formulario de manera incognita -->
                    <form method="post">
                        <div class="col-md-3">
                            <label>tipo de documento:</label><br>
                            <select name="inf_tido_id" id="inf_tido_id ">
                                <?php 
                                $listado_tido=$informacion->lista_tipo_documento();

                                while ($row_tido=mysqli_fetch_object($listado_tido)){
                                    $tido_id=$row_tido->num;
                                    $tido_nombre=$row_tido->nombre;
                                    ?>
                                    <option value="<?php echo $tido_id; ?>"><?php echo $tido_nombre; ?></option>
                                    <?php
                                }
                                ?>
                            </select><br>
                            <input type="text" name="inf_documento" id="inf_documento" class='form-control' maxlength="30" placeholder="documento" required >
                            <input type="text" name="inf_nombres" id="inf_nombres" class='form-control' maxlength="30" placeholder="nombres" required >
                            <input type="text" name="inf_apellidos" id="inf_apellidos" class='form-control' maxlength="30" placeholder="apellidos" required >
                            <input type="email" name="info_correo" id="info_correo" class='form-control' maxlength="30" placeholder="correo" required >
                            <br><label>usuario:</label><br>
                            <select name="inf_usu_id" id="inf_usu_id ">
                                <?php 
                                $listado_usu=$informacion->lista_usuario_buscar($usu_nomb);

                                while ($row_usu=mysqli_fetch_object($listado_usu)){
                                    $usu_id=$row_usu->num;
                                    $usu_nombre=$row_usu->nombre;
                                    ?>
                                    <option value="<?php echo $usu_id; ?>"><?php echo $usu_nombre; ?></option>
                                    <?php
                                }
                                ?>
                            </select><br>
                            <label>rol:</label><br>
                            <select name="inf_rol_id" id="inf_rol_id ">
                                <?php 
                                $listado_rol=$informacion->lista_roles_buscar($rol_nomb);

                                while ($row_rol=mysqli_fetch_object($listado_rol)){
                                    $rol_id=$row_rol->num;
                                    $rol_nomb=$row_rol->nombre;
                                    ?>
                                    <option value="<?php echo $rol_id; ?>"><?php echo $rol_nomb; ?></option>
                                    <?php
                                }
                                ?>
                            </select><br>
                            <label>Carrera:</label><br>
                            <select name="inf_car_id" id="inf_car_id ">
                                <?php 
                                $listado_car=$informacion->lista_carrera();

                                while ($row_car=mysqli_fetch_object($listado_car)){
                                    $car_id=$row_car->num;
                                    $car_nombre=$row_car->nombre;
                                    ?>
                                    <option value="<?php echo $car_id; ?>"><?php echo $car_nombre; ?></option>
                                    <?php
                                }
                                ?>
                            </select><br>
                        </div>
                        <div class="col-md-12 pull-right">
                            <br>
                            <button type="submit" class="button">Crear informacion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>
</div>
</body>
</html>
