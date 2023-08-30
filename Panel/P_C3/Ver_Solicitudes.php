<?php
$conexion =mysqli_connect('localhost','root','','registro_soporte');
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Solicitudes</title>
    <link rel="stylesheet" href="preview.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  </head>
  <body>
    <header>
      <div class="logo">Instituto Boliviano de Metrologia (IBMETRO - Solicitudes)</div>
      <div class="menu">
      <nav>
          <button class="btn-nav" onclick="return redireccion();" id="btn-Inicio">Inicio</button>
          <button class="btn-nav" onclick="return redireccion();" id="btn-1">Codice</button>
          <button class="btn-nav" onclick="return redireccion();" id="btn-2">Sistema Integrado (srv)</button>
          <button class="btn-nav" onclick="return redireccion();" id="btn-3" >Asistencia.NET</button>
          <button class="btn-nav" onclick="return redireccion();" id="btn-4">S.A.C.</button>
          <button class="btn-nav" onclick="return redireccion();" id="btn-5">Salir</button>
      </nav>
    </div>
  </header>
  <div class="container">
    <div class="container_panel">
              <h2>Panel de Control</h2>
              <a href="../P_C2/solicitudes_cl.php"><i class="fas fa-envelope"></i> Nueva Solicitud de Soporte</a>
              <a id="efecto" href="#"><i class="fas fa-chart-bar"></i> Ver Solicitudes Realizadas</a>
    </div>
    <div class="container-left">
      <table>
        <thead>
            <tr> 
            <th>Cod</th>
            <th>Fecha de Inicio</th>
            <th>Oficina</th>
            <th>Área</th>
            <th>Problema</th>
            <th>Responsable</th>
            <th>Diagnositico y Recomendaciones</th>
            <th>Fecha Final</th>
            <th>Mostrar en PDF</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            $sql="SELECT soporte_cl.ID, oficinas.UBICACION_OFICINA,area.DESCRIPCION,dispositivos.DESCRIPCION , usuarios.NombreCompleto, servicio.TIPO, soporte_cl.PROBLEMA, soporte_cl.FECHA from (((((soporte_cl INNER JOIN oficinas ON soporte_cl.OFICINAS=oficinas.ID) INNER JOIN area ON soporte_cl.AREA=area.ID) INNER JOIN dispositivos ON soporte_cl.DISPOSITIVO=dispositivos.ID) INNER JOIN usuarios ON soporte_cl.USUARIOS=usuarios.ID) INNER join servicio on soporte_cl.SERVICIO=servicio.ID)
            ORDER BY soporte_cl.ID ASC;";
            $result=mysqli_query($conexion,$sql);
            while($mostrarusuarios=mysqli_fetch_array($result)){
                ?>

        <tr>
          <td> <?PHP echo $mostrarusuarios['ID']?></td>
          <td style="width: 100px;"> <?php echo $mostrarusuarios['FECHA'] ?> </td>
          <td> <?PHP echo $mostrarusuarios['UBICACION_OFICINA']?></td>
          <td> <?php echo $mostrarusuarios['DESCRIPCION'] ?> </td>
          <td> <?php echo $mostrarusuarios['PROBLEMA'] ?> </td>
          <td> <?php echo $mostrarusuarios['NombreCompleto'] ?> </td>
          <td> </td>
          <td> </td>
          <td> </td>
        </tr>
        <?php }
        ?>
        </tbody>
      </table>
  </div>
  </div>

  </body>
  <script src="preview.js"></script>
</html>