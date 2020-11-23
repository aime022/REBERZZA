

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reberzza";
$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}if(!empty($_POST))
{
	$idusere = $_POST['idusere'];
	$nombre = $_POST['nombree'];
	$email = $_POST['emaile'];
	$role = $_POST['role'];
}

 $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', rol='$role' WHERE iduser='$idusere'";

 if ($link->query($sql) === TRUE) {
  echo "OK";      
 }else {
  echo "ERROR";
 }
 mysqli_close($link);
?>