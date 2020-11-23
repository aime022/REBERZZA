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



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nota</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<script src="https://unpkg.com/vue/dist/vue.min.js"></script>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>



</head>
<body>

<div class="content" id ="app"><br>
		<section style="width: 1000px; margin-top: 80px;">
	<?php

    if(!isset($_SESSION['ventas'])) 
    { 
      
    include "../conexion.php";

		if (!empty($_POST['save-nota'])) {
			$alertnota='';
	


				//TABLA DET_VENTA
				$cliente = $_POST['cliente'];
				$direccion = ($_POST['direccion']);
				$telefono = $_POST['telefono'];
				$cp = $_POST['cp'];
				$vendedor =  $_SESSION['nombre'];
				$tipo_pago = $_POST['tipo_pago'];
				$tipo_envio = $_POST['tipo_envio'];
				$cuenta = $_POST['cuenta'];
				$subtotal= $_POST['subtotal'];
				$envio =  $_POST['envio'];
				$redex = $_POST['redex'];
				$total = $_POST['total'];
				$status_fin=$_POST['finanzas'];
				$status_sup=$_POST['supervicion'];
				$observaciones=$_POST['observaciones'];
				$items=$_POST['item'];
          
				

				$insert = "INSERT INTO notes (cliente,direccion,telefono,cp,vendedor,tipo_pago,cuenta,subtotal,envio,redex,total,status_fin ,status_sup,observaciones,fecha,items) VALUES ('$cliente','$direccion','$telefono','$cp','$vendedor','$tipo_pago','$cuenta','$subtotal','$envio','$redex','$total','$status_fin','$status_sup','$observaciones',NOW(),'$items')";

					if (mysqli_multi_query($conexion,$insert) === TRUE)
				{
				
				// header('Location: http://localhost/agenda.php');
				echo "<h5>" . " La nota  ha sido guardado con éxito" . "</h5>";
				}
				
				else {
				echo "Error " . $insert . "<br>" . $conexion->error; 
					}
				
				mysqli_close($conexion);

			}
		
?>

			 <?php echo isset($alertnota)? $alertnota : ''; ?>

		<form method="post" id="nota" >
			<div class="flex-container">
			<div>
				<h1><img src="img/LOGORB.png" width="40%"></h1>
			</div>
			</div>
			<br>
            
			<div class="datos_cliente">
				<h5>Datos del Cliente</h5>
			</div>
			

			<div style="border: 1px black solid; border-radius: 5px; padding:20px; background-color: #e8eaed">
				<label for="cliente">Nombre:</label>
				<input type="text" name="cliente" v-model ="datos.cliente" style="display: inline-block; width: 91.5%" required>

				<label for="direccion">Dirección:</label>
				<input type="text" name="direccion" v-model ="datos.direccion"  style="display:inline-block; width: 47%; margin-right: 15px" required>

				<label for="telefono">Telefono:</label>
				<input type="tel" name="telefono"  v-model ="datos.telefono"  style="display:inline-block; width: 20%; margin-right: 15px" required>

				<label for="cp">C.P.:</label>
				<input type="number" name="cp" v-model ="datos.cp"   style="width: 10%; margin-right: 0" required>
			<br>
			</div>

			<div class="datos_ventas">
				<h5>Datos de Venta</h5>
			</div>
			<div class="flex-container" style="border: 1px black solid; border-radius: 5px; padding: 20px; background-color: #e8eaed">

				<div style=" width: 60%; margin: 0; ">
				<label for="vend" style="display: inline-block;">Vendedor:</label>
				<span style="color: black;"><?php echo $_SESSION['nombre']; ?></span><br>
				

				<label>Tipo de Pago:</label>
				<input type="text" name="tipo_pago"v-model ="datos.tipo_pago"  style="margin-right: 20px; width: 20%" required>

				<label>Tipo de Envio:</label>
				<input type="text" name="tipo_envio" v-model ="datos.tipo_envio"  style=" width: 20%" required><br>

				<label>Cuenta:</label>
				<input type="text" name="cuenta" v-model ="datos.cuenta" style="margin-right: 20px; width: 70%" required><br>

				</div>
				
				<div style="width: 40%; margin: 10px" >
					<div >
						<label style="margin-right: 30px">Finanzas:</label>
						
						<input type="radio" name="finanzas" v-model ="datos.finanzas" value="1" :checked="!checkedData">Aprobado
						<input type="radio" name="finanzas" v-model ="datos.finanzas" value="0" :checked="!checkedData">No Aprobado


					</div>
					<div >
						<label style="margin-right: 10px">Supervisión:</label>
						<input type="radio" name="supervicion" v-model ="datos.supervicion" value="1" :checked="!checkedData">Aprobado
						<input type="radio" name="supervicion" v-model ="datos.supervicion" value="0" :checked="!checkedData">No Aprobado
					</div>
				</div>

			</div>
			
			</form>

<?php  
$session_id= session_id();
if (isset($_POST['id'])){$id=$_POST['id'];}
?>
	

			<table class="table table-hover table-striped nota_nueva" id="table-prod" style="text-align: center; margin: auto;">
					
	
					<thead class="thead-dark thead-bordered">
							<br>
						
						<tr>
							<th>No.</th>
							<th>Cantidad</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th>Importe</th>
							<th>Acción</th>
						</tr>

						<tr>
					<form id="form-productos" method="POST">
							<td style="padding: 5px; padding-bottom: 15px; width: 20px"></td>
							<td style="padding: 5px; padding-bottom: 15px; width: 20px">
								<input type="number" name="cantidad_tmp" class="monto"  min="0" style="width: 100%" min="0" v-model = "datos.cantidad_tmp">
							</td>
							<td style="padding: 5px; padding-bottom: 15px; width: 400px">
								<input type="text" name="descripcion_tmp" style="width: 100%" v-model = "datos.descripcion_tmp" >
							</td>
							<td style="padding: 5px; padding-bottom: 15px; width: 100px">
								<input type="number" name="precio_tmp" class="monto" min="0" style="width: 100px"  v-model = "datos.precio_tmp">
							</td>
							<td style="padding: 5px; padding-bottom: 15px; width: 100px" class="flex-container">$
								<input type="number" name="importe_tmp" id="importe_tmp" :value="importe" style="width: 100px"  v-model = "datos.importe_tmp" disabled>
							</td>

							<td style="padding: 5px; padding-bottom: 15px; width: 150px; margin-bottom: 20px">
								<input class="btn btn-outline-success"  id=""v-on:click="agregar()" value="Agregar">
							</td>
				</form>
						</tr> <br>
						
						<tr>
							<th>No.</th>
							<th>Cantidad</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th>Importe</th>
							<th>Acción</th>
						</tr>
						
					</thead>
					<tbody >
		
						<tr style="margin-bottom: 20px" v-for ="(d, i) in datos.items">
							<td id="no" style="width: 100px"> {{ i + 1}}</td>
							<td id="cantidad" style="width: 100px">{{ d.cantidad_tmp}}</td>
							<td id="descripcion" style="width: 400px">{{ d.descripcion_tmp}}</td>
							<td id="precio" style="width: 100px">{{ d.precio_tmp}}</td>
							<td id="importe" style="width: 100px">{{ d.importe_tmp}}</td>
							<td style="width: 150px;"><a v-on:click="eliminar(i)" class="add_del" ><i class="far fa-trash-alt" style="margin-right: 10px"></i>Eliminar</a></td>

						</tr>

					</tbody><br>



					<tfoot style="font-weight: bold; text-align: right;" >

						<tr>
							<td colspan="4" style="text-align: left;">OBSERVACIONES:</td>
							<td colspan="" style="border-top: 0">SUBTOTAL</td>
							<td style="text-align: center;" id="subtotal">
								$<input style="width: 80px; font-weight: bold;" form="nota" type="text" class="Costo" :value="subtotal" name="subtotal"  readonly></>

							</td>
						</tr>
						<tr>
							<td colspan="4" rowspan="3">
								<textarea style="width: 100%; height: 140px" name="observaciones" form="nota" v-model ="datos.observaciones" >
									
								</textarea>
							</td>
							<td colspan="" style="border-top: 0">ENVIO</td>
							<td style="text-align: center;">
								$<input style="width: 80px; font-weight: bold;" type="number" value="0.00" form="nota" name="envio" v-model= "datos.envio">
							</td>
						</tr>

						<tr>
							<td colspan="" style="border-top: 0">REDEX</td>
							<td style="text-align: center;">
								$<input style="width: 80px; font-weight: bold;" type="number" value="0.00"  form="nota" name="redex" v-model = "datos.redex" >

								<input style="width: 80px; font-weight: bold;" type="hidden" value="datos.item"  form="nota" name="item" v-model = "datos.item" >

							</td>
						</tr>
						<tr>
							<td colspan="" style="border-top: 0">TOTAL</td>
							<td style="text-align: center;" id="Costo">
								 $<input style="width: 80px; font-weight: bold;" form="nota" type="text" class="Costo" :value="sumatori_total" name="total"  readonly></>
							</td>

						</tr>
			
				
					</tfoot>

				</table>

				<br>

				<?php } ?>

				<div style="margin-left: 80%">
					<input class="btn-new btn-sesion" name="save-nota" form="nota" type="submit" value="Guardar" style="margin: auto;" id="pdf" v-on:click=" guardarDatos" >
					<?php unset($_SESSION["ventas"]); ?>
				</div>
			
		</section>
<br>
	</div>
</body>
</html>

<script type="text/javascript"> // INSERTAR PRODUCTOS


var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
	checkedData:false,
	datos: {
		subtotal: 0,
		total: 0,
		redex:0,
		envio:0,
		items: [],
		item: "",
		sesion: <?php echo "'".$_SESSION['nombre']."'"?>  
	},
	
  },
  computed:{
	importe(){
		  return this.datos.importe_tmp = (this.datos.cantidad_tmp * this.datos.precio_tmp) 
	  },
	  subtotal(){
		  let numeros = this.datos.items.map(x => x.importe_tmp)
		   
		  return   this.datos.subtotal = numeros.reduce((a, b) => a + b, 0)
		 

	  },
	  sumatori_total(){
		  return  this.datos.total = (  parseInt(this.datos.envio) +  parseInt(this.datos.redex) + this.subtotal)
	  }
  },
  methods: {
	  agregar() {
		  this.datos.items.push(
			  { 
				cantidad_tmp: this.datos.cantidad_tmp, 
				descripcion_tmp: this.datos.descripcion_tmp,
				precio_tmp: this.datos.precio_tmp, 
				importe_tmp: this.datos.importe_tmp 
			})
	  },
	  eliminar(id){
       this.datos.items.pop(id)
	  },
	  
	  guardarDatos(){
		  this.datos.item = JSON.stringify(this.datos.items)
	  
	  }
  },
  
})
 </script>