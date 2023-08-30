<?php 
$conexion=mysqli_connect('localhost','root','','registro_soporte');
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infrestructura</title>
    <link rel="stylesheet" href="capa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo"> Instituto Boliviano de Metrologia IBMETRO (Oficinas - Áreas)</div>
        <div class="navegador">
        <ul>
            <li><a href="http://192.168.2.45/ocsreports/">OCS Inventory</a></li>
            <li><a href="https://192.168.2.50/#/login">Bio Star 2</a></li>
            <li><a href="https://codice.produccion.gob.bo/">Códice</a></li>
            <li><a href="#" onclick="alert('Ingrese a Firefox e inserte: (192.168.2.46/rrhh-asistencia) ');">Asistencia.Net</a></li>
            <li><a href="http://192.168.2.51/php56/sis-crp/sac/index.php">S.A.C.</a></li>
            <li><a href="http://srv.ibmetro.gob.bo/index.php?r=site/index">Sistema Integrado</a></li>
        </ul>
    </div>

    </header>
    <div class="container">
        <nav>
            <button class="btn" onclick="return redireccion();" id="btn-I"><i class="fa-solid fa-house"></i>Inicio</button>
            <button class="btn" onclick="return redireccion();" id="btn-1"> <i class="fas fa-list"></i> Solicitudes</button>
            <button class="btn" onclick="return redireccion();" id="btn-2"> <i class="fas fa-info-circle"></i> Informe de Soporte</button>
            <button class="btn" onclick="return redireccion();" id="btn-3"><i class="fa-solid fa-building" ></i> Oficinas y Áreas</button>
            <button class="btn" onclick="return redireccion();" id="btn-4"> <i class="fas fa-users"></i> Lista Activa Usuario</button>
            <!-- <button class="btn" onclick="return redireccion();" id="btn-5"> <i class="fa-solid fa-screwdriver-wrench"></i>  Dispositivos</button> -->
            <button class="btn" onclick="return redireccion();" id="btn-F"><i class="fa-solid fa-door-closed"></i>Salir</button>
        </nav>
        <div class="tablas">
            <div class="toficinas">
                <table>
                    <tr>
                        <th>Id Oficina</th>
                        <th>Ubicacion de la Oficina</th>
                    </tr>
                    <?php 
                    $sql="SELECT * FROM oficinas";
                    $result=mysqli_query($conexion,$sql);

                    while($mostraroficina=mysqli_fetch_array($result)){

                    ?>
                    <tr>
                        <td> <?php echo $mostraroficina['ID'] ?></td>
                        <td> <?php echo $mostraroficina['UBICACION_OFICINA'] ?></td>
                    </tr>
                    <?php
                    }?>
                </table>
            </div>
            <div class="tareas">
                <table>                
                    <tr>
                        <th>Id Áreas</th>
                        <th>Áreas</th>
                        <th>Descipcción</th>
                    </tr>
                    <?PHP 
                    $sql1="SELECT * FROM  area";
                    $coneccion = mysqli_query($conexion,$sql1);

                    while($mostrararea=mysqli_fetch_array($coneccion)){
                    ?>
                    <tr>
                        <td><?php echo $mostrararea['ID']?></td>
                        <td><?php echo $mostrararea['AREA']?></td>
                        <td><?php echo $mostrararea['DESCRIPCION']?></td>
                    </tr>
                <?PHP 
                }
                ?>
                </table>
            </div>
        </div>
    </div>
    <footer>
        <p>Derechos Reservados de IBMETRO</p>
    </footer>
    <script src="funcion.js."></script>
</body>
</html>