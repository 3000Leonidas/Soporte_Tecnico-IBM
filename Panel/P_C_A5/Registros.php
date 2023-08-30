<?php $conexion = mysqli_connect('localhost','root','','registro_soporte');  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="reg.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo"> Instituto Boliviano de Metrologia IBMETRO (Lista Activa)</div>
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
            <button class="btn" onclick="return redireccion();" id="btn-F"><i class="fa-solid fa-door-closed"></i>Salir</button>
            
        </nav>
    
        <div class="opciones">
            <div class="lista">
                <ul>
                    <li><a href="#" id="filtroU"><i class="fa-solid fa-user"></i> Usuarios</a></li>
                    <li><a href="#" id="filtroRDA"> <i class="fa-solid fa-person-dots-from-line"></i>Responsables de Área</a></li>
                    <li><a href="#" id="filtroPST"><i class="fa-solid fa-users-gear"></i>Personal de Soporte Tecnico</a></li>
                </ul>
            </div>

            <div class="tabla">
                <div class="busqueda">
                <input type="text" id="searchInput" placeholder="Ingrese los datos del Usuario en usqueda">
                <button class="btn-1" onclick="abrir();"><i class="fas fa-plus"></i>Agregar</button>
                </div>
            <table id="myTable">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Área</th>
                        <th>Cargo</th>
                        <th>Correo</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql="SELECT usuarios.ID, usuarios.NombreCompleto, usuarios.AREA, usuarios.username, usuarios.cargo, usuarios.correo, area.AREA
                        FROM usuarios  INNER JOIN area 
                        ON usuarios.AREA=area.ID";
                        $result=mysqli_query($conexion,$sql);
                        while($mostrarusuarios=mysqli_fetch_array($result)){
                            ?>
                    <tr>
                    <td> <?PHP echo $mostrarusuarios['NombreCompleto']?></td>
                        <td> <?php echo $mostrarusuarios['username'] ?> </td>
                        <td> <?php echo $mostrarusuarios['AREA'] ?> </td>
                        <td> <?php echo $mostrarusuarios['cargo'] ?> </td>
                        <td> <?php echo $mostrarusuarios['correo'] ?> </td>
                    </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
                <div class="pagination">
                    <a href="#" id="prevBtn">&laquo; Anterior</a>
                        <span id="pageInfo"></span>
                    <a href="#" id="nextBtn">Siguiente &raquo;</a>
                </div>
            </div>
        </div>
<div class="modal" id="modalAgregar">
    <div class="modal-content">
        <h2> Nuevo Usuario </h2>
        <form id="formularioAgregar" method="post">
            
            <label for="NombreCompleto">Nombre:</label>
            <input type="text" id="NombreCompleto" name="NombreCompleto" required>
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="PASSWORD">Contraseña:</label>
            <input type="password" id="PASSWORD" name="PASSWORD">
            <label for="AREA">Área:</label>
            <select id="AREA" name="AREA" required>
            <option value="">Seleccione un área</option>
            <?php 
            $conexion = mysqli_connect('localhost', 'root', '', 'registro_soporte');
            if ($conexion->connect_error) {
                die("Error en la conexión: " . $conexion->connect_error);
            }
            $consulta_areas = "SELECT * FROM area";
            $resultado_areas = $conexion->query($consulta_areas);

            // Generar las opciones del select
            while ($mostraropciones = mysqli_fetch_array($resultado_areas)) {
                echo '<option value="' . $mostraropciones['ID'] . '">' . $mostraropciones['AREA'] . '</option>';
            }
            ?>
        </select>
            <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>
            <div class="botones">
            <button type="submit" value="Agregar" name="agregar" class="btn-open-close">Agregar</button>
            <button type="button" onclick="cerrarFormularioAgregar()" class="btn-open-close">Cancelar</button>
            </div>
        </form>
    </div>
</div>
    </div>
    <script src="fun.js"></script>
</body>
</html>