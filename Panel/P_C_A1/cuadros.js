function redireccion(){
    document.getElementById('btn-1').addEventListener('click', function(){
    window.location.href='../P_C_A2/Solicitudes.php';
    });
    document.getElementById('btn-2').addEventListener('click', function(){
    window.location.href='../P_C_A3/ListaSoporte.php';
    });
    document.getElementById('btn-3').addEventListener('click', function(){
    window.location.href='../P_C_A4/Edificio.php';
    });
    document.getElementById('btn-4').addEventListener('click', function(){
    window.location.href='../P_C_A5/Registros.php';
    });

}
redireccion();