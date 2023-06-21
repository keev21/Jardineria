<?php
error_reporting(0);
//TODO: Requerimeintos
require_once('../config/sesiones.php');
require_once('../models/pagos.model.php');

$Pago = new PagosModel;

switch ($_GET["op"]) {

    case 'todos':

        $datos = array();

        $datos = $Pago->todos();

        while ($fila = mysqli_fetch_assoc($datos)) {

            $todos[] = $fila;
        }

        echo json_encode($todos);

        break;




    case 'uno':

        $codigo_cliente = $_POST['codigo_cliente'];
        $id_transaccion = $_POST['id_transaccion'];

        $datos = array();

        $datos = $Pago->uno($codigo_cliente, $id_transaccion );

        $respuesta = mysqli_fetch_assoc($datos);

        echo json_encode($respuesta);

        break;




    case 'insertar':

        $codigo_cliente = $_POST['codigo_cliente'];

        $forma_pago = $_POST['forma_pago'];

        $id_transaccion = $_POST['id_transaccion'];

        $fecha_pago = $_POST['fecha_pago'];
        $total = $_POST['total'];

        $datos = array();

        $datos = $Pago->Insertar($codigo_cliente, $forma_pago, $id_transaccion, $fecha_pago, $total);

        

        echo json_encode($datos);

        break;

    case 'eliminar':

        $codigo_cliente = $_POST['codigo_cliente'];

        $datos = array();

        $datos = $Pago->Eliminar($codigo_cliente);

        

        echo json_encode($datos);

        break;
}
?>