<?php
session_start();
$username = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'registro_soporte');

if (!$db) {
    die('Error de Conexion: ' . mysqli_connect_error());
}

if (isset($_POST['Login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    $user_check_query = "SELECT * FROM usuarios WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);

    if (!$result) {
        die(mysqli_error($db));
    } else {
        $user = mysqli_fetch_assoc($result);
    }

    if ($user) {
        if ($user['username'] === $username && $user['PASSWORD'] === $password) {
            $_SESSION['user_nombre'] = $user['NombreCompleto'];
            $_SESSION['user_id'] = $user['ID']; // Almacena el nombre en la sesión

            if ($user['ID'] <= 5) {
                $_SESSION['username'] = $username;
                $_SESSION['user_tipo'] = 'admin'; // Puedes definir el tipo de usuario aquí
                $_SESSION['user_nombre'] = $user['NombreCompleto'];
                header("Location: ../P_C_A1/Panel_control.php");
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['user_nombre'] = $user['NombreCompleto'];
                $_SESSION['user_tipo'] = 'cliente'; // Puedes definir el tipo de usuario aquí
                header("Location: ../P_C1/panel_cliente.php");
            }

            exit;
        }
    } else {
        $mensaje = "error => Credenciales incorrectas. Verifica el usuario y contraseña.";
    }
}

