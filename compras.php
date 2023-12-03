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
$id_compra = isset($_POST['id_compra']) ? $_POST['id_compra'] : '';
$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
$codigo_producto = isset($_POST['codigo_producto']) ? $_POST['codigo_producto'] : '';
$fecha_compra = isset($_POST['fecha_compra']) ? $_POST['fecha_compra'] : '';
$cantidad_comprada = isset($_POST['cantidad_comprada']) ? $_POST['cantidad_comprada'] : '';
$precio_unitario = isset($_POST['precio_unitario']) ? $_POST['precio_unitario'] : '';
$total_pagar = isset($_POST['total_pagar']) ? $_POST['total_pagar'] : '';

// Verificar si los datos están definidos y no son vacíos
if (empty($id_compra) || empty($id_cliente) || empty($codigo_producto) || empty($fecha_compra) || empty($cantidad_comprada) || empty($precio_unitario) || empty($total_pagar)) {
    echo "Error: Todos los campos son obligatorios.";
} else {
    // Preparar la consulta
    $sql = "INSERT INTO compras (id_compra, id_cliente, codigo_producto, fecha_compra, cantidad_comprada, precio_unitario, total_pagar) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("sssssss", $id_compra, $id_cliente, $codigo_producto, $fecha_compra, $cantidad_comprada, $precio_unitario, $total_pagar);

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
