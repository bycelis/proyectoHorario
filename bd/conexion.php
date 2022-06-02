	<?php 
	class basedatos{
	private $con;
	private $dbequipo='localhost';
	private $dbusuario='root';
	private $dbclave='';
	private $dbnombre='db-proyecto01';

	function __construct(){
	$this->conectar();
	}

	public function conectar(){
		$this->con = mysqli_connect($this->dbequipo, $this->dbusuario, $this->dbclave, $this->dbnombre);

		if(mysqli_connect_error()){
			die("Error: No se pudo conectar a la base de datos: " . mysqli_connect_error() . mysqli_connect_errno());
		}

	}

	public function limpiar_cadena($var){
		$return = mysqli_real_escape_string($this->con, $var);
		return $return;
	}

	public function iniciar_sesion($usuario){
		$sql = "SELECT usuario.usu_id , roles.rol_nombre AS role, usuario.usu_clave AS password FROM usuario INNER JOIN informacion ON usuario.usu_id = informacion.inf_usu_id INNER JOIN roles ON informacion.inf_rol_id = roles.rol_id WHERE usuario.usu_nombre = '$usuario';";
		$res = mysqli_query($this->con, $sql);

		$return = mysqli_fetch_object($res);
		return $return;
	}

	public function informacion_menu($usuario){
		$sql = "SELECT informacion.inf_id AS num,informacion.inf_nombres AS nombres, informacion.inf_apellidos AS apellidos,informacion.inf_correo AS correo,carrera.car_nombre AS carrera,tipo_documento.tido_nombre AS tipo_documento,informacion.inf_documento AS documento FROM carrera INNER JOIN informacion ON carrera.car_id = informacion.inf_car_id INNER JOIN tipo_documento ON informacion.inf_tido_id = tipo_documento.tido_id INNER JOIN usuario ON informacion.inf_usu_id = usuario.usu_id WHERE usuario.usu_nombre = '$usuario';";
		$res = mysqli_query($this->con, $sql);

		$return = mysqli_fetch_object($res);
		return $return;
	}

	public function crear_usuario($usu_nombre,$usu_clave){
		$insert = "INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_clave`) VALUES (NULL, '$usu_nombre', '$usu_clave');";
		$resultado = mysqli_query($this->con, $insert);
		if($resultado){
			return true;
		}else{
			return false;
		}
	}

	public function buscar_usuario($usu_nombre){
		$sql = "SELECT usuario.usu_nombre AS nombre FROM usuario WHERE usuario.usu_nombre = '$usu_nombre';";
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_object($res);
		return $return;

	}

	public function lista_usuario_d(){
		$sql = "SELECT usuario.usu_id AS id,usuario.usu_nombre AS usuario, MD5(usuario.usu_clave) AS clave, informacion.inf_nombres AS nombres,informacion.inf_apellidos AS apellidos FROM usuario INNER JOIN informacion ON usuario.usu_id = informacion.inf_usu_id INNER JOIN roles ON informacion.inf_rol_id = roles.rol_id WHERE roles.rol_nombre = 'DOCENTES';";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function lista_usuario_e(){
		$sql = "SELECT usuario.usu_id AS id,usuario.usu_nombre AS usuario, MD5(usuario.usu_clave) AS clave, informacion.inf_nombres AS nombres,informacion.inf_apellidos AS apellidos FROM usuario INNER JOIN informacion ON usuario.usu_id = informacion.inf_usu_id INNER JOIN roles ON informacion.inf_rol_id = roles.rol_id WHERE roles.rol_nombre = 'ESTUDIANTES';";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function lista_tipo_documento(){
		$sql = "SELECT tipo_documento.tido_id AS num, tido_nombre AS nombre FROM tipo_documento;";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}
	public function lista_usuario_buscar($usu_nomb){
		$sql = "SELECT usuario.usu_id AS num, usuario.usu_nombre AS nombre FROM usuario WHERE usuario.usu_nombre = '$usu_nomb';";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function lista_roles_buscar($rol_nomb){
		$sql = "SELECT roles.rol_id AS num, roles.rol_nombre AS nombre FROM roles WHERE roles.rol_nombre = '$rol_nomb';";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function lista_carrera(){
		$sql = "SELECT carrera.car_id AS num, carrera.car_nombre AS nombre FROM carrera;";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function eliminar_usuario($usu_id){
		$sql = "DELETE FROM usuario WHERE usuario.usu_id = '$usu_id';";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function eliminar_informacion($inf_id){
		$sql = "DELETE FROM informacion WHERE informacion.inf_usu_id = '$inf_id';";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function crear_informacion($inf_tido_id,$inf_documento,$inf_nombres,$inf_apellidos,$info_correo,$inf_usu_id,$inf_rol_id,$inf_car_id){
		$sql = "INSERT INTO `informacion` (`inf_id`, `inf_tido_id`, `inf_documento`, `inf_nombres`, `inf_apellidos`, `inf_correo`, `inf_usu_id`, `inf_rol_id`, `inf_car_id`) VALUES (NULL, '$inf_tido_id', UPPER('$inf_documento'), UPPER('$inf_nombres'), UPPER('$inf_apellidos'), UPPER('$info_correo'), '$inf_usu_id', '$inf_rol_id', '$inf_car_id')";
		$resultado = mysqli_query($this->con, $sql);
		if($resultado){
			return true;
		}else{
			return false;
		}
	}

	public function lista_materias(){
		$sql = "SELECT materia.mat_id AS id, grupos.gru_nombre AS grupo, materia.mat_codigo AS codigo, materia.mat_nombre AS materia, dias_semana.dise_nombre AS dia, salones.sal_nombre as salon, horas.hor_nombre AS hora FROM materia INNER JOIN dias_semana ON materia.mat_dise_id = dias_semana.dise_id INNER JOIN salones ON materia.mat_sal_id = salones.sal_id INNER JOIN grupos ON materia.mat_gru_id = grupos.gru_id INNER JOIN horas ON materia.mat_hor_id = horas.hor_id ORDER BY materia.mat_id;";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function lista_dias_semana(){
		$sql = "SELECT dias_semana.dise_id AS num, dias_semana.dise_nombre AS dia FROM dias_semana ORDER BY dias_semana.dise_id;";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function lista_salones(){
		$sql = "SELECT salones.sal_id AS num, salones.sal_nombre AS salon FROM salones;";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function lista_horas(){
		$sql = "SELECT horas.hor_id AS num, horas.hor_nombre AS hora FROM horas ORDER BY horas.hor_id;";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function lista_grupos(){
		$sql = "SELECT grupos.gru_id AS num, grupos.gru_nombre AS grupos FROM grupos ORDER BY grupos.gru_id;";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function crear_materia($mat_codigo,$mat_nombre,$mat_dise_id,$mat_sal_id,$mat_hor_id,$mat_gru_id){
		$sql = "INSERT INTO `materia` (`mat_id`, `mat_codigo`, `mat_nombre`, `mat_dise_id`, `mat_sal_id`, `mat_hor_id`, `mat_gru_id`) VALUES (NULL, '$mat_codigo', '$mat_nombre', '$mat_dise_id', '$mat_sal_id', '$mat_hor_id', '$mat_gru_id');";
		$result = mysqli_query($this->con, $sql);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function eliminar_materia($inf_id){
		$sql = "DELETE FROM materia WHERE materia.mat_id = '$inf_id';";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}


	public function buscar_carrera_estudiante($est_id){
		$sql = "SELECT informacion.inf_car_id AS carrera FROM informacion WHERE informacion.inf_id = '$est_id';";
		$res = mysqli_query($this->con, $sql);

		$return = mysqli_fetch_object($res);
		return $return;
	}

	public function matricular($est_id,$inma_mat_id,$car_id){
		$insert = "INSERT INTO `informacion_materia` (`inma_id`,`inma_inf_id`, `inma_mat_id`, `inma_car_id`) VALUES (null,'$est_id', '$inma_mat_id', '$car_id');";
		$resultado = mysqli_query($this->con, $insert);
		if($resultado){
			return true;
		}else{
			return false;
		}
	}
	public function lista_docentes_escoger(){
		$sql = "SELECT informacion.inf_id AS id,usuario.usu_nombre AS usuario, MD5(usuario.usu_clave) AS clave, informacion.inf_nombres AS nombres,informacion.inf_apellidos AS apellidos FROM usuario INNER JOIN informacion ON usuario.usu_id = informacion.inf_usu_id INNER JOIN roles ON informacion.inf_rol_id = roles.rol_id WHERE roles.rol_nombre = 'DOCENTES';";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function buscar_lunes($horas,$est_id){
		$sql = "SELECT materia.mat_id AS mat_id,materia.mat_codigo AS mat_codigo,materia.mat_nombre AS materia,salones.sal_nombre AS salon FROM informacion_materia INNER JOIN materia ON informacion_materia.inma_mat_id = materia.mat_id INNER JOIN salones ON materia.mat_sal_id = salones.sal_id WHERE informacion_materia.inma_inf_id='$est_id' AND materia.mat_hor_id='$horas' AND materia.mat_dise_id=1;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_martes($horas,$est_id){
		$sql = "SELECT materia.mat_id AS mat_id,materia.mat_codigo AS mat_codigo,materia.mat_nombre AS materia,salones.sal_nombre AS salon FROM informacion_materia INNER JOIN materia ON informacion_materia.inma_mat_id = materia.mat_id INNER JOIN salones ON materia.mat_sal_id = salones.sal_id WHERE informacion_materia.inma_inf_id='$est_id' AND materia.mat_hor_id='$horas' AND materia.mat_dise_id=2;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_miercoles($horas,$est_id){
		$sql = "SELECT materia.mat_id AS mat_id,materia.mat_codigo AS mat_codigo,materia.mat_nombre AS materia,salones.sal_nombre AS salon FROM informacion_materia INNER JOIN materia ON informacion_materia.inma_mat_id = materia.mat_id INNER JOIN salones ON materia.mat_sal_id = salones.sal_id WHERE informacion_materia.inma_inf_id='$est_id' AND materia.mat_hor_id='$horas' AND materia.mat_dise_id=3;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_jueves($horas,$est_id){
		$sql = "SELECT materia.mat_id AS mat_id,materia.mat_codigo AS mat_codigo,materia.mat_nombre AS materia,salones.sal_nombre AS salon FROM informacion_materia INNER JOIN materia ON informacion_materia.inma_mat_id = materia.mat_id INNER JOIN salones ON materia.mat_sal_id = salones.sal_id WHERE informacion_materia.inma_inf_id='$est_id' AND materia.mat_hor_id='$horas' AND materia.mat_dise_id=4;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_viernes($horas,$est_id){
		$sql = "SELECT materia.mat_id AS mat_id,materia.mat_codigo AS mat_codigo,materia.mat_nombre AS materia,salones.sal_nombre AS salon FROM informacion_materia INNER JOIN materia ON informacion_materia.inma_mat_id = materia.mat_id INNER JOIN salones ON materia.mat_sal_id = salones.sal_id WHERE informacion_materia.inma_inf_id='$est_id' AND materia.mat_hor_id='$horas' AND materia.mat_dise_id=5;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_sabado($horas,$est_id){
		$sql = "SELECT materia.mat_id AS mat_id,materia.mat_codigo AS mat_codigo,materia.mat_nombre AS materia,salones.sal_nombre AS salon FROM informacion_materia INNER JOIN materia ON informacion_materia.inma_mat_id = materia.mat_id INNER JOIN salones ON materia.mat_sal_id = salones.sal_id WHERE informacion_materia.inma_inf_id='$est_id' AND materia.mat_hor_id='$horas' AND materia.mat_dise_id=6;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_domingo($horas,$est_id){
		$sql = "SELECT materia.mat_id AS mat_id,materia.mat_codigo AS mat_codigo,materia.mat_nombre AS materia,salones.sal_nombre AS salon FROM informacion_materia INNER JOIN materia ON informacion_materia.inma_mat_id = materia.mat_id INNER JOIN salones ON materia.mat_sal_id = salones.sal_id WHERE informacion_materia.inma_inf_id='$est_id' AND materia.mat_hor_id='$horas' AND materia.mat_dise_id=7;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_doc($mat_id){
		$sql = "SELECT CONCAT(informacion.inf_nombres,' ',informacion.inf_apellidos) AS nombre_docente FROM informacion_materia INNER JOIN materia ON informacion_materia.inma_mat_id = materia.mat_id INNER JOIN informacion ON informacion_materia.inma_inf_id = informacion.inf_id WHERE materia.mat_id= '$mat_id' AND informacion.inf_rol_id = 2;";
		$res = mysqli_query($this->con, $sql);

		$return = mysqli_fetch_object($res);
		return $return;
	}

	public function lista_estudiantes(){
		$sql = "SELECT informacion.inf_id AS num,informacion.inf_nombres AS nombres,informacion.inf_apellidos AS apellidos,carrera.car_nombre AS carrera FROM informacion INNER JOIN roles ON informacion.inf_rol_id = roles.rol_id INNER JOIN carrera ON informacion.inf_car_id = carrera.car_id where roles.rol_nombre = 'ESTUDIANTES';";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function lista_docentes(){
		$sql = "SELECT informacion.inf_id AS num,informacion.inf_nombres AS nombres,informacion.inf_apellidos AS apellidos,carrera.car_nombre AS carrera FROM informacion INNER JOIN roles ON informacion.inf_rol_id = roles.rol_id INNER JOIN carrera ON informacion.inf_car_id = carrera.car_id where roles.rol_nombre = 'DOCENTES';";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_docentes($buscar){
		$sql = "SELECT informacion.inf_id AS num,informacion.inf_nombres AS nombres,informacion.inf_apellidos AS apellidos,carrera.car_nombre AS carrera FROM informacion INNER JOIN roles ON informacion.inf_rol_id = roles.rol_id INNER JOIN carrera ON informacion.inf_car_id = carrera.car_id where roles.rol_nombre = 'DOCENTES' AND (informacion.inf_nombres LIKE UPPER('$buscar%') OR informacion.inf_nombres LIKE UPPER('%$buscar%') OR informacion.inf_nombres LIKE UPPER('%$buscar') OR informacion.inf_apellidos LIKE UPPER('$buscar%') OR informacion.inf_apellidos LIKE UPPER('%$buscar%') OR informacion.inf_apellidos LIKE UPPER('%$buscar')) ORDER BY informacion.inf_id;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_estudiantes($buscar){
		$sql = "SELECT informacion.inf_id AS num,informacion.inf_nombres AS nombres,informacion.inf_apellidos AS apellidos,carrera.car_nombre AS carrera FROM informacion INNER JOIN roles ON informacion.inf_rol_id = roles.rol_id INNER JOIN carrera ON informacion.inf_car_id = carrera.car_id where roles.rol_nombre = 'ESTUDIANTES' AND (informacion.inf_nombres LIKE UPPER('$buscar%') OR informacion.inf_nombres LIKE UPPER('%$buscar%') OR informacion.inf_nombres LIKE UPPER('%$buscar') OR informacion.inf_apellidos LIKE UPPER('$buscar%') OR informacion.inf_apellidos LIKE UPPER('%$buscar%') OR informacion.inf_apellidos LIKE UPPER('%$buscar')) ORDER BY informacion.inf_id;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_materias($buscar){
		$sql = "SELECT materia.mat_id AS id, grupos.gru_nombre AS grupo, materia.mat_codigo AS codigo, materia.mat_nombre AS materia, dias_semana.dise_nombre AS dia, salones.sal_nombre as salon, horas.hor_nombre AS hora FROM materia INNER JOIN dias_semana ON materia.mat_dise_id = dias_semana.dise_id INNER JOIN salones ON materia.mat_sal_id = salones.sal_id INNER JOIN grupos ON materia.mat_gru_id = grupos.gru_id INNER JOIN horas ON materia.mat_hor_id = horas.hor_id WHERE materia.mat_nombre LIKE UPPER('$buscar%') OR materia.mat_nombre LIKE UPPER('%$buscar%') OR materia.mat_nombre LIKE UPPER('%$buscar') OR grupos.gru_nombre LIKE UPPER('$buscar%') OR grupos.gru_nombre LIKE UPPER('%$buscar%') OR grupos.gru_nombre LIKE UPPER('$buscar%') OR materia.mat_codigo LIKE UPPER('$buscar%') OR materia.mat_codigo LIKE UPPER('%$buscar%') OR materia.mat_codigo LIKE UPPER('$buscar%') ORDER BY materia.mat_id;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_materia($buscar){
		$sql = "SELECT materia.mat_id AS id, grupos.gru_nombre AS grupo, materia.mat_nombre AS materia FROM materia INNER JOIN grupos ON materia.mat_gru_id = grupos.gru_id WHERE materia.mat_id = '$buscar';";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_profesor($buscar){
		$sql = "SELECT CONCAT(informacion.inf_nombres, ' ',informacion.inf_apellidos) AS nombre_completo FROM informacion WHERE informacion.inf_id = '$buscar';";
		$res = mysqli_query($this->con, $sql);

		$return = mysqli_fetch_object($res);
		return $return;
	}

	public function buscar_estudiante($buscar){
		$sql = "SELECT CONCAT(informacion.inf_nombres, ' ',informacion.inf_apellidos) AS nombre_completo FROM informacion WHERE informacion.inf_id = '$buscar';";
		$res = mysqli_query($this->con, $sql);

		$return = mysqli_fetch_object($res);
		return $return;
	}

	public function lista_materias_d($buscar){
		$sql = "SELECT materia.mat_id AS id, grupos.gru_nombre AS grupo, materia.mat_codigo AS codigo, materia.mat_nombre AS materia, dias_semana.dise_nombre AS dia, salones.sal_nombre as salon, horas.hor_nombre AS hora FROM materia INNER JOIN dias_semana ON materia.mat_dise_id = dias_semana.dise_id INNER JOIN salones ON materia.mat_sal_id = salones.sal_id INNER JOIN grupos ON materia.mat_gru_id = grupos.gru_id INNER JOIN horas ON materia.mat_hor_id = horas.hor_id INNER JOIN informacion_materia ON materia.mat_id = informacion_materia.inma_mat_id WHERE informacion_materia.inma_inf_id = '$buscar' ORDER BY materia.mat_id;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function lista_estudiantes_d($inma_mat_id,$inma_inf_id){
		$sql = "SELECT informacion.inf_nombres AS nombres,informacion.inf_apellidos AS apellidos FROM informacion INNER JOIN informacion_materia ON informacion_materia.inma_inf_id = informacion.inf_id WHERE informacion_materia.inma_mat_id = '$inma_mat_id' AND (NOT informacion_materia.inma_inf_id = '$inma_inf_id') ORDER BY informacion.inf_apellidos;";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function seleccionar_usuario_d($id){
		$sql = "SELECT usuario.usu_id AS id_usu,usuario.usu_nombre AS usuario, usuario.usu_clave AS clave, informacion.inf_id AS id_inf,informacion.inf_tido_id AS tipo_documento,informacion.inf_documento AS documento, informacion.inf_nombres AS nombres,informacion.inf_apellidos AS apellidos, informacion.inf_correo AS email, informacion.inf_car_id AS carrera FROM usuario INNER JOIN informacion ON informacion.inf_usu_id = usuario.usu_id where informacion.inf_usu_id='$id';";
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_object($res);
		return $return;
	}

	public function buscar_tipo_documento($id){
		$sql = "SELECT tipo_documento.tido_id AS num, tipo_documento.tido_nombre AS nombre FROM tipo_documento WHERE tipo_documento.tido_id = '$id';";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function buscar_carrera($id){
		$sql = "SELECT carrera.car_id AS num, carrera.car_nombre AS nombre FROM carrera WHERE carrera.car_id = '$id';";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function actualizar_usuario($usu_nombre,$usu_clave,$inf_tido_id,$inf_documento,$inf_nombres,$inf_apellidos,$inf_correo,$inf_car_id,$id){

		$sql = "UPDATE `usuario` SET `usu_nombre` = '$usu_nombre', `usu_clave` = '$usu_clave' WHERE `usuario`.`usu_id` = '$id';";
		$res = mysqli_query($this->con, $sql);
		if($res){
			$UPDATE = "UPDATE `informacion` SET `inf_tido_id` = '$inf_tido_id', `inf_documento` = UPPER('$inf_documento'), `inf_nombres` = UPPER('$inf_nombres'), `inf_apellidos` = UPPER('$inf_apellidos'), `inf_correo` = UPPER('$inf_correo'), `inf_car_id` = '$inf_car_id' WHERE `informacion`.`inf_usu_id` = '$id';";
			$result = mysqli_query($this->con, $UPDATE);
			if($result){
				return true;
			}
		}else{
			return false;
		}
	}

	public function buscar_materia_edit($id){
		$sql = "SELECT materia.mat_id AS id, materia.mat_codigo AS codigo, materia.mat_nombre AS nombre, materia.mat_dise_id AS dias_semana,materia.mat_sal_id AS salon, materia.mat_hor_id AS hora, materia.mat_gru_id AS grupos FROM materia WHERE materia.mat_id = '$id';";
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_object($res);
		return $return;
	}

	public function buscar_dias_semana_edit($id){
		$sql = "SELECT dias_semana.dise_id AS id, dias_semana.dise_nombre AS dia FROM dias_semana WHERE dias_semana.dise_id = '$id';";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}
	public function buscar_salones($id){
		$sql = "SELECT salones.sal_id AS num, salones.sal_nombre AS salon FROM salones WHERE salones.sal_id = '$id';";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function buscar_horas($id){
		$sql = "SELECT horas.hor_id AS num, horas.hor_nombre AS hora FROM horas WHERE horas.hor_id = '$id';";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function buscar_grupos($id){
		$sql = "SELECT grupos.gru_id AS num, grupos.gru_nombre AS grupos FROM grupos WHERE grupos.gru_id = '$id';";
		$res = mysqli_query($this->con, $sql);
		return $res;

	}

	public function actualizar_materia($mat_codigo,$mat_nombre,$mat_dise_id,$mat_sal_id,$mat_hor_id,$mat_gru_id,$id){

		$sql = "UPDATE `materia` SET `mat_codigo` = UPPER('$mat_codigo'), `mat_nombre` = UPPER('$mat_nombre'), `mat_dise_id` = '$mat_dise_id', `mat_sal_id` = '$mat_sal_id', `mat_hor_id` = '$mat_hor_id', `mat_gru_id` = '$mat_gru_id' WHERE `materia`.`mat_id` = '$id';";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	}//fin clase
	?>