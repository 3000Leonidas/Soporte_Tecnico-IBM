<!--  -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel de Control</title>
    <link rel="stylesheet" href="fond1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


</head>
<body>
    <header>
        <div class="logo">Instituto Boliviano de Metrologia (IBMETRO)</div>
        <div class="menu">
            <nav>
               <button class="btn"> <a href="http://192.168.2.45/ocsreports/" class ="link">OCS Inventory</a></button>
                <button class="btn"><a href="https://192.168.2.50/#/login" class ="link">BioStar 2</a></button>
                <button class="btn"><a href="http://192.168.2.51/php56/sis-crp/sac/index.php" class ="link">S.A.C.</a></button>
                <button class="btn"><a href="https://codice.produccion.gob.bo/" class ="link">Codice</a></button>
                <button class="btn"><a href="#" class ="link" onclick="alert('Ingrese a Firefox e inserte: (192.168.2.46/rrhh-asistencia) ')" >Asistencia.net</a></button>
                <button class="btn"><a href="http://srv.ibmetro.gob.bo/index.php?r=site/index" class ="link">Sistema Integrado</a></button>
                <button class="btn"><a href="../Inicio/type_menu.php" class ="link">Salir</a></button>
            </nav>
        </div>
    </header>
      <div class="container_one">  
        <div class="container_right">
            
            <div class="link">
            <h2>PANEL DE CONTROL SOPORTE TÉCNICO</h2>
                <a href="../P_C_A2/Solicitudes.php" ><i class="fas fa-envelope"></i> Solicitudes</a>
                <a href="../P_C_A3/ListaSoporte.php"><i class="fas fa-chart-bar"></i> Informe de Soporte</a>
            <details>
                <summary><i class="fas fa-cog"></i> Configuraciones</summary>
                <a href="../P_C_A4/Edificio.php"><i class="fas fa-building"></i> Oficinas y Área</a>
                <a href="../P_C_A5/Registros.php"><i class="fas fa-user"></i> Usuarios</a>
                <!-- <a href="../P_C_A6/Dispositivos.php" ><i class="fas fa-desktop"></i> Dispositivos</a> -->
            </details>
            </div>
        </div>

        <div class="container_left">
            <h2>Soporte Técnico</h2>
            <span class="Panel_left"></span>
            <div class="tabla">
                <button class="Cuadros"  onclick="return redireccion();" id="btn-1"> Solicitudes </button>
                <button class="Cuadros" onclick="return redireccion();" id="btn-2" > Informe de <br> Soporte</button>
                <button class="Cuadros" onclick="return redireccion();" id="btn-3"> Oficinas y <br> Área</button>
                <button class="Cuadros" onclick="return redireccion();" id="btn-4"> Lista <br> Activa <br> Usuarios</button>
                <!-- <button class="Cuadros" onclick="return redireccion();" id="btn-5"> Dispositivos </button> -->
            </div>
        </div>
    </div>
    <script>
    </script>
</body>
<footer>
    <p>Derecho Reservados Instituto Boliviano de Metrologia <b>(IBMETRO) </b></p>
    </footer>
    <script src="cuadros.js"></script>
</html>