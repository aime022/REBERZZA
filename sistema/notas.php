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

<?php include "../conexion.php"; ?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="estilo.css">
<link rel="stylesheet" type="text/css" href="normalize.css">
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

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 <script src="js/alertify.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />

<!-- Load polyfills to support older browsers -->
<script src="//polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver" crossorigin="anonymous"></script>

<!-- Load Vue followed by BootstrapVue -->
<script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>

<!-- Load the following for BootstrapVueIcons support -->
<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js"></script>
</head>
<div id="app">
<div class="content">
	<br>
<div style="width: 900px; margin-top: 80px">
	<h3>Ventas</h3>
	<hr>	
	<table class="table table-hover" style="text-align: center;">
	<thead class="thead-dark">
		<tr>
			<th scope="col">No.</th>
				<th>Fecha</th>
			<th>Cliente</th>
			<th>Vendedor</th>
			<th>Total</th>
			<th>Finanzas</th>
			<th>Suervisión</th>
			<th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="d in datos.data" :key="datos.data.id">
				<td>{{ d.id  }}</td>
				<td>{{d.fecha }}</td>

                    <td>{{d.cliente }}</td>
                    <td>{{d.vendedor}}</td>
                    <td>{{d.total}}</td>
					<td>{{d.status_fin}}</td>
                    <td>{{d.status_sup}}</td>
					<td>
					<b-button  class="btn btn-info" v-b-modal.modal-xl variant="primary" @click="ver(d)" ><i class="far fa-eye"></i></b-button>


					<button  @click="eliminar(d.id)" class="btn btn-danger">x</button>
					</td>

                </tr>
            </tbody>
        </table>
		<b-modal id="modal-xl" size="xl" title="">	
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
				<p>Nombre:</p>
				<input type="text" name="Nombre" v-model ="datos.mostrar.cliente"  style="display:inline-block; width: 35%; margin-right: 15px" disabled>

				<label for="direccion">Dirección:</label>
				<input type="text" name="direccion" v-model ="datos.mostrar.direccion"  style="display:inline-block; width: 35%; margin-right: 15px" disabled>
<br>
				<label for="telefono">Telefono:</label>
				<input type="tel" name="telefono"  v-model ="datos.mostrar.telefono"  style="display:inline-block; width: 30%; margin-right: 15px" disabled>

				<label for="cp">C.P.:</label>
				<input type="number" name="cp" v-model ="datos.mostrar.cp"   style="width: 10%; margin-right: 0" disabled>
				<input type="number" name="cp" v-model ="datos.mostrar.eliminado"   style="width: 10%; margin-right: 0" disabled>

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
				<input type="text" name="tipo_pago"v-model ="datos.mostrar.tipo_pago"  style="margin-right: 20px; width: 20%" disabled>

				<label>Tipo de Envio:</label>
				<input type="text" name="tipo_envio" v-model ="datos.mostrar.envio"  style=" width: 20%" disabled><br>

				<label>Cuenta:</label>
				<input type="text" name="cuenta" v-model ="datos.mostrar.cuenta" style="margin-right: 20px; width: 70%" disabled><br>

				</div>
				


			</div>
			
			</form>

		<table class="table table-hover" style="text-align: center;">
						
		<tr>
							<th>No.</th>
							<th>Cantidad</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th>Importe</th>
						</tr>
						
					</thead>
					<tbody >
		
						<tr style="margin-bottom: 20px" v-for ="(d,i) in datos.items_tmp">
							<td id="no" style="width: 100px"> {{ i + 1}}</td>
							<td id="cantidad" style="width: 100px">{{ d.cantidad_tmp}}</td>
							<td id="descripcion" style="width: 400px">{{ d.descripcion_tmp}}</td>
							<td id="precio" style="width: 100px">{{ d.precio_tmp}}</td>
							<td id="importe" style="width: 100px">{{ d.importe_tmp}}</td>

						</tr>

					</tbody><br>
					<tfoot style="font-weight: bold; text-align: right;" >

<tr>
	<td colspan="4" style="text-align: left;">OBSERVACIONES:</td>
	<td colspan="" style="border-top: 0">SUBTOTAL</td>
	<td style="text-align: center;" id="subtotal">
		$<input style="width: 80px; font-weight: bold;" form="nota" type="text" class="Costo" v-model ="datos.mostrar.subtotal" name="subtotal"  disabled></>

	</td>
</tr>
<tr>
	<td colspan="4" rowspan="3">
		<textarea style="width: 100%; height: 140px" name="observaciones" form="nota" v-model ="datos.mostrar.observaciones" disabled >
			
		</textarea>
	</td>
	<td colspan="" style="border-top: 0">ENVIO</td>
	<td style="text-align: center;">
		$<input style="width: 80px; font-weight: bold;" type="number" value="0.00" form="nota" name="envio" v-model= "datos.mostrar.envio" disabled>
	</td>
</tr>

<tr>
	<td colspan="" style="border-top: 0">REDEX</td>
	<td style="text-align: center;">
		$<input style="width: 80px; font-weight: bold;" type="number" value="0.00"  form="nota" name="redex" v-model = "datos.mostrar.redex" disabled >


	</td>
</tr>
<tr>
	<td colspan="" style="border-top: 0">TOTAL</td>
	<td style="text-align: center;" id="Costo">
		 $<input style="width: 80px; font-weight: bold;" form="nota" type="text" class="Costo" v-model = "datos.mostrar.total" name="total"  disabled></>
	</td>

</tr>


</tfoot>

        </table>
		
		</b-modal>

		<div>
		<div>

		<div>

</div>
</div>

</div>

</div>
</body>
</html>

<script type="text/javascript"> // INSERTAR PRODUCTOS
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
	datos: {
		subtotal: 0,
		total: 0,
		redex:0,
		envio:0,
		items: [],
		data: {},
		mostrar:{
		},
		items_tmp:{}

	}, 
	show : false,
  },
  computed:{
	  subtotal(){
		  let numeros = this.datos.items.map(x => x.importe_tmp)
		   
		  return   this.datos.subtotal = numeros.reduce((a, b) => a + b, 0)
		 

	  },
	  sumatori_total(){
		  return  this.datos.total = (  parseInt(this.datos.envio) +  parseInt(this.datos.redex) + this.subtotal)
	  }
  },
  mounted () {

	this.getnotes()
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
        axios.post('update_product.php', {
            id: id
        }).then(response => {
			console.log(response)
        }).catch(e => {
            console.log(e);
        });  

	  },
	  ver(item){
		  console.log(item)
		  this.datos.items_tmp  = JSON.parse(item.items)
		  this.datos.mostrar = item


	  },
	  guardarDatos(){
		  this.datos.item = JSON.stringify(this.datos.items)
	      
	  },

	  getnotes: function(){
      axios.get('request.php', {
        params: {
          request: 'notes'
        }
      })
      .then(function (response) {
		app.datos.data = response.data
		console.log(response.data)

      });
 
    }
  },
  
})
 </script>