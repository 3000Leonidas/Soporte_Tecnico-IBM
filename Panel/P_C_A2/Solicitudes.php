<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes</title>
    <link rel="stylesheet" href="Solicitudes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo"> Instituto Boliviano de Metrologia IBMETRO (Solicitudes)</div>
        <div class="navegador">
        <ul>
            <li><a href="http://192.168.2.45/ocsreports/">OCS INVENTORY</a></li>
            <li><a href="https://192.168.2.50/#/login">BIOSTAR 2</a></li>
            <li><a href="http://192.168.2.51/php56/sis-crp/sac/index.php">S.A.C.</a></li>
            <li><a href="https://codice.produccion.gob.bo/login?url=">CODICE</a></li>
            <li><a href="#" onclick="alert('Ingrese a Firefox e inserte: (192.168.2.46/rrhh-asistencia) ');">ASISTENCIA.NET</a></li>
            <li><a href="http://srv.ibmetro.gob.bo/index.php?r=site/index">SISTEMA INTEGRADO</a></li>
        </ul>
    </div>

    </header>
    <div class="container">
        <nav>
        <button class="btn" onclick="return redireccion();" id="btn-I"><i class="fa-solid fa-house"></i>Inicio</button>
            <button class="btn" onclick="return redireccion();" id="btn-1"><i class="fas fa-list"></i>Solicitudes</button>
            <button class="btn" onclick="return redireccion();" id="btn-2"><i class="fas fa-info-circle"></i>Informe de Soporte</button>
            <button class="btn" onclick="return redireccion();" id="btn-3"><i class="fa-solid fa-building" ></i> Oficinas y Áreas</button>
            <button class="btn" onclick="return redireccion();" id="btn-4"><i class="fas fa-users"></i>Lista Activa Usuario</button>
            <!-- <button class="btn" onclick="return redireccion();" id="btn-5"><i class="fa-solid fa-screwdriver-wrench"></i>Dispositivos</button> -->
            <button class="btn" onclick="return redireccion();" id="btn-F"><i class="fa-solid fa-door-closed"></i>Salir</button>
        </nav>
        <div class="container-left">
            <table>
                <thead>
                    <tr> 
                        <th>Cod</th>
                        <th>Oficina</th>
                        <th>Área</th>
                        <th>Problema</th>
                        <th>Fecha de Inicio</th>
                        <th>Mostrar en PDF</th>
                    </tr>
                    </thead>
                <tbody>
                    <tr> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>                
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>Derechos Reservados de IBMETRO</p>
    </footer>
    <script src="Solicitudes.js"></script>
</body>
</html>