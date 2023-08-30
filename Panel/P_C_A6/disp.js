function redireccion(){
    const solicitudes = document.getElementById('btn-1');
    const informe = document.getElementById('btn-2');
    const edificio = document.getElementById('btn-3');
    const registro = document.getElementById('btn-4');
    // const dispositivos = document.getElementById('btn-5');

    solicitudes.addEventListener('click', function() {
      window.location.href = '../P_C_A2/Solicitudes.php';
    });
    informe.addEventListener('click', function() {
      window.location.href = '../P_C_A3/ListaSoporte.php';
    });
    
    edificio.addEventListener('click', function() {
      window.location.href = '../P_C_A4/Edificio.php';
    });
    
    registro.addEventListener('click', function() {
      window.location.href = '../P_C_A5/Registros.php';
    });
    
    // dispositivos.addEventListener('click', function() {
    //   window.location.href = '../P_C_A6/Dispositivos.php';
    // });

  }

  redireccion();