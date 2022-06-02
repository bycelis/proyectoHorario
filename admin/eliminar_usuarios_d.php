<?php 
if (isset($_GET['id'])){
	include ('../bd/conexion.php');
	$categoria = new basedatos();
	$id=intval($_GET['id']);
	$categoria->eliminar_informacion($id);
	$res = $categoria->eliminar_usuario($id);
	if($res){
		echo'<script type="text/javascript">
    	alert("Registro  eliminado correctamente");
   		window.location.href="lista_usuarios_d.php";
    	</script>';


	}else{
		echo "Error al eliminar el registro de la usuario";
	}
}
?>