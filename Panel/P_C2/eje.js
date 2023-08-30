// Función para redireccionar
function redireccion() {
    const Inicio = document.getElementById('btn-Inicio');
    const codice = document.getElementById('btn-1');
    const srv = document.getElementById('btn-2');
    const sac = document.getElementById('btn-3');
    const asistencia = document.getElementById('btn-4');

    Inicio.addEventListener('click', function() {
        window.location.href = '../P_C1/panel_cliente.php';
    });

    codice.addEventListener('click', function() {
        window.location.href = 'https://codice.produccion.gob.bo/login?url=';
    });

    srv.addEventListener('click', function() {
        window.location.href = 'http://srv.ibmetro.gob.bo/index.php?r=site/index';
    });

    sac.addEventListener('click', function() {
        window.location.href = 'http://192.168.2.51/php56/sis-crp/sac/index.php';
    });

    asistencia.addEventListener('click', function() {
        alert('La plataforma de asistencia.net solo funciona mediante FireFox.');
        window.location.href = 'http://192.168.2.46/rrhh-asistencia/';
    });
}
redireccion();

var botonEnviar = document.querySelector('.button[data-text="Awesome"]');

botonEnviar.addEventListener('click', function(event) {
    var camposObligatorios = ['oficina', 'area', 'Responsable', 'dispositivos', 'Servicio', 'PROBLEMA'];
    var camposFaltantes = [];

    camposObligatorios.forEach(function(campo) {
        var valor = document.getElementById(campo).value.trim();
        if (valor === '') {
            camposFaltantes.push(campo);
            document.getElementById(campo).classList.add('error-highlight');
        } else {
            document.getElementById(campo).classList.remove('error-highlight');
        }
    });

    if (camposFaltantes.length < 0) {
        alert('Por favor, complete todos los campos obligatorios.');
        event.preventDefault(); // Evitar el envío del formulario si hay problemas
    }
});