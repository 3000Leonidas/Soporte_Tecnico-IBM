document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("Formulario").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) {
  evento.preventDefault();
  var usuario = document.getElementById('Usuario').value;
  var clave = document.getElementById('password').value;

  fetch('server.php', {
    method: 'POST',
    body: 'Login_user=1&username=' + encodeURIComponent(usuario) + '&password=' + encodeURIComponent(clave),
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    }
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Error en la solicitud fetch.');
    }
    return response.json();
  })
  .then(data => {
    if (data.success) {
      // Redirecciona al usuario si la validación fue exitosa
      window.location.href ='../P_C_A1/Panel_control.php';
    } else {
      // Muestra un mensaje de error si las credenciales son incorrectas
      alert('Credenciales incorrectas. Verifica el usuario y contraseña.');
    }
  })
  .catch(error => {
    // Maneja cualquier error de la solicitud fetch
    console.error('Error de red:', error);
  });
}