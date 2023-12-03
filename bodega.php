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
$id_bodega = isset($_POST['id_bodega']) ? $_POST['id_bodega'] : '';
$codigo_producto = isset($_POST['codigo_producto']) ? $_POST['codigo_producto'] : '';
$espacio_almacenamiento = isset($_POST['espacio_almacenamiento']) ? $_POST['espacio_almacenamiento'] : '';
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';


// Verificar si los datos están definidos
if (empty($id_bodega) || empty($codigo_producto) || empty($espacio_almacenamiento) || empty($cantidad)) {
    echo "Error: Todos los campos son obligatorios.";
} else {
    // Preparar la consulta
    $sql = "INSERT INTO bodega (id_bodega, codigo_producto, espacio_almacenamiento, cantidad) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("sssi", $id_bodega, $codigo_producto, $espacio_almacenamiento, $cantidad);

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

