<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/detalle_pedido.model.php');

$Detalle_pedido = new detalle_pedido;

switch ($_GET["op"]) {

    case 'todos':

        $datos = array();

        $datos = $Detalle_pedido->todos();

        while ($fila = mysqli_fetch_assoc($datos)) {

            $todos[] = $fila;
        }

        echo json_encode($todos);

        break;




    case 'uno':

        $codigo_pedido  = $_POST['codigo_pedido'];
        $codigo_producto  = $_POST['codigo_producto'];

        $datos = array();

        $datos = $Detalle_pedido->uno($codigo_pedido, $codigo_producto );

        $respuesta = mysqli_fetch_assoc($datos);

        echo json_encode($respuesta);

        break;




    case 'insertar':

        $codigo_pedido = $_POST['codigo_pedido'];

        $codigo_producto = $_POST['codigo_producto'];

        $cantidad = $_POST['cantidad'];
        $precio_unidad = $_POST['precio_unidad'];
        $numero_linea = $_POST['numero_linea'];

        $datos = array();

        $datos = $Detalle_pedido->Insertar($codigo_pedido, $codigo_producto, $cantidad, $precio_unidad,$numero_linea);
        

        echo json_encode($datos);

        break;




    case 'actualizar':

        $codigo_pedido = $_POST['codigo_pedido'];

        $codigo_producto = $_POST['codigo_producto'];

        $cantidad = $_POST['cantidad'];
        $precio_unidad = $_POST['precio_unidad'];
        $numero_linea = $_POST['numero_linea'];

        $datos = array();

        $datos = $Detalle_pedido->Actualizar($codigo_pedido, $codigo_producto, $cantidad, $precio_unidad,$numero_linea);

       

        echo json_encode($datos);

        break;

    case 'eliminar':

        $codigo_pedido  = $_POST['codigo_pedido '];
        $codigo_producto = $_POST['codigo_producto'];

        $datos = array();

        $datos = $Detalle_pedido->Eliminar($codigo_pedido, $codigo_producto);

        

        echo json_encode($datos);

        break;
}
?>