<?php
header('Content-Type: application/json');

require_once '../config/conexion.php';
require_once '../models/Producto.php';

$producto = new Producto();


switch ($_GET["op"]) {
    /* Lee todo datos de la tabla de producto y lo convierte en JSON*/
    case 'GetAll':
        $datos = $producto->get_producto();
        echo json_encode($datos);
        break;

     /* Inserta productos en la tabla de producto y los convierte en JSON */
    case 'Insert':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prod_nom = $_POST['prod_nom'];
            $cat_id = $_POST['cat_id'];

            $datos = $producto->insert_producto($prod_nom, $cat_id);
            echo json_encode(array("success" => true, "message" => "Producto insertado correctamente"));
        }
        break;

}