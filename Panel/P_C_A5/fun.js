function redireccion() {
  const Inicio= document.getElementById('btn-I');
  const solicitudes = document.getElementById('btn-1');
  const informe = document.getElementById('btn-2');
  const edificio = document.getElementById('btn-3');
  // const dispositivos = document.getElementById('btn-5');
  const salir = document.getElementById('btn-F');

  Inicio.addEventListener('click', function(){
    window.location.href= '../P_C_A1/Panel_control.php';
  })
  solicitudes.addEventListener('click', function () {
    window.location.href = '../P_C_A2/Solicitudes.php';
  });
  informe.addEventListener('click', function () {
    window.location.href = '../P_C_A3/ListaSoporte.php';
  });

  edificio.addEventListener('click', function () {
    window.location.href = '../P_C_A4/Edificio.php';
  });

  // dispositivos.addEventListener('click', function () {
  //   window.location.href = '../P_C_A6/Dispositivos.php';
  // });
  salir.addEventListener('click', function(){
    window.location.href='../Inicio/type_menu.php';
  });
}

redireccion();

// Función para abrir el modal de agregar usuario
function abrir() {
  var modalAgregar = document.getElementById("modalAgregar");
  modalAgregar.style.display = "block";
}

// Función para cerrar el modal de agregar usuario
function cerrarFormularioAgregar() {
  var modalAgregar = document.getElementById("modalAgregar");
  modalAgregar.style.display = "none";
}

// Función para limpiar el formulario de agregar usuario
function limpiarFormulario() {
  document.getElementById("formularioAgregar").reset();
}

// Función para validar el formulario de agregar usuario
function validarFormularioAgregar() {
  var NombreCompleto = document.getElementById('NombreCompleto').value;

  var usuario = document.getElementById("username").value;
  var AREA = document.getElementById("AREA").value;
  var cargo = document.getElementById("cargo").value;
  var correo = document.getElementById("correo").value;

  if (NombreCompleto === "" || usuario === "" || AREA === "" || cargo === "" || correo === "") {
    alert("Por favor, complete todos los campos.");
    return false;
  }

  return true;
}

// Evento para enviar el formulario de agregar
document.getElementById('formularioAgregar').addEventListener('submit', function (event) {
  event.preventDefault(); 

  if (!validarFormularioAgregar()) {
    return;
  }

  var NombreCompleto = document.getElementById('NombreCompleto').value;
  var PASSWORD = document.getElementById('PASSWORD').value;
  var usuario = document.getElementById("username").value;
  var AREA = document.getElementById("AREA").value;
  var cargo = document.getElementById("cargo").value;
  var correo = document.getElementById("correo").value;

  $.ajax({
    url: 'new.php', 
    method: 'POST',
    data: {
      NombreCompleto: NombreCompleto,
      PASSWORD:PASSWORD,
      username: usuario,
      AREA: AREA,
      cargo: cargo,
      correo: correo
    },
    success: function (response) {
      limpiarFormulario(); 
      cerrarFormularioAgregar(); 
      fetchDataAndDisplay();
    },
    error: function (xhr, status, error) {
      console.error(error);
    }
  });
});

// Evento para enviar el formulario de agregar
document.getElementById('formularioAgregar').addEventListener('submit', function (event) {
    var NombreCompleto = document.getElementById('NombreCompleto').value;
    var usuario = document.getElementById("username").value;
    var cargo = document.getElementById("cargo").value;
    var correo = document.getElementById("correo").value;

    if (NombreCompleto === "" || usuario === "" || cargo === "" || correo === "") {
        alert("Por favor, complete todos los campos.");
        event.preventDefault();
    }
});

document.addEventListener('DOMContentLoaded', function () {
  const table = document.getElementById('myTable');
    const searchInput = document.getElementById('searchInput');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const pageInfo = document.getElementById('pageInfo');

    let currentPage = 1;
    const itemsPerPage =11;
    let data = [];

    function updateTableWithData(data) {
      table.innerHTML = '';
      
      const start = (currentPage - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      const paginatedData = data.slice(start, end);

      const thead = table.createTHead();
      const headerRow = thead.insertRow();
      const headers = ["Nombre", "Usuario", "Área", "Cargo", "Correo"];
      headers.forEach(headerText => {
        const header = document.createElement("th");
          header.textContent = headerText;
          headerRow.appendChild(header);
      });

      const tbody = table.createTBody();
      paginatedData.forEach(item => {
          const row = tbody.insertRow();
          const cell1 = row.insertCell();
          const cell2 = row.insertCell();
          const cell3 = row.insertCell();
          const cell4 = row.insertCell();
          const cell5 = row.insertCell();
          cell1.textContent = item.NombreCompleto;
          cell2.textContent = item.username;
          cell3.textContent = item.AREA; // Mostrar correctamente el campo de Área
          cell4.textContent = item.cargo;
          cell5.textContent = item.correo;
      });

      pageInfo.textContent = `Página ${currentPage} de ${Math.ceil(data.length / itemsPerPage)}`;
    }

    function fetchDataAndDisplay() {
      $.ajax({
        url: 'new.php', // Cambiar esto a la ruta correcta de new.php
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            data = response;
            updateTableWithData(data);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
    }

    function filtro() {
      const valor = searchInput.value.toUpperCase();
      const filterNombre = data.filter(item => item.NombreCompleto.toUpperCase().includes(valor));
      updateTableWithData(filterNombre);
    }

    // Resto del código de paginación y búsqueda...

prevBtn.addEventListener('click', function (event) {
  event.preventDefault();
  if (currentPage > 1) {
      currentPage--;
      updateTableWithData(data);
  }
});

nextBtn.addEventListener('click', function (event) {
  event.preventDefault();
  if (currentPage < Math.ceil(data.length / itemsPerPage)) {
      currentPage++;
      updateTableWithData(data);
  }
});

searchInput.addEventListener('input', filtro);
  // Llamada inicial para cargar y mostrar los datos
fetchDataAndDisplay();

// Limpiar Filtro de todos
document.getElementById('filtroU').addEventListener('click', function(event){
  event.preventDefault();
  limpiarfiltro();
});

function limpiarfiltro(){
  updateTableWithData(data);
}

//Filtro de Responsables de Áreas
document.getElementById('filtroRDA').addEventListener('click', function(event){
  event.preventDefault();
  const filtroValor='RESPONSABLE';
  aplicarfiltro(filtroValor);
});

function aplicarfiltro(texto){
  const filtrodata = data.filter(item => item.cargo.toUpperCase().includes(texto));
  updateTableWithData(filtrodata);
};

document.getElementById('filtroPST').addEventListener('click', function(event){
  event.preventDefault();
  const Soporte = 'SISTEMAS';
  SOPORTETECNICO(Soporte);
});
function SOPORTETECNICO(tecnico){
  const filtrosoporte=data.filter( item => item.cargo.toUpperCase().includes(tecnico));
  updateTableWithData(filtrosoporte);
};


});

