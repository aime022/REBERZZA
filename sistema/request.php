<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reberzza";
$mysqli = new mysqli($servername, $username, $password, $dbname);
  
    switch ($_GET['request']) {
        case 'notes':
            $sql = "SELECT * FROM notes where eliminado is NULL";
            break;
 
        case 'state':
            $sql = "SELECT * FROM states WHERE country_id = ". $_GET['country_id'];
            break;
 
        case 'city':
            $sql = "SELECT * FROM cities WHERE state_id = ". $_GET['state_id'];
            break;
         
        default:
            break;
    } 
    $result = $mysqli->query($sql); 
    $response = [];
    while($row = mysqli_fetch_assoc($result)){
       $response[] = array("id"=>$row['id'], 
                           "cliente"=>$row['cliente'],
                           "direccion"=>$row['direccion'],
                           "telefono"=>$row['telefono'],
                           "cp"=>$row['cp'],
                           "vendedor"=>$row['vendedor'],
                           "tipo_pago"=>$row['tipo_pago'],
                           "cuenta"=>$row['cuenta'],
                           "subtotal"=>$row['subtotal'],
                           "envio"=>$row['envio'],
                           "redex"=>$row['redex'],
                           "total"=>$row['total'],
                           "status_fin"=>$row['status_fin'],
                           "status_sup"=>$row['status_sup'],
                           "observaciones"=>$row['observaciones'],
                           "fecha"=>$row['fecha'],
                           "items"=>$row['items'],
                           "eliminado"=>$row['eliminado'],


                        );


    } 
    echo json_encode($response); 
?>