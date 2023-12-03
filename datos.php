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
$codigo_producto = $_POST['codigo_producto'];
$nombre_producto = $_POST['nombre_producto'];
$unidad_medida = $_POST['unidad_medida'];
$marca_producto = $_POST['marca_producto'];
$precio_venta = $_POST['precio_venta'];
$Categoria_producto = $_POST['Categoria_producto'];
$Margen_ganancia = $_POST['Margen_ganancia'];
$costo_compra = $_POST['costo_compra'];

// Insertar datos en la base de datos
$sql = "INSERT INTO productos (codigo_producto, nombre_producto, unidad_medida, marca_producto, precio_venta, Categoria_producto, Margen_ganancia, costo_compra)
        VALUES ('$codigo_producto', '$nombre_producto', '$unidad_medida', '$marca_producto', '$precio_venta', '$Categoria_producto', '$Margen_ganancia', '$costo_compra')";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
