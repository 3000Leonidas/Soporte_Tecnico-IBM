function redireccion(){
    document.getElementById('btn-1').addEventListener('click', function(){
        window.location.href='https://codice.produccion.gob.bo/';
    })
    document.getElementById('btn-2').addEventListener('click', function(){
        window.location.href='http://srv.ibmetro.gob.bo/index.php?r=site/index';
    })
    document.getElementById('btn-3').addEventListener('click', function(){
        window.location.href='http://192.168.2.51/php56/sis-crp/sac/index.php';
    })
    document.getElementById('btn-4').addEventListener('click', function(){
        alert('La plataforma de asitencia funciona mediante en FireFox.');
        window.location.href='http://192.168.2.46/rrhh-asistencia/';
    });
    document.getElementById('btn-5').addEventListener('click', function(){
        window.location.href='../Inicio/type_menu.php';
    })
    document.getElementById('btn-n').addEventListener('click', function(){
        window.location.href='../P_C2/solicitudes_cl.php';
    })
    document.getElementById('btn-v').addEventListener('click', function(){
        window.location.href='../P_C3/Ver_Solicitudes.php';
    })
};

redireccion();
