<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="forma.css">
</head>
 <body>
   
    <div class="container">   
        <div class="container-login">
        <h2>Registro Ibmetro</h2>
            <form method="post" action="type_menu.php" >
                <h2>Iniciar Sesión</h2>
                <div class="input-group">
                <label></label>
                <input type="text" name="username" value="<?php echo $username;?>" placeholder="Usuario">
                </div>
                <div class="input-group">
                <label></label>
                <input type="password" name="password" placeholder="Contraseña">
                </div>
                <button type="submit" class="btn" name="Login_user">Register</button>
            </form>
        </div>
        <div class="container-img">

            <div class="imagenes1"></div>
            <div class="imagenes2"></div>
        </div>
    </div>
</body>
</html>
