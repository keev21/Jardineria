<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/oficinas.models.php');

$Oficina = new OficinasModel;

switch ($_GET["op"]) {

    case 'todos':

        $datos = array();

        $datos = $Oficina->todos();

        while ($fila = mysqli_fetch_assoc($datos)) {

            $todos[] = $fila;
        }

        echo json_encode($todos);

        break;




    case 'uno':

        $codigo_oficina = $_POST['codigo_oficina'];

        $datos = array();

        $datos = $Oficina->uno($codigo_oficina);

        $respuesta = mysqli_fetch_assoc($datos);

        echo json_encode($respuesta);

        break;




    case 'insertar':

        $codigo_oficina = $_POST['codigo_oficina'];

        $ciudad = $_POST['ciudad'];

        $pais = $_POST['pais'];

        $region = $_POST['region'];

        $codigo_postal = $_POST['codigo_postal'];

        $telefono = $_POST['telefono'];
        $linea_direccion1= $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        

        $datos = array();

        $datos = $Oficina->Insertar($codigo_oficina, $ciudad, $pais, $region, $codigo_postal, $telefono, 
        $linea_direccion1, $linea_direccion2);

        

        echo json_encode($datos);

        break;




    case 'actualizar':

        $codigo_oficina = $_POST['codigo_oficina'];

        $ciudad = $_POST['ciudad'];

        $pais = $_POST['pais'];

        $region = $_POST['region'];

        $codigo_postal = $_POST['codigo_postal'];

        $telefono = $_POST['telefono'];
        $linea_direccion1= $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];

        $datos = array();

        $datos = $Oficina->Actualizar($codigo_oficina, $ciudad, $pais, $region, $codigo_postal, $telefono, 
        $linea_direccion1, $linea_direccion2);

       

        echo json_encode($datos);

        break;

    case 'eliminar':

        $codigo_oficina = $_POST['codigo_oficina'];

        $datos = array();

        $datos = $Oficina->Eliminar($codigo_oficina);

        

        echo json_encode($datos);

        break;
}
?>