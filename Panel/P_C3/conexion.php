<?php


// 1 esta esla llamada de las tablas esto es lo que tiene que mostrar en la tabla.
// &conxion=mysqli_connect()
// &sql="SELECT soporte_cl.ID, oficinas.UBICACION_OFICINA,area.DESCRIPCION,dispositivos.DESCRIPCION , usuarios.NombreCompleto, servicio.TIPO, soporte_cl.PROBLEMA, soporte_cl.FECHA from (((((soporte_cl INNER JOIN oficinas ON soporte_cl.OFICINAS=oficinas.ID) INNER JOIN area ON soporte_cl.AREA=area.ID) INNER JOIN dispositivos ON soporte_cl.DISPOSITIVO=dispositivos.ID) INNER JOIN usuarios ON soporte_cl.USUARIOS=usuarios.ID) INNER join servicio on soporte_cl.SERVICIO=servicio.ID);";

// 2. este es para la insercion de datos en solicitudes
"INSERT INTO soporte_cl (OFICINAS, AREA, USUARIOS, DISPOSITIVO, SERVICIO, PROBLEMA) 
VALUES ('$idOficina', '$idArea', '$idResponsable', '$idDispositivo', '$idServicio', '$problema')";
?>