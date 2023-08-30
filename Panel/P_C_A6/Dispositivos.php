<?php 
$conexion=mysqli_connect('localhost','root','','registro_soporte');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispositivos</title>
    <link rel="stylesheet" href="dispositivos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo"> Instituto Boliviano de Metrologia IBMETRO (Dispositivos)</div>
        <div class="navegador">
        <ul>
            <li><a href="..//P_C_A1/Panel_control.php">Inicio</a></li>
            <li><a href="http://192.168.2.45/ocsreports/">OCS Inventory</a></li>
            <li><a href="https://192.168.2.50/#/login">Bio Star 2</a></li>
            <li><a href="#">Códice</a></li>
            <li><a href="#" onclick="alert('Ingrese a Firefox e inserte: (192.168.2.46/rrhh-asistencia) ');">Asistencia.Net</a></li>
            <li><a href="http://192.168.2.51/php56/sis-crp/sac/index.php">S.A.C.</a></li>
            <li><a href="../Inicio/type_menu.php">Salir</a></li>
        </ul>
    </div>

    </header>
    <div class="container">
        <nav>
            <button class="btn" onclick="return redireccion();" id="btn-1"> 
            <i class="fas fa-list"></i> 
            Solicitudes
            </button>
            <button class="btn" onclick="return redireccion();" id="btn-2"> 
            <i class="fas fa-info-circle"></i>  
            Informe de Soporte
            </button>
            <button class="btn" onclick="return redireccion();" id="btn-3">
            <i class="fa-solid fa-building" ></i>  
            Oficinas y Áreas
            </button>
            <button class="btn" onclick="return redireccion();" id="btn-4"> 
            <i class="fas fa-users"></i>  
            Lista Activa Usuario
            </button>
            <button class="btn" onclick="return redireccion();" id="btn-5"> 
            <i class="fa-solid fa-screwdriver-wrench"></i> 
            Dispositivos
            </button>
        </nav>
        <div class="tabla">
            <table>
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Dispositivos</th>
                    </tr>
                    <?php 
                    $sql = "SELECT * FROM dispositivos";
                    $result = mysqli_query($conexion,$sql);
                    while($mostrarDispositivos=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $mostrarDispositivos['ID'] ?></td>
                        <td><?php echo $mostrarDispositivos['DESCRIPCION'] ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>Derechos Reservados de IBMETRO</p>
    </footer>
    <script src="disp.js"></script>
</body>
</html>