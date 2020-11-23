<?php 
  session_start(); 
  if (empty($_SESSION['active'])) //Si no existe sesión iniciada, regresar al login
  {
    header('location: ../');
  }  
?>

  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header style="height: 80px; margin: 0; padding:0; background-color:white; background: linear-gradient(to top, #D9D9D9, white 90%);" class="flex-container" >
      <div class="left_area" style="width: 250px; margin: 0; padding: 0" >
          <img src="img/LOGORB.png" style="width:70%; margin-top: 10px;  margin-left:30px; " alt="LOGORB"/>
      </div>
       <label for="check" style="margin: auto;">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="right_area flex-container" style="text-align: right; margin: auto; margin-left: 60%" >
       <div style="width: 90%; width: 200px; margin: 0;">
        <span style="font-size: 12px; color: black; margin-right:20px; margin-left: 75%"><?php echo $_SESSION['nombre']; ?></span>
        </div>
        <a href="salir.php" style="margin-right: 20px; margin-left:3%"><i class="fas fa-power-off" style="color: black"></i></a>
      
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="#"><i class="fas fa-desktop"></i><span>Home</span></a>
         <a href="#"><i class="fas fa-cogs"></i><span>Ventas</span></a>
         <a href="#"><i class="fas fa-users"></i><span>Empleados</span></a>
       </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar" style="top:80px">

      <a href="index.php"><i class="fas fa-desktop"></i><span>Home</span></a>
      <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-tags"></i><span>Ventas</span></a>
      <div class="collapse" id="collapseExample">
      <ul>
        <li><a class="sub" href="nueva_nota.php"><i class="fab fa-wpforms"></i><span>Crear Nota</span></a></li>
        <li><a class="sub" href="notas.php"><i class="fas fa-file-alt"></i><span>Notas</span></a></li>
      </ul>
      </div>
      <a href="empleados.php"><i class="fas fa-users"></i><span>Empleados</span></a>
      </div>
    <!--sidebar end-->

    
  </body>
