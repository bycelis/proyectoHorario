<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
if (isset($_GET['id'])){
    $id=intval($_GET['id']);
} else {
    header("location:lista_usuarios_e.php");
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
        <h1>Editar Estudiante</h1>
        <center>
            <?php
            $usuario_d= new basedatos();
            if(isset($_POST) && !empty($_POST)){
                $usu_nombre = $usuario_d->limpiar_cadena($_POST['usu_nombre']);
                $usu_clave = $usuario_d->limpiar_cadena($_POST['usu_clave']);
                $inf_tido_id = $usuario_d->limpiar_cadena($_POST['inf_tido_id']);
                $inf_documento = $usuario_d->limpiar_cadena($_POST['inf_documento']);
                $inf_nombres = $usuario_d->limpiar_cadena($_POST['inf_nombres']);
                $inf_apellidos = $usuario_d->limpiar_cadena($_POST['inf_apellidos']);
                $inf_correo = $usuario_d->limpiar_cadena($_POST['inf_correo']);
                $inf_car_id = $usuario_d->limpiar_cadena($_POST['inf_car_id']);
                $res = $usuario_d->actualizar_usuario($usu_nombre,$usu_clave,$inf_tido_id,$inf_documento,$inf_nombres,$inf_apellidos,$inf_correo,$inf_car_id,$id);
                if($res){
                    $message= "Categoría se creo correctamente";
                    $class="alert alert-success alerta";
                    $_SESSION['usu_nomb'] = $usu_nombre;
                    header('Location: lista_usuarios_e.php');
                }else{
                    $message="No se pudieron crear el usauario: $usu_nombre";
                    $class="alert alert-danger";
                }
            }
            ?>
            <div class="sctionform">
                <?php 
                $buscar = new basedatos();
                $encontro = $buscar->seleccionar_usuario_d($id);
                ?>
                <form method="Post" class="sctionform">
                    <label>usuario:</label><br>
                    <input type="text" name="usu_nombre" placeholder="usuario" value="<?php echo $encontro -> usuario; ?>" maxlength="30"/>
                    <br>
                    <label>contraseña: </label><br>
                    <input type="text" name="usu_clave" placeholder="clave" value="<?php echo $encontro -> clave; ?>" maxlength="30"/>
                    <br>
                    <input type="hidden" name="id_cat" id="id_cat" class='form-control alerta' size="30" maxlength="30" required value="<?php echo $encontro -> id_usu; ?>" >
                    <label>tipo de documento:</label><br>
                    <select name="inf_tido_id" id="inf_tido_id ">
                        <?php 
                        $listado_tido=$buscar->buscar_tipo_documento($encontro->tipo_documento);

                        while ($row_tido=mysqli_fetch_object($listado_tido)){
                            $tido_id=$row_tido->num;
                            $tido_nombre=$row_tido->nombre;
                            ?>
                            <option value="<?php echo $tido_id; ?>"><?php echo $tido_nombre; ?></option>
                            <?php
                        }
                        ?>
                        <option value="0">----------------</option>
                        <?php 
                        $listado_tido=$buscar->lista_tipo_documento();

                        while ($row_tido=mysqli_fetch_object($listado_tido)){
                            $tido_id=$row_tido->num;
                            $tido_nombre=$row_tido->nombre;
                            ?>
                            <option value="<?php echo $tido_id; ?>"><?php echo $tido_nombre; ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <label>documento:</label><br>
                    <input type="text" name="inf_documento" id="inf_documento" class='form-control' maxlength="30" placeholder="documento" required value="<?php echo $encontro -> documento; ?>" ><br>
                    <label>nombres:</label><br>
                    <input type="text" name="inf_nombres" id="inf_nombres" class='form-control' maxlength="30" placeholder="nombres" required value="<?php echo $encontro -> nombres; ?>" ><br>
                    <label>apellidos:</label><br>
                    <input type="text" name="inf_apellidos" id="inf_apellidos" class='form-control' maxlength="30" placeholder="apellidos" required value="<?php echo $encontro -> apellidos; ?>" ><br>
                    <label>correo:</label><br>
                    <input type="email" name="inf_correo" id="inf_correo" class='form-control' maxlength="30" placeholder="correo" required value="<?php echo $encontro -> email; ?>" ><br>
                    <label>Carrera:</label><br>
                    <select name="inf_car_id" id="inf_car_id ">
                        <?php 
                        $listado_car=$buscar->buscar_carrera($encontro -> carrera);

                        while ($row_car=mysqli_fetch_object($listado_car)){
                            $car_id=$row_car->num;
                            $car_nombre=$row_car->nombre;
                            ?>
                            <option value="<?php echo $car_id; ?>"><?php echo $car_nombre; ?></option>
                            <?php
                        }
                        ?>
                        <option value="0">----------------</option>
                        <?php 
                        $listado_car=$buscar->lista_carrera();

                        while ($row_car=mysqli_fetch_object($listado_car)){
                            $car_id=$row_car->num;
                            $car_nombre=$row_car->nombre;
                            ?>
                            <option value="<?php echo $car_id; ?>"><?php echo $car_nombre; ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <input type="submit" class="button" value="ACTUALIZAR" />
                    <button type="button" class="button" onclick="window.location.href = 'lista_usuarios_d.php'">VOLVER</button>
                </form>
            </div>
        </center>
    </div>
</body>
</html>
