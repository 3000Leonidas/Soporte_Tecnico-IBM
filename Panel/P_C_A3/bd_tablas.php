<?php
session_start(); // Iniciar sesión

$conexion = mysqli_connect('localhost', 'root', '', 'registro_soporte');

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oficina = mysqli_real_escape_string($conexion, $_POST['oficinas']);
    $area = mysqli_real_escape_string($conexion, $_POST['area']);
    $responsable = mysqli_real_escape_string($conexion, $_POST['Responsable']);
    $servicio = mysqli_real_escape_string($conexion, $_POST['Servicio']);
    $dispositivo = mysqli_real_escape_string($conexion, $_POST['dispositivos']);
    $problema = mysqli_real_escape_string($conexion, $_POST['PROBLEMA']);

    // Restablecer el contador de ID después de la inserción
    $newAutoIncrementValue = 1; // El nuevo valor inicial deseado
    $alterQuery = "ALTER TABLE soporte_cl AUTO_INCREMENT = $newAutoIncrementValue";
    if (!mysqli_query($conexion, $alterQuery)) {
        echo "Error al reiniciar el contador de ID: " . mysqli_error($conexion);
        exit;
    }


        $insertQuery = "INSERT INTO soporte_cl (OFICINAS, AREA, USUARIOS, DISPOSITIVO, SERVICIO, PROBLEMA) 
        VALUES ('$oficina', '$area', '$responsable', '$dispositivo','$servicio', '$problema')";
if (mysqli_query($conexion, $insertQuery)) {
    // Restablecer el contador de ID después de la inserción
    $newAutoIncrementValue = 1; // El nuevo valor inicial deseado
    $alterQuery = "ALTER TABLE soporte_cl AUTO_INCREMENT = $newAutoIncrementValue";
    if (mysqli_query($conexion, $alterQuery)) {
            mysqli_close($conexion);
            header("Location: ../P_C3/Ver_solicitudes.php"); // Cambia esto a la página deseada
            exit;
        } else {
            echo "Error al reiniciar el contador de ID: " . mysqli_error($conexion);
        }
    }
}

?>