<?php
	$conexion = mysqli_connect("localhost", "root", "", "reberzza");
	$alert='';

	if (isset($_GET['id_tmp'])) {
		$id_tmp = $_GET['id_tmp'];
		$query = "DELETE FROM tmp WHERE id_tmp = $id_tmp";
		$result = mysqli_query($conexion, $query);
		if (!$result) {
			die("Query failed");
		}

		$alert = '<div class="alert alert-success">El producto se ha eliminado exitosamente</div>';
		header('location: nueva_nota.php ');
	}
?>