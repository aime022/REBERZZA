<?php 

$alert= '';
session_start(); //Iniciar sesión
if (!empty($_SESSION['active']))  //Si existe la sesión
{
    header('location: sistema/');
}else{
  if (!empty($_POST)) {   //Si existe click en ingresar

    if (empty($_POST['email']) || empty($_POST['password']))  //Si no están vacío los campos email y contraseña, imprimir alert
    {
      $alert = 'Ingrese un email y contraseña';
    }else{                  //Si no esta vacio conectar a la base de datos

       require_once "conexion.php"; //Base de datos(conexión)

       $email = mysqli_real_escape_string($conexion,$_POST['email']); 
       $pass = md5(mysqli_real_escape_string($conexion,$_POST['password'])); //md5 para encriptar contraseña
       $alert =$pass;

       $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE email='$email' AND password = '$pass'"); //Hacer la consulta
       $result = mysqli_num_rows($query); //Guardar los resultados en la variable result

       if($result > 0) //Si encuentra un usuario registrado
       { 
            $data = mysqli_fetch_array($query); //Array con datos de la consulta query
         
            $_SESSION['active']=true;
            $_SESSION['iduser']=$data['iduser'];
            $_SESSION['nombre']=$data['nombre'];
            $_SESSION['email']=$data['email'];
            $_SESSION['rol']=$data['rol'];

            header('location: sistema/'); //Redireccionar a la carpeta sistema
       }else{     //Si el usuario y/o contraseña son incorrectas, imprimir alert y destruir la sesión.
            $alert =$pass;
            session_destroy();
       }

    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>REBERZZA</title>

	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="estilo.css">
  <link rel="shortcut icon" href="favicon.ico" />


<!--ICONOS!-->
	<link rel="icon" href="img/favicon.ico"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<!--JQUERY-->
	<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body>
<div class="main">
       
<div class="container">
    <center>
    <div class="middle">
       <div id="login" >
          
    <form method="post" style="width:300px">
        <fieldset class="clearfix">

    <p><span class="fa fa-user" style="color:white" ></span><input type="email" value="" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus></p>
    <p style="margin-bottom:0"><span class="fa fa-lock" style="color:white"></span><input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required></p>


    <?php echo isset($alert)? $alert : ''; ?>


    <div style="text-align:left">
      
    </div>
    <div style="text-align:right; margin-top:5%">

  
    <span><input class="btn-sesion" type="submit" value="Iniciar Sesión"></input></span>
    </div>  
    </fieldset>
    <div class="clearfix"></div>       
</form>

<div class="clearfix"></div>

</div> <!-- end login -->
    <div class="logo" style="text-align:center; margin:auto"><img src="img/LOGORB.png" style="width:140%; margin:auto; margin-left:20px" alt="LOGORB"/>
          
        <div class="clearfix"></div>
    </div>
        </div>

        </center>
    </div>
</div>


	</body>
</html>