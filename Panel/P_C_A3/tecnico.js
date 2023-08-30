function redireccion() {
$(document).ready(function() { 
function redireccion() {
  const Inicio= document.getElementById('btn-I');
  const solicitudes = document.getElementById('btn-1');
  const edificio = document.getElementById('btn-3');
  const usuarios = document.getElementById('btn-4');
  const salir = document.getElementById('btn-F');

  Inicio.addEventListener('click', function(){
    window.location.href= '../P_C_A1/Panel_control.php';
  })
  solicitudes.addEventListener('click', function () {
    window.location.href = '../P_C_A2/Solicitudes.php';
  });
  edificio.addEventListener('click', function () {
    window.location.href = '../P_C_A4/Edificio.php';
  });
  usuarios.addEventListener('click', function () {
    window.location.href = '../P_C_A5/Registros.php';
  });
  salir.addEventListener('click', function(){
    window.location.href='../Inicio/type_menu.php';
  });
}

redireccion();

    var currentPage = 0;
    var recordsPerPage = 5;

    function updateTable() {
        var startIndex = currentPage * recordsPerPage;
        var endIndex = startIndex + recordsPerPage;
        $("#app table tbody tr").hide();
        $("#app table tbody tr").slice(startIndex, endIndex).show();
        $("#pageInfo").text("Página " + (currentPage + 1) + " de " + Math.ceil( $sql('ID')/ recordsPerPage));
    }

    updateTable();

    $("#prevBtn").click(function() {
        if (currentPage > 0) {
            currentPage--;
            updateTable();
        }
    });

    $("#nextBtn").click(function() {
        if (currentPage < Math.ceil('<?php echo mysqli_num_rows($result); ?>' / recordsPerPage) - 1) {
            currentPage++;
            updateTable(); 
            
        }
    });
});
};

