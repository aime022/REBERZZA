<?php 
	$conexion=mysqli_connect('localhost','root','','reberzza');
	if (!empty($_POST)) {
				
		$alert='';

		$id_tmp = $_POST['id_tmp'];
		$cantidad_tmp = $_POST['cantidad_tmp'];
		$descripcion_tmp = $_POST['descripcion_tmp'];
		$precio_tmp = $_POST['precio_tmp'];
		$importe_tmp = $_POST['importe_tmp'];
		$session_id=$_POST['session_id'];
															
		$query_insert = mysqli_query($conexion, "INSERT INTO tmp(id_tmp,cantidad_tmp,descripcion_tmp,precio_tmp,importe_tmp,session_id) VALUES ('$id_tmp','$cantidad_tmp','$descripcion_tmp','$precio_tmp','$importe_tmp','$session_id')");
																
			if ($query_insert) {
					$alert = '<div class="alert alert-success">El producto se a agregado exitosamente</div>';
			}else{
					$alert = '<div class="alert alert-danger">Ha ocurrido un error al intentar agregar el producto</div>';
			}
		}
?>