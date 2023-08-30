<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="fondo1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <header>
        <div class="logo">Instituto Boliviano de Metrologia (IBMETRO)</div>
        <div class="menu">
        <nav>
            <button class="btn" onclick="return redireccion();" id="btn-1">Codice</button>
            <button class="btn" onclick="return redireccion();" id="btn-2">Sistema Integrado (srv)</button>
            <button class="btn" onclick="alert('Ingrese Firefox e ingrese (192.168.2.46/rrhh-asistenia)')">Asistencia.NET</button>
            <button class="btn" onclick="return redireccion();" id="btn-3">S.A.C.</button>
            <button class="btn" onclick="return redireccion();" id="btn-4">Asitencia.net</button>
            <button class="btn" onclick="return redireccion();" id="btn-5">Salir</button>
        </nav>
    </div>
    </header>
    <div class="container">
        
        <div class="container_panel">
            <h2>Panel de Control</h2>
            <a href="../P_C2/solicitudes_cl.php"><i class="fas fa-envelope"></i> Nueva Solicitud de Soporte</a>
            <a href="../P_C3/Ver_Solicitudes.php"><i class="fas fa-chart-bar"></i> Ver Solicitudes Realizadas</a>
        </div>
        <div class="container_content">
            <h2>Panel Principal</h2>
            <div class="panel">
                <button class="cuadro1" id="btn-n"> Nuevo Formulario</button>
                <button class="cuadro2" id="btn-v"> Ver Formularios</button>
            </div>
        </div>
    </div>
    <footer>
    <p>Derecho Reservados Instituto Boliviano de Metrologia <b>(IBMETRO) </b></p>
    </footer>
    <script src="ejecucion.js"></script>
</body>
</html>