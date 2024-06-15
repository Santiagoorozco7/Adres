<?php
// Incluir archivo de conexión
include 'conexion.php';

// Función para insertar un registro en la base de datos
function insertarRegistro($conexion) {
    // Obtener los datos del formulario
    $presupuesto = $_POST['presupuesto'] ?? '';
    $unidad = $_POST['unidad'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';
    $valor_Unitario = $_POST['valor_Unitario'] ?? '';
    $valor_Total = $_POST['valor_Total'] ?? '';
    $date = $_POST['date'] ?? '';
    $proveedor = $_POST['proveedor'] ?? '';
    $documentacion = $_POST['documentacion'] ?? '';

    // Verificar si algún campo está vacío
    if (empty($presupuesto) || empty($unidad) || empty($tipo) || empty($cantidad) || empty($valor_Unitario) || empty($valor_Total) || empty($date) || empty($proveedor) || empty($documentacion)) {
        echo "<script>alert('Todos los campos son obligatorios');</script>";
        return false;
    }

    // Preparar la consulta SQL para insertar un nuevo registro
    $sql = "INSERT INTO registros (ID, presupuesto, unidad, tipoBNServicio, cantidad, valorUnitario, valorTotal, fechaAdquisición, proveedor, documentación) 
            VALUES ('$presupuesto', '$unidad', '$tipo', '$cantidad', '$valor_Unitario', '$valor_Total', '$date', '$proveedor', '$documentacion')";

    // Utilizar una declaración preparada para la inserción
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssiidsss", $presupuesto, $unidad, $tipo, $cantidad, $valor_Unitario, $valor_Total, $date, $proveedor, $documentacion);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro agregado correctamente";
        return true;
    } else {
        echo "Error al agregar registro: " . $stmt->error;
        return false;
    }
}

// Procesar la solicitud del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['crear'])) {
    $conn = getConexion();
    insertarRegistro($conn);
    $conn->close();
    exit();
}
?>
