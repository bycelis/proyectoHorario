<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
$usuario = $_SESSION['usuario'];
$horas = new basedatos();
$est_id=intval($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" >
    <title>ADMIN</title>
</head>
<body>
    <div class="section" id="header">

    </div>
    <div class="section">
        <nav class="menu">
            <a href="estudiantes.php">Home</a>
            <a href="horario_e.php?id=<?php echo $id;?>">Horario</a>
            <a href="../salir.php">Salir</a>
            <div class="animation start-home"></div>
        </nav>
    </div>

    <div class="section">
        <?php 
            $nombre = new basedatos();
            $nombrecompleto=$nombre->buscar_estudiante($est_id);
         ?>
        <div class="table-title">
            <div class="row">
                <h1>Horario del  <b>Estudiante: <br> <?php echo $nombrecompleto->nombre_completo; ?> </b></h1>
            </div> 
        </div>
        <table class="tablahi">
            <thead>
                <tr>
                    <th width="12.5%">#</th>
                    <?php 
                    $result = $horas->lista_dias_semana();

                    while ($row=mysqli_fetch_object($result)) {
                        $id = $row->num;
                        $dia = $row->dia;
                        ?>
                        <th width="12.5%"><?php echo $dia; ?></th>
                        <?php 
                    }
                    ?>
                </tr>
            </thead>
            <tbody>    
                <?php 
                $result = $horas->lista_horas();

                while ($row=mysqli_fetch_object($result)) {
                    $hor_id = $row->num;
                    $hora = $row->hora;
                    ?>
                    <tr>
                        <td><?php echo $hora; ?></td>
                        <td>
                            <?php 
                            $res_lun=$horas->buscar_lunes($hor_id,$est_id);
                            while ($row_lun=mysqli_fetch_object($res_lun)){
                                $mat_codigo_lun=$row_lun->mat_codigo;
                                $materia_lun=$row_lun->materia;
                                $salon_lun=$row_lun->salon;
                                $mat_id=$row_lun->mat_id;
                                $nombre_doc=$horas->buscar_doc($mat_id);
                                ?>
                                <?php echo $mat_codigo_lun; ?><br>
                                <?php echo $materia_lun; ?><br>
                                <?php echo $salon_lun; ?><br><br>
                                <?php echo $nombre_doc->nombre_docente; ?><br>
                                <?php 
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $res_lun=$horas->buscar_martes($hor_id,$est_id);
                            while ($row_lun=mysqli_fetch_object($res_lun)){
                                $mat_codigo_lun=$row_lun->mat_codigo;
                                $materia_lun=$row_lun->materia;
                                $salon_lun=$row_lun->salon;
                                $mat_id=$row_lun->mat_id;
                                $nombre_doc=$horas->buscar_doc($mat_id);
                                ?>
                                <?php echo $mat_codigo_lun; ?><br>
                                <?php echo $materia_lun; ?><br>
                                <?php echo $salon_lun; ?><br><br>
                                <?php echo $nombre_doc->nombre_docente; ?><br>
                                <?php 
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $res_lun=$horas->buscar_miercoles($hor_id,$est_id);
                            while ($row_lun=mysqli_fetch_object($res_lun)){
                                $mat_codigo_lun=$row_lun->mat_codigo;
                                $materia_lun=$row_lun->materia;
                                $salon_lun=$row_lun->salon;
                                $mat_id=$row_lun->mat_id;
                                $nombre_doc=$horas->buscar_doc($mat_id);
                                ?>
                                <?php echo $mat_codigo_lun; ?><br>
                                <?php echo $materia_lun; ?><br>
                                <?php echo $salon_lun; ?><br><br>
                                <?php echo $nombre_doc->nombre_docente; ?><br>
                                <?php 
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $res_lun=$horas->buscar_jueves($hor_id,$est_id);
                            while ($row_lun=mysqli_fetch_object($res_lun)){
                                $mat_codigo_lun=$row_lun->mat_codigo;
                                $materia_lun=$row_lun->materia;
                                $salon_lun=$row_lun->salon;
                                $mat_id=$row_lun->mat_id;
                                $nombre_doc=$horas->buscar_doc($mat_id);
                                ?>
                                <?php echo $mat_codigo_lun; ?><br>
                                <?php echo $materia_lun; ?><br>
                                <?php echo $salon_lun; ?><br><br>
                                <?php echo $nombre_doc->nombre_docente; ?><br>
                                <?php 
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $res_lun=$horas->buscar_viernes($hor_id,$est_id);
                            while ($row_lun=mysqli_fetch_object($res_lun)){
                                $mat_codigo_lun=$row_lun->mat_codigo;
                                $materia_lun=$row_lun->materia;
                                $salon_lun=$row_lun->salon;
                                $mat_id=$row_lun->mat_id;
                                $nombre_doc=$horas->buscar_doc($mat_id);
                                ?>
                                <?php echo $mat_codigo_lun; ?><br>
                                <?php echo $materia_lun; ?><br>
                                <?php echo $salon_lun; ?><br><br>
                                <?php echo $nombre_doc->nombre_docente; ?><br>
                                <?php 
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $res_lun=$horas->buscar_sabado($hor_id,$est_id);
                            while ($row_lun=mysqli_fetch_object($res_lun)){
                                $mat_codigo_lun=$row_lun->mat_codigo;
                                $materia_lun=$row_lun->materia;
                                $salon_lun=$row_lun->salon;
                                $mat_id=$row_lun->mat_id;
                                $nombre_doc=$horas->buscar_doc($mat_id);
                                ?>
                                <?php echo $mat_codigo_lun; ?><br>
                                <?php echo $materia_lun; ?><br>
                                <?php echo $salon_lun; ?><br><br>
                                <?php echo $nombre_doc->nombre_docente; ?><br>
                                <?php 
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $res_lun=$horas->buscar_domingo($hor_id,$est_id);
                            while ($row_lun=mysqli_fetch_object($res_lun)){
                                $mat_codigo_lun=$row_lun->mat_codigo;
                                $materia_lun=$row_lun->materia;
                                $salon_lun=$row_lun->salon;
                                $mat_id=$row_lun->mat_id;
                                $nombre_doc=$horas->buscar_doc($mat_id);
                                ?>
                                <?php echo $mat_codigo_lun; ?><br>
                                <?php echo $materia_lun; ?><br>
                                <?php echo $salon_lun; ?><br><br>
                                <?php echo $nombre_doc->nombre_docente; ?><br>
                                <?php 
                            }
                            ?>
                        </td>
                    </tr>
                    <?php 
                }
                ?>   
            </tbody>
        </table>
        <br>
    </div>
</body>
</html>
