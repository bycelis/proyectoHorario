<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$usuario = $_SESSION['usuario'];
$materia = new basedatos();
$message= '';
$class='';
$mat_codigo='';
$mat_nombre='';
$mat_dise_id='';
$mat_sal_id='';
$mat_hor_id='';
$mat_gru_id='';
$res = '';
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
    <?php
    if(isset($_POST) && !empty($_POST)){
        $mat_codigo = $materia->limpiar_cadena($_POST['mat_codigo']);
        $mat_nombre = $materia->limpiar_cadena($_POST['mat_nombre']);
        $mat_dise_id = $materia->limpiar_cadena($_POST['mat_dise_id']);
        $mat_sal_id = $materia->limpiar_cadena($_POST['mat_sal_id']);
        $mat_hor_id = $materia->limpiar_cadena($_POST['mat_hor_id']);
        $mat_gru_id = $materia->limpiar_cadena($_POST['mat_gru_id']);
        $res = $materia->crear_materia($mat_codigo,$mat_nombre,$mat_dise_id,$mat_sal_id,$mat_hor_id,$mat_gru_id);
        if($res){
            $message= "Usuario y Informacion se creo correctamente";
            $class="alert alert-success alerta";
            header('Location: lista_materias.php');
        }else{
            $message="No se pudieron crear el informacion";
            $class="alert alert-danger";
        }
    }
    ?>
    <div class="section">
        <h1>Registrar Materia</h1>
        <center>
            <div class="sctionform">
                <div class="<?php echo $class; ?>">
                    <?php echo $message."<br>"; ?>
                    <?php echo $mat_codigo."  ".$mat_nombre."  ".$mat_dise_id."  ".$mat_sal_id."  ".$mat_hor_id."  ".$mat_gru_id."  ".$res; ?>
                </div>
                <form method="Post">
                    <input type="text" name="mat_codigo" placeholder="codigo" values="" />
                    <br>
                    <input type="text" name="mat_nombre" placeholder="materia" values="" />
                    <br>
                    <label>día:</label><br>
                    <select name="mat_dise_id" id="mat_dise_id ">
                        <?php 
                        $listado_dise=$materia->lista_dias_semana();
                        while ($row_dise=mysqli_fetch_object($listado_dise)){
                            $dise_id=$row_dise->num;
                            $dise_dias=$row_dise->dia;
                            ?>
                            <option value="<?php echo $dise_id; ?>"><?php echo $dise_dias; ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <label>salon:</label><br>
                    <select name="mat_sal_id" id="mat_sal_id ">
                        <?php 
                        $listado_sal=$materia->lista_salones();
                        while ($row_sal=mysqli_fetch_object($listado_sal)){
                            $sal_id=$row_sal->num;
                            $sal_dias=$row_sal->salon;
                            ?>
                            <option value="<?php echo $sal_id; ?>"><?php echo $sal_dias; ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <label>hora:</label><br>
                    <select name="mat_hor_id" id="mat_hor_id ">
                        <?php 
                        $listado_hor=$materia->lista_horas();
                        while ($row_hor=mysqli_fetch_object($listado_hor)){
                            $hor_id=$row_hor->num;
                            $hor_horas=$row_hor->hora;
                            ?>
                            <option value="<?php echo $hor_id; ?>"><?php echo $hor_horas; ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <label>grupo: </label><br>
                    <select name="mat_gru_id" id="mat_gru_id">
                        <?php 
                        $listado_gru=$materia->lista_grupos();
                        while ($row_gru=mysqli_fetch_object($listado_gru)){
                            $gru_id=$row_gru->num;
                            $gru_nombre=$row_gru->grupos;
                            ?>
                            <option value="<?php echo $gru_id; ?>"><?php echo $gru_nombre; ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <div class="col-md-12 pull-right">
                        <button type="submit" class="button">CREAR MATERIA</button>
                    </div>
                    <br>
                    <button type="button" class="button" onclick="window.location.href = 'lista_materias.php'">VOLVER</button>
                </form>

            </div>
        </center>
    </div>
</body>
</html>
