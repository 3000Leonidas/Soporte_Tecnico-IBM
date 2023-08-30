<?php

$conexion = mysqli_connect('localhost', 'root', '', 'registro_soporte');
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Resto de los datos del formulario
    $NombreCompleto = $_POST['NombreCompleto'];
    $username = $_POST['username'];
    $PASSWORD = $_POST['PASSWORD'];
    $AREA = $_POST['AREA'];
    $cargo = $_POST['cargo'];
    $correo = $_POST['correo'];

    // Verificar si el nombre de usuario ya existe
    $verificar_usuario = "SELECT * FROM usuarios WHERE username = ?";
    $stmt_verificar = $conexion->prepare($verificar_usuario);
    $stmt_verificar->bind_param("s", $username);
    $stmt_verificar->execute();
    $result = $stmt_verificar->get_result();

    if ($result->num_rows > 0) {
        echo "El nombre de usuario ya existe en la base de datos.";
    } else {
        // Insertar los datos en la tabla usuarios usando sentencia preparada
        $sql = "INSERT INTO usuarios (NombreCompleto, username, PASSWORD, AREA, cargo, correo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssiss", $NombreCompleto, $username, $PASSWORD, $AREA, $cargo, $correo);

        if ($stmt->execute()) {
            // echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar los datos: " . $stmt->error;
        }
        $stmt->close();
    }
    $stmt_verificar->close();
    $conexion->close();
}
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Resto de los datos del formulario
//     $NombreCompleto = $_POST['NombreCompleto'];
//     $username = $_POST['username'];
//     $PASSWORD = $_POST['PASSWORD'];
//     $AREA = $_POST['AREA'];
//     $cargo = $_POST['cargo'];
//     $correo = $_POST['correo'];

//     // Verificar si el nombre de usuario ya existe
//     $verificar_usuario = "SELECT * FROM usuarios WHERE username = ?";
//     $stmt_verificar = $conexion->prepare($verificar_usuario);
//     $stmt_verificar->bind_param("s", $username);
//     $stmt_verificar->execute();
//     $result = $stmt_verificar->get_result();

//     if ($result->num_rows > 0) {
//         // echo "username ya existe en la base de datos.";
//     } else {
//         // Insertar los datos en la tabla usuarios usando sentencia preparada
//         $sql = "INSERT INTO usuarios (NombreCompleto, username, PASSWORD, AREA, cargo, correo) VALUES (?, ?, ?, ?, ?, ?)";
//         $stmt = $conexion->prepare($sql);
//         $stmt->bind_param("sssiss", $NombreCompleto, $username, $PASSWORD, $AREA, $cargo, $correo);

//         if ($stmt->execute()) {
//             echo "Datos insertados correctamente.";
//         } else {
//             echo "Error al insertar los datos: " . $stmt->error;
//         }

//         $stmt->close();
//     }
//     $stmt_verificar->close();
//     $conexion->close();
// }

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $consulta = "SELECT usuarios.ID, usuarios.NombreCompleto, usuarios.AREA, usuarios.username, usuarios.cargo, usuarios.correo, area.AREA
                        FROM usuarios  INNER JOIN area 
                        ON usuarios.AREA=area.ID";

    // Obtener el valor del filtro desde la consulta GET
    if (isset($_GET['filtro'])) {
        $filtro = $_GET['filtro'];
        // Agregar la condición del filtro a la consulta SQL
        $consulta .= " WHERE usuarios.NombreCompleto LIKE '%$filtro%'
                      OR usuarios.username LIKE '%$filtro%'
                      OR usuarios.AREA LIKE '%$filtro%'
                      OR usuarios.cargo LIKE '%$filtro%'
                      OR usuarios.correo LIKE '%$filtro%'";
    }

    $resultado = $conexion->query($consulta);

    $data = array();
    while ($row = mysqli_fetch_assoc($resultado)) {
        $data[] = $row;
    }

    // header('Content-Type: application/json');
    echo json_encode($data);

    $conexion->close();
}

?>