<?php
// Incluir archivo de conexión
include 'conexion.php';

// Función para realizar una consulta y obtener registros
function consultaRegistros($conexion, $doc) {
    // Preparar la consulta SQL para seleccionar registros
    $sql = "SELECT `ID`, `presupuesto`, `unidad`, `tipoBNServicio`, `cantidad`, `valorUnitario`, `valorTotal`, `fechaAdquisición`, `proveedor`, `documentación` FROM `registros` WHERE documentación = $doc";

    // Inicializar una declaración preparada
    $stmt = $conexion->prepare($sql);

    // Verificar si la declaración se preparó correctamente
    if ($stmt === false) {
        echo "Error al preparar la declaración: " . $conexion->error;
        return false;
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Obtener el resultado
        $resultado = $stmt->get_result();

        // Verificar si se encontraron registros
        if ($resultado->num_rows > 0) {
            // Mostrar los registros
            while ($fila = $resultado->fetch_assoc()) {
                echo "Presupuesto: " . htmlspecialchars($fila['presupuesto']) . "<br>";
                echo "Unidad: " . htmlspecialchars($fila['unidad']) . "<br>";
                echo "Tipo: " . htmlspecialchars($fila['tipoBNServicio']) . "<br>";
                echo "Cantidad: " . htmlspecialchars($fila['cantidad']) . "<br>";
                echo "Valor Unitario: " . htmlspecialchars($fila['valorUnitario']) . "<br>";
                echo "Valor Total: " . htmlspecialchars($fila['valorTotal']) . "<br>";
                echo "Fecha de Adquisición: " . htmlspecialchars($fila['fechaAdquisición']) . "<br>";
                echo "Proveedor: " . htmlspecialchars($fila['proveedor']) . "<br>";
                echo "Documentación: " . htmlspecialchars($fila['documentación']) . "<br><br>";
            }
        } else {
            echo "No se encontraron registros.";
        }
    } else {
        echo "Error al ejecutar la consulta: " . $stmt->error;
    }

    // Cerrar la declaración preparada
    $stmt->close();
}

if (isset($_POST['consulta'])) {
    $conn = getConexion();
    $documentacion = $_POST['documentacion'];
    
    // Llamar a la función para obtener registros
    consultaRegistros($conn, $documentacion);
    
    // Cerrar la conexión
    $conn->close();
    


}
// Obtener conexión a la base de datos

?>
 
