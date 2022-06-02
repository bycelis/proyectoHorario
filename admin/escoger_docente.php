<?php 
include ('../bd/conexion.php');
session_start();
if (!$_SESSION['usuario']) {
    header('Location: index.php');
}
if (isset($_GET['id'])){
	$materia = new basedatos();
	$id_mat=intval($_GET['id']);
}else{
	header('Location: lista_materias.php');
}
$escoger = new basedatos();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<h3>escoger docente</h3>
		</div> 
		<center>
			<?php 
			if(isset($_POST) && !empty($_POST)){
				$res = $escoger->matricular($_POST['inma_inf_id'],$_POST['inma_mat_id'],$_POST['inma_car_id']);
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
			<form method="post">
				<label>docentes:</label><br>
				<select name="inma_inf_id" id="inma_inf_id ">
					<?php 
					$listado_doc=$escoger->lista_docentes_escoger();

					while ($row_doc=mysqli_fetch_object($listado_doc)){
						$doc_id=$row_doc->id;
						$doc_nombres=$row_doc->nombres;
						$doc_apellidos=$row_doc->apellidos;
						?>
						<option value="<?php echo $doc_id; ?>"><?php echo $doc_nombres.' '.$doc_apellidos; ?></option>
						<?php
					}
					?>
				</select><br>
				<label>materia:</label><br>
				<select name="inma_mat_id" id="inma_mat_id ">
					<?php 
					$listado_mat=$escoger->buscar_materia($id_mat);

					while ($row_mat=mysqli_fetch_object($listado_mat)){
						$mat_id=$row_mat->id;
						$mat_grupo=$row_mat->grupo;
						$mat_nombre=$row_mat->materia;
						?>
						<option value="<?php echo $mat_id; ?>"><?php echo $mat_grupo." - ".$mat_nombre; ?></option>
						<?php
					}
					?>
				</select><br>
				<label>carrera:</label><br>
				<select name="inma_car_id" id="inma_car_id ">
					<?php 
					$listado_car=$escoger->lista_carrera();

					while ($row_car=mysqli_fetch_object($listado_car)){
						$car_id=$row_car->num;
						$car_nombre=$row_car->nombre;
						?>
						<option value="<?php echo $car_id; ?>"><?php echo $car_nombre; ?></option>
						<?php
					}
					?>
				</select><br>
				<div class="col-md-12 pull-right">
					<br>
					<button type="submit" class="button">ESCOGER DOCENTE</button>
				</div>
			</form>
            <br>
            <button type="button" class="button" onclick="window.location.href = 'lista_materias.php'">VOLVER</button>
		</center>
	</div>
</body>
</html>