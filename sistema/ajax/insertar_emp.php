<?php 

	$conexion = mysqli_connect("localhost", "root", "", "reberzza");
	if(!empty($_POST))
	{

		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$rol = $_POST['rol'];

		$query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email'" );
		$result = mysqli_fetch_array($query);

		if ($result > 0) {
			$alert = '<div class="alert alert-danger">El usuario ya esta existe!</div>';
		}else{
			$query_insert = mysqli_query($conexion, "INSERT INTO usuarios(nombre,email,password,rol) VALUES ('$nombre','$email','$password','$rol')");

		}
	}
?>