<?php
$conexion=mysqli_connect('localhost','root','','registro_soporte');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud</title>
    <link rel="stylesheet" href="sylesol.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <header>
        <div class="logo">Instituto Boliviano de Metrologia (IBMETRO - Solicitud)</div>
            <div class="menu">
            <nav>
                <button class="btn-nav" onclick="return redireccion();" id="btn-Inicio">Inicio</button>
                <button class="btn-nav" onclick="return redireccion();" id="btn-1">Codice</button>
                <button class="btn-nav" onclick="return redireccion();" id="btn-2">Sistema Integrado (srv)</button>
                <button class="btn-nav" onclick="alert('Ingrese Firefox e ingrese (192.168.2.46/rrhh-asistenia)')">Asistencia.NET</button>
                <button class="btn-nav" onclick="return redireccion();" id="btn-3">S.A.C.</button>
                <button class="btn-nav" onclick="return redireccion();" id="btn-4">Asistencia.Net</button>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="container_panel" id="container_panel">
            <h2>Panel de Control</h2>
            <a id="efecto" href="#"><i class="fas fa-envelope"></i> Nueva Solicitud de Soporte</a>
            <a href="../P_C3/Ver_Solicitudes.php"><i class="fas fa-chart-bar"></i> Ver Solicitudes Realizadas</a>
        </div>
        <div class="formulario">                   
            <div class="formulario_seleccion">
                <h2>Solicitud de Soporte</h2>
                <form action="conexion_cl.php" method="POST" id="formulario">
                    <div class="input_boxE">
                        <p>Oficina: </p>
                        <select name="oficinas" id="oficinas">
                            <option value="">Seleccione uno</option>
                            <?php
                            $query = "SELECT ID, UBICACION_OFICINA FROM oficinas";
                            $result = mysqli_query($conexion, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['ID'] . '">' . $row['UBICACION_OFICINA'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input_boxE">
                        <p>Área:</p>
                        <select name="area" id="area">
                            <option value="">Seleccione uno</option>
                            <?php
                            $query = "SELECT ID, DESCRIPCION FROM area";
                            $result = mysqli_query($conexion, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['ID'] . '">' . $row['DESCRIPCION'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input_boxE">
                        <p>Responsable:</p>
                        <select name="Responsable" id="Responsable">
                            <option value="">Seleccione uno</option>
                            <?php
                                $query = "SELECT * FROM usuarios 
                                WHERE cargo LIKE '%RESPONSABLE%' || cargo LIKE '%DIRECTOR%' || cargo LIKE '%SUPERVISOR%'";
                                $result = mysqli_query($conexion, $query);
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['ID'] . '">' . $row['NombreCompleto'] . '</option>';
                                }
                                ?>  
                        </select>
                    </div>
                    <div class="input_boxE">
                        <p>Dispositivo:</p>
                        <select name="dispositivos" id="dispositivos">
                            <option value="">Seleccione uno</option>
                            <?php
                                $query = "SELECT * FROM dispositivos";
                                $result = mysqli_query($conexion, $query);
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['ID'] . '">' . $row['DESCRIPCION'] . '</option>';
                                }
                                ?>  
                        </select>
                    </div>
                    <div class="input_boxE">
                        <p>Tipo Servicio:</p>
                        <select name="Servicio" id="Servicio">
                            <option value="">Seleccione uno</option>
                            <?php
                                $query = "SELECT * FROM servicio";
                                $result = mysqli_query($conexion, $query);
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['ID'] . '">' . $row['TIPO'] . '</option>';
                                }
                                ?>  
                        </select>
                    </div>
                    <div class="input_boxE">
                        <label for="PROBLEMA"><p>Problema:</p></label>
                        <input type="text" class="input_text" id="PROBLEMA" name="PROBLEMA" required>
                    </div>
                    <div class="boton">
                        <button data-text="Awesome" class="button">
                            <span class="actual-text">&nbsp;Enviar&nbsp;</span>
                            <span class="hover-text" aria-hidden="true">&nbsp;Enviar&nbsp;</span>        
                        </button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
    
    <footer>
        <p>Derecho Reservados Instituto Boliviano de Metrologia <b>(IBMETRO) </b></p>
    </footer>
    
    <script src="eje.js"> </script>

</body>

</html>