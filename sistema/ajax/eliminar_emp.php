<?php
	$conexion = mysqli_connect("localhost", "root", "", "reberzza");
	if (isset($_GET['iduser'])) {
		$iduser = $_GET['iduser'];
		
		$query = "DELETE FROM usuarios WHERE iduser = $iduser";
		$result = mysqli_query($conexion, $query);
		if (!$result) {
			die("Query failed");
		}

		echo'<script type="text/javascript">
		window.location.href="/prueba/prueba/sistema/empleados.php";</script>';
		$alert = '<div class="alert alert-success">El usuario se ha eliminado exitosamente</div>';

	}
?>