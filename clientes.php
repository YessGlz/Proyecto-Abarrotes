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
$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
$nombre_cliente = isset($_POST['nombre_cliente']) ? $_POST['nombre_cliente'] : '';
$informacion_contacto = isset($_POST['informacion_contacto']) ? $_POST['informacion_contacto'] : '';

// Verificar si los datos están definidos
if (empty($id_cliente) || empty($nombre_cliente) || empty($informacion_contacto)) {
    echo "Error: Todos los campos son obligatorios.";
} else {
    // Preparar la consulta
    $sql = "INSERT INTO clientes (id_cliente, nombre_cliente, informacion_contacto) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("sss", $id_cliente, $nombre_cliente, $informacion_contacto);

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
