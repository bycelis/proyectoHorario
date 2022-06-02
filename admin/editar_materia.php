<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
if (isset($_GET['id'])){
    $id=intval($_GET['id']);
} else {
    header("location:lista_materias.php");
}
$editar = new basedatos();
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
    $informacion = new basedatos();
    if(isset($_POST) && !empty($_POST)){
        $mat_codigo = $informacion->limpiar_cadena($_POST['mat_codigo']);
        $mat_nombre = $informacion->limpiar_cadena($_POST['mat_nombre']);
        $mat_dise_id = $informacion->limpiar_cadena($_POST['mat_dise_id']);
        $mat_sal_id = $informacion->limpiar_cadena($_POST['mat_sal_id']);
        $mat_hor_id = $informacion->limpiar_cadena($_POST['mat_hor_id']);
        $mat_gru_id = $informacion->limpiar_cadena($_POST['mat_gru_id']);
        $res = $informacion->actualizar_materia($mat_codigo,$mat_nombre,$mat_dise_id,$mat_sal_id,$mat_hor_id,$mat_gru_id,$id);
        if($res){
            header('Location: lista_materias.php');
            $message= "Usuario y Informacion se creo correctamente";
            $class="alert alert-success alerta";
        }else{
            $message="No se pudieron crear el informacion";
            $class="alert alert-danger";
        }
    }
    ?>
    <div class="section">
        <h1>Editar Materia</h1>
        <center>
            <div class="sctionform">
                <?php 
                    $encontro = $editar -> buscar_materia_edit($id);
                 ?>
                <form method="Post">
                    <label>codigo:</label><br>
                    <input type="text" name="mat_codigo" placeholder="codigo" value="<?php echo $encontro -> codigo; ?>" />
                    <br>
                    <label>materia:</label><br>
                    <input type="text" name="mat_nombre" placeholder="materia" value="<?php echo $encontro -> nombre; ?>" />
                    <br>
                    <label>día:</label><br>
                    <select name="mat_dise_id" id="mat_dise_id ">
                        <?php 
                        $listado_dis=$editar->buscar_dias_semana_edit($encontro->dias_semana);
                        while ($row_dis=mysqli_fetch_object($listado_dis)){
                            $dise_id=$row_dis->id;
                            $dise_dias=$row_dis->dia;
                            ?>
                            <option value="<?php echo $dise_id; ?>"><?php echo $dise_dias; ?></option>
                            <?php
                        }
                        ?>
                        <option value="0">------------</option>
                        <?php 
                        $listado_dise=$editar->lista_dias_semana();
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
                        $listado_sal=$editar->buscar_salones($encontro->salon);
                        while ($row_sal=mysqli_fetch_object($listado_sal)){
                            $sal_id=$row_sal->num;
                            $sal_dias=$row_sal->salon;
                            ?>
                            <option value="<?php echo $sal_id; ?>"><?php echo $sal_dias; ?></option>
                            <?php
                        }
                        ?>
                        <option value="0">------------</option>
                        <?php 
                        $listado_sal=$editar->lista_salones();
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
                        $listado_hor=$editar->buscar_horas($encontro->hora);
                        while ($row_hor=mysqli_fetch_object($listado_hor)){
                            $hor_id=$row_hor->num;
                            $hor_horas=$row_hor->hora;
                            ?>
                            <option value="<?php echo $hor_id; ?>"><?php echo $hor_horas; ?></option>
                            <?php
                        }
                        ?>
                        <option value="0">------------</option>
                        <?php 
                        $listado_hor=$editar->lista_horas();
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
                        $listado_gru=$editar->buscar_grupos($encontro->grupos);
                        while ($row_gru=mysqli_fetch_object($listado_gru)){
                            $gru_id=$row_gru->num;
                            $gru_nombre=$row_gru->grupos;
                            ?>
                            <option value="<?php echo $gru_id; ?>"><?php echo $gru_nombre; ?></option>
                            <?php
                        }
                        ?>
                        <option value="0">------------</option>
                        <?php 
                        $listado_gru=$editar->lista_grupos();
                        while ($row_gru=mysqli_fetch_object($listado_gru)){
                            $gru_id=$row_gru->num;
                            $gru_nombre=$row_gru->grupos;
                            ?>
                            <option value="<?php echo $gru_id; ?>"><?php echo $gru_nombre; ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <input type="submit" class="button" value="ACTUALIZAR" />
                    <br>
                    <button type="button" class="button" onclick="window.location.href = 'lista_materias.php'">VOLVER</button>
                </form>

            </div>
        </center>
    </div>
</body>
</html>
