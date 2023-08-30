<?php 
$conexion =mysqli_connect('localhost','root','','registro_soporte');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte</title>
    <link rel="stylesheet" href="soporte.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <div class="logo"> Instituto Boliviano de Metrologia IBMETRO (Lista de Soporte)</div>
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
            <button class="btn" onclick="return redireccion();" id="btn-I">Inicio</button>
            <button class="btn" onclick="return redireccion();" id="btn-1">Solicitudes</button>
            <button class="btn" onclick="return redireccion();" id="btn-2">Informe de Soporte</button>
            <button class="btn" onclick="return redireccion();" id="btn-3">Oficinas y Áreas</button>
            <button class="btn" onclick="return redireccion();" id="btn-4">Lista Activa Usuario</button>
            <button class="btn" onclick="return redireccion();" id="btn-F">Salir</button>
        </nav>


        <div class="container-tabla" id="app">
            <table>
                <thead>
                <tr>
                    <th style="width: 50px; text-align:center;" > ID</th>
                    <th > Fecha/ Hora <br>Inicio</th>
                    <th> Oficina</th>
                    <th style="width: 10px;"> Area/ Unidad</th>
                    <th> Funcionario Responsable</th>
                    <th> Cargo Funcionario</th>
                    <th> Correo Institucional</th>
                    <th> Tipo de Servicio</th>
                    <th> Dispositivo/ <br>Tarea </th>
                    <th> Solicitud/ problema</th>
                    <th> Personal Soporte</th>
                    <th> Diagnostico y Recomendación</th>
                    <th> Fecha/ Hora <br> Concluida</th>
                    <th> Estado del <br> Trabajo</th>
                    <th> Imprimir</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                $sql="SELECT soporte_cl.ID, oficinas.UBICACION_OFICINA,area.AREA,dispositivos.DESCRIPCION , usuarios.NombreCompleto, usuarios.cargo, usuarios.correo, servicio.TIPO, soporte_cl.PROBLEMA, soporte_cl.FECHA from (((((soporte_cl INNER JOIN oficinas ON soporte_cl.OFICINAS=oficinas.ID) INNER JOIN area ON soporte_cl.AREA=area.ID) INNER JOIN dispositivos ON soporte_cl.DISPOSITIVO=dispositivos.ID) INNER JOIN usuarios ON soporte_cl.USUARIOS=usuarios.ID) INNER join servicio on soporte_cl.SERVICIO=servicio.ID)
                ORDER BY soporte_cl.ID asc;";
                $result=mysqli_query($conexion,$sql);
                while($mostrarusuarios=mysqli_fetch_array($result)){
                   
                    ?>
                <tr>
                    <td><?php  echo $mostrarusuarios['ID'] ?> </td>
                    <td><?php  echo $mostrarusuarios['FECHA'] ?></td>
                    <td style="width: 100px;"><?PHP echo $mostrarusuarios['UBICACION_OFICINA']?></td>
                    <td style="text-align:center;"><?PHP echo $mostrarusuarios['AREA']?></td>
                    <td><?PHP echo $mostrarusuarios['NombreCompleto']?></td>
                    <td><?PHP echo $mostrarusuarios['cargo']?></td>
                    <td><?PHP echo $mostrarusuarios['correo']?></td>
                    <td><?PHP echo $mostrarusuarios['TIPO']?></td>  
                    <td><?PHP echo $mostrarusuarios['DESCRIPCION']?></td>
                    <td style="width: 50px;"><?PHP echo $mostrarusuarios['PROBLEMA']?></td>
                    <td><?PHP // echo $mostrarusuarios['']?></td>
                    <td><?PHP // echo $mostrarusuarios['']?></td>
                    <td><?PHP // echo $mostrarusuarios['']?></td>
                    <td><?PHP // echo $mostrarusuarios['']?></td>
                    <td><?PHP // echo $mostrarusuarios['']?></td>
                    <td><?PHP // echo $mostrarusuarios['']?></td>
                </tr>
                <?php 
                }
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
    <script src="tecnico.js">
    </script>
</body>
</html>
