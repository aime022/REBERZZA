<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reberzza";
(!empty($_POST))
{
	$id = $_POST['id'];
}
mysql_connect($servername,$username,$password);

//selección de la base de datos con la que vamos a trabajar 
mysql_select_db($dbname); 
//Creamos la sentencia SQL y la ejecutamos
$sSQL="UPDATE notes  SET eliminado=1 WHERE id='$id '";
mysql_query($sSQL);
?>