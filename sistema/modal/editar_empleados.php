<!DOCTYPE html>  
<html>  
 <head>  
  <title>Empleados</title>  


<!--ICONOS!-->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<!--JQUERY-->
  <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 </head>  

 <body>  

<!-----------------------------------MODAL CREAR EMPLEADO --------------------------------------------->
<div id="edit_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Modificar empleado</h4>

   </div>
   <div class="modal-body">
    <form method="POST" id="editar_emp" style="width: 400px">
      <input type="hidden" name="idusere" id="idusere">
     <label>Nombre:</label>
     <input type="text" name="nombree" id="nameedit" class="form-control" />
     <br />
     <label>Email</label>
     <input type="email" name="emaile" id="emailedit" class="form-control" />
     <br />
     <label>Tipo de Empleado:</label>
     <select name="role" id="roledit" class="form-control" required>
      <option value="2">Supervisión</option>  
      <option value="3">Finanzas</option>
      <option value="4">Vendedor</option>
     </select>
     <br/>       
     
     <input type="submit" name="edit_emp" id="edit_emp" value="Guardar" onclick="actualizarEmp();" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
   </div>

  </div>
 </div>
</div>

<!-----------------------------------------------FIN MODAL EMPLEADOS------------------------------------------->
