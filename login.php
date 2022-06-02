<?php 
include ('bd/conexion.php');
$login = new basedatos();
if(isset($_POST) && !empty($_POST)){
	$usuario = $login->limpiar_cadena($_POST['usuario']);
	$password = $login->limpiar_cadena($_POST['passwordd']);
	if (isset($_POST['passwordd'])) {
		header('Location: index.php');
	}
	if (isset($_POST['usuario'])) {
		header('Location: index.php');
	}
	$res=$login-> iniciar_sesion($usuario);
	
	session_start();

	if ($res->password == $password) {
		if ($res->role == 'ADMIN') {
			$_SESSION['user_id'] = $res->usu_id;
			$_SESSION['role'] = $res->role;
			$_SESSION['usuario'] = $usuario;
			header('Location: admin/admin.php');
		} else {
			if ($res->role == 'ESTUDIANTES') {
				$_SESSION['user_id'] = $res->usu_id;
				$_SESSION['role'] = $res->role;
				$_SESSION['usuario'] = $usuario;
				header('Location: estudiante/estudiantes.php');
			} else {
				if ($res->role == 'DOCENTES') {
					$_SESSION['user_id'] = $res->usu_id;
					$_SESSION['role'] = $res->role;
					$_SESSION['usuario'] = $usuario;
					header('Location: docente/docentes.php');
				}
			}
			
		}
		
	} else {
		session_destroy();
		header('Location: index.php');
	}
}

?>