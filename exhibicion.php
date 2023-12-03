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
$id_exhibicion = isset($_POST['id_exhibicion']) ? $_POST['id_exhibicion'] : '';
$codigo_producto = isset($_POST['codigo_producto']) ? $_POST['codigo_producto'] : '';
$espacio_en_tienda = isset($_POST['espacio_en_tienda']) ? $_POST['espacio_en_tienda'] : '';

// Verificar si los datos están definidos y no son vacíos
if (empty($id_exhibicion) || empty($codigo_producto) || empty($espacio_en_tienda)) {
    echo "Error: Todos los campos son obligatorios.";
} else {
    // Preparar la consulta
    $sql = "INSERT INTO exhibicion (id_exhibicion, codigo_producto, espacio_en_tienda) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("sss", $id_exhibicion, $codigo_producto, $espacio_en_tienda);

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
