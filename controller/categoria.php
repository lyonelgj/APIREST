<?php
header('Content-Type: application/json');

require_once "../config/conexion.php";
require_once "../models/Categoria.php";

$categoria = new Categoria();

/* Contiene los datos enviados, los pasa de JSON a un array asociativo */
$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {
    /* Lee todo datos de la tabla de categoria y lo convierte en JSON*/
    case 'GetAll':
        $datos = $categoria->get_categoria();
        echo json_encode($datos);
        break;

    /* Lee datos de la tabla de categoria con un id concreto y lo convierte en JSON*/
    case 'GetId':
        $datos = $categoria->get_categoria_x_id($body['cat_id']);
        echo json_encode($datos);
        break;

    /* Inserta datos en la tabla de categoria y los convierte en JSON */
    case 'Insert':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cat_nom = $_POST['cat_nom'];
            $cat_obs = $_POST['cat_obs'];

            $datos = $categoria->insert_categoria($cat_nom, $cat_obs);
            echo json_encode(array("success" => true, "message" => "Categoría insertada correctamente"));
        }
        break;

    /* Actualiza la tabla de categoria */
    case 'Update':
        $datos = $categoria->update_categoria($body["cat_id"], $body["cat_nom"], $body["cat_obs"]);
        echo json_encode("Actualización correcta");
        break;

     /* Borra datos de la tabla de categoria */
    case 'Remove':
        $datos = $categoria->delete_categoria($body["cat_id"]);
        echo json_encode("Categoría borrada correctamente");
        break;
}