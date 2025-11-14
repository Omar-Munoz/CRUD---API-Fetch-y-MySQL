<?php
header("Content-Type: application/json");

require_once "Modelo/Productos.php";

$producto = new Producto();
$accion = $_POST["Accion"] ?? "";

switch ($accion) {

    case "Guardar":
        $errores = $producto->validar($_POST);

        if (!empty($errores)) {
            echo json_encode(["success" => false, "errors" => $errores]);
            exit;
        }

        $ok = $producto->guardar($_POST);

        echo json_encode([
            "success" => $ok,
            "message" => $ok ? "Producto guardado" : "Error al guardar"
        ]);
    break;


    case "Modificar":
        $errores = $producto->validar($_POST);

        if (!empty($errores)) {
            echo json_encode(["success" => false, "errors" => $errores]);
            exit;
        }

        $ok = $producto->editar($_POST);

        echo json_encode([
            "success" => $ok,
            "message" => $ok ? "Producto actualizado" : "Error al actualizar"
        ]);
    break;

    case "Buscar":
        $data = $producto->buscar($_POST["codigo"]);
        echo json_encode($data);
    break;

    case "Listar":
        echo json_encode($producto->listar());
    break;

    default:
        echo json_encode(["success" => false, "message" => "Acción no válida"]);
    break;
}
?>
