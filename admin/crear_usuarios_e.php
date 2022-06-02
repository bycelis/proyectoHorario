<?php 
include ('../bd/conexion.php');
session_start();
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
        <h1>Registrar Usuario Estudiante</h1>
        <center>
            <?php
            $usuario_d= new basedatos();
            if(isset($_POST) && !empty($_POST)){
                $usu_nombre = $usuario_d->limpiar_cadena($_POST['usu_nombre']);
                $usu_clave = $usuario_d->limpiar_cadena($_POST['usu_clave']);
                $res = $usuario_d->crear_usuario($usu_nombre,$usu_clave);
                if($res){
                    $message= "Categoría se creo correctamente";
                    $class="alert alert-success alerta";
                    $_SESSION['usu_nomb_e'] = $usu_nombre;
                    header('Location: crear_informacion_e.php');
                }else{
                    $message="No se pudieron crear el usauario: $usu_nombre";
                    $class="alert alert-danger";
                }
            }
            ?>
            <div class="sctionform">

                <form method="Post" class="sctionform">
                    <input type="text" name="usu_nombre" placeholder="usuario" values="" maxlength="30" />
                    <br>
                    <input type="text" name="usu_clave" placeholder="clave" values="" maxlength="30" />
                    <br>
                    <input type="submit" class="button" value="INSERTAR" />
                    <button type="button" class="button" onclick="window.location.href = 'lista_usuarios_e.php'">VOLVER</button>
                </form>
            </div>
        </center>
    </div>
</body>
</html>
