<?php 
if (isset($_GET['id'])){
	include ('../bd/conexion.php');
	$materia = new basedatos();
	$id=intval($_GET['id']);
	$res = $materia->eliminar_materia($id);
	if($res){
	
		echo'<script type="text/javascript">
    	alert("Registro  eliminado correctamente");
   		window.location.href="lista_materias.php";
    	</script>';


	}else{
		echo "Error al eliminar la materia";
	}
}
?>