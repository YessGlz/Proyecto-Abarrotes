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
$id_proveedor = isset($_POST['id_proveedor']) ? $_POST['id_proveedor'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$horario = isset($_POST['horario']) ? $_POST['horario'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$empresa = isset($_POST['empresa']) ? $_POST['empresa'] : '';

// Verificar si los datos están definidos y no son vacíos
if (empty($id_proveedor) || empty($nombre) || empty($horario) || empty($telefono) || empty($empresa)) {
    echo "Error: Todos los campos son obligatorios.";
} else {
    // Preparar la consulta
    $sql = "INSERT INTO proveedores (id_proveedor, nombre, horario, telefono, empresa) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("sssss", $id_proveedor, $nombre, $horario, $telefono, $empresa);

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
