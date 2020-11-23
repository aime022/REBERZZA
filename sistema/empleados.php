<?php 
session_start();

if ( $_SESSION['rol'] !=4)
{
  include 'menu.php';
}

if ( $_SESSION['rol'] == 4)
{
  include 'menuv.php';
}

?>


<?php  
//index.php
$conexion = mysqli_connect("localhost", "root", "", "reberzza");
$query = "SELECT u.iduser, u.nombre, u.email, r.rol FROM usuarios u INNER JOIN roles r ON u.rol = r.idrol";
$result = mysqli_query($conexion, $query);
 ?>

<link rel="stylesheet" type="text/css" href="estilo.css">
<link rel="stylesheet" type="text/css" href="normalize.css">
 <script src="js/alertify.min.js"></script>

<!--------------------------------------------TABLA DE EMPLEADOS ---------------------------------------------->
<?php include 'modal/insertar_empleados.php'; ?>
<?php include 'modal/editar_empleados.php'; ?>


<div class="content" >
  <br>
<div style="width: 900px; margin-top: 80px">

  <div style="width: 900px; margin-top: 80px">

  <div class="panel-group" >
    <div class="panel panel-default" style="border:1px black solid; border-radius: 3px">
      <div class="panel-heading" style="background-color: black; color: white;  padding: 12px; ">
      </div>
      <div class="panel-body" align="center" style="padding: 10px">
        <label>Buscar:</label>
        <input type="text" name="" style="width: 50%">   
      </div>
    </div>
    <br>
   
      <button style="margin-left: 78%" type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="fas fa-user-plus"></i>&nbsp; Registrar Empleado</button>
      </div>
   
        <br>
        <?php echo isset($alert)? $alert : ''; ?>
  
  <table class="table" style="text-align: center;" id="empleados">
    <thead style="background-color: black; color: white; ">
    <tr >
      <th scope="col" style="border-radius: 5px; padding: 4px">No.</th>
      <th style="padding: 4px; border:1px white solid; border-radius: 5px;">Nombre</th>
      <th style="padding: 4px; border:1px white solid; border-radius: 5px;">Correo</th>
      <th style="padding: 4px; border:1px white solid; border-radius: 5px;">Rol</th>
      <th style="padding: 4px; border:1px white solid; border-radius: 5px;">Acciones</th>
    </tr>
    </thead>

    <?php 

    //PAGINADOR 
      $sql_emp=mysqli_query($conexion, "SELECT COUNT(*) AS total_emp FROM usuarios");
      $result_emp=mysqli_fetch_array($sql_emp);
      $total_emp=$result_emp['total_emp'];

      $por_pag= 15;

      if (empty($_GET['pagina'])) {
        $pagina = 1;
      }else{
        $pagina=$_GET['pagina'];
      }

      $desde=($pagina-1) * $por_pag;
      $total_pag=ceil($total_emp/$por_pag);


      $query = mysqli_query($conexion, "SELECT u.iduser, u.nombre, u.email, r.rol, r.idrol FROM usuarios u INNER JOIN roles r ON u.rol = r.idrol ORDER BY u.iduser LIMIT $desde,$por_pag");
      $result = mysqli_num_rows($query);

      if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {  

          $datos=$data[0]."||"
                .$data[1]."||"
                .$data[2]."||"
                .$data[3]."||"
                .$data[4];


    ?>
    

    <tbody>
    <tr>
      <td><?php echo $data[0] ?></td>
      <td><?php echo $data[1] ?></td>
      <td><?php echo $data[2] ?></td>
      <td><?php echo $data[3] ?></td>
      <input type="hidden" name="" id="idrole" value="<?php echo $data[4] ?>">
    <td>
      
      <a href="#" class='btn btn-outline-warning' id="link_edit" data-toggle="modal" data-target="#edit_data_Modal" onclick="muestraEdit('<?php echo $datos ?>')" id="editar" style="padding: 6px;"><i class="fas fa-user-edit"></i></a>
      <a class="btn btn-outline-danger link_delete" data-toggle="modal" data-target="#ModalEliminar" style="padding: 6px;"><i class="fas fa-user-minus"></i></a>
    </td>
  </tr>


  <?php  

        }
      }
  ?>
  </tbody>
  </table>

  </div>
</div>

   
<br>
<!----------------PAGINADOR-------------------->
<nav style="width: 200px; margin-left:68%;">
  <ul class="pagination">
    <?php 
    if ($pagina !=1) {  
    ?>
    <li class="page-item">
      <a class="page-link" href="?pagina=<?php echo $pagina-1; ?>">Previous</a>
    </li>
    <?php 
      }
      for ($i=1; $i<$total_pag; $i++){
        if ($i==$pagina) 
        {
          echo '<li class="page-item"><a class="page-link pageSel">'.$i.'</a></li>';
        }else{
          echo '<li class="page-item"><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';
        }
      }
       if ($pagina!= $total_pag)
             echo '<liclass="page-item"><a class="page-link" href="?pagina='.($pagina+1).'">Next</a></li>';
      ?>
  </ul>
</nav>


<!-------------FIN PAGINADOR------------------>
</div>





<!--------------------------------------------FIN TABLA EMPLEADOS---------------------------------------------->



<!----------------------------------------- Modal Eliminar-------------------------------------------------------------------->

      <?php 

              $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE iduser=iduser");
              $result = mysqli_num_rows($query);

              if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {

              
            ?>
    <div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <input type="text" name="iduser" value="<?php echo $data[0] ?>">
          <div class="modal-header" style="margin-left: 40px">
            <h5 class="modal-title" id="exampleModalLabel" ><i class="fas fa-trash-alt" style="margin-right: 10px"></i>Eliminar</h5>
            <button style="margin-left: 250px" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="margin-left: 50px">
            ¿Desea eliminar este empleado?
          </div>
          <div class="modal-footer" style="margin-left: 50%">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
           <a class="btn btn-primary" href="ajax/eliminar_emp.php?iduser=<?php echo $data[0]; ?>">Confirmar</a>
           <?php  
          
                }
              }
          ?>
          </div>
        </div>
      </div>
    </div>
<!------------------------------------- Fin Eliminar----------------------------------------------------------------->









<script type="text/javascript"> // INSERTAR EMPLEADOS
    $(document).ready(function(){
    $('#insert_emp').click(function(){

      var datos=$('#add_emp').serialize();

      $.ajax({
        type:"POST",
        url:"ajax/insertar_emp.php",
        data: datos,
        success: function(r){

        }
      });
    });
  });


  function muestraEdit (datos) {  //LLENAR MODAL EDITAR EMPLEADOS
  console.log(datos)
  d=datos.split('||');
  
  $('#idusere').val(d[0]);
  $('#nameedit').val(d[1]);
  $('#emailedit').val(d[2]);
  $('#roledit').val(d[4]);

}

function actualizarEmp(){  //ACTUALIZAR DATOS DE MODAL
  var datos=$('#editar_emp').serialize();
  console.log(datos)

      $.ajax({
        type:"POST",
        url:"ajax/editar_emp.php",
        data: datos,
        success: function(e){
          console.log(e)
          if (e) {
            alert("registro");
           } else{
              alert("fallo");
            }
          }
      });

      e.preventDefault();
    }

</script>

