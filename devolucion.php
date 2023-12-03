<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "abarrotes_olan";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar datos del formulario
$id_devolucion = isset($_POST['id_devolucion']) ? $_POST['id_devolucion'] : '';
$codigo_producto = isset($_POST['codigo_producto']) ? $_POST['codigo_producto'] : '';
$fecha_devolucion = isset($_POST['fecha_devolucion']) ? $_POST['fecha_devolucion'] : '';
$cantidad_devuelta = isset($_POST['cantidad_devuelta']) ? $_POST['cantidad_devuelta'] : '';
$motivo_devolucion = isset($_POST['motivo_devolucion']) ? $_POST['motivo_devolucion'] : '';
$precio_unitario_devuelto = isset($_POST['precio_unitario_devuelto']) ? $_POST['precio_unitario_devuelto'] : '';
$precio_total_devuelto = isset($_POST['precio_total_devuelto']) ? $_POST['precio_total_devuelto'] : '';

// Verificar si los datos están definidos y no son vacíos
if (empty($id_devolucion) || empty($codigo_producto) || empty($fecha_devolucion) || empty($cantidad_devuelta) || empty($motivo_devolucion) || empty($precio_unitario_devuelto) || empty($precio_total_devuelto)) {
    echo "Error: Todos los campos son obligatorios.";
} else {
    // Preparar la consulta
    $sql = "INSERT INTO devolucion (id_devolucion, codigo_producto, fecha_devolucion, cantidad_devuelta, motivo_devolucion, precio_unitario_devuelto, precio_total_devuelto) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("sssssss", $id_devolucion, $codigo_producto, $fecha_devolucion, $cantidad_devuelta, $motivo_devolucion, $precio_unitario_devuelto, $precio_total_devuelto);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
}

$conn->close();
?>
