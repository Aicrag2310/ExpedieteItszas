<?php
$title = "Expediente Clinico ITSZaS";

include('../Menu/menu_cabecera.php');
include '../Conexion_BD/Conexion.php';


?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <!--DATATABLES-->
  <script src="../Agenda/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../Agenda/jquery.dataTables.min.css" />


  <!----======== CSS ======== -->
  <link rel="stylesheet" href="config_estilo.css">
  <div class="aside3">
    <div id="pointer"></div>
    <h2 id="TextoAgenda" id="atras1">Configuración</h2>
  </div>
  <div class="aside 2">
    <?php
    ?>
  </div>

  <div class="container">
    <script src="Datos_Del_Paciente.js"></script>
    <style>
      #scroll {
        overflow-y: scroll;
        overflow-x: hidden;
      }
    </style>
    <?php
    #include 'Datos_Del_Paciente.php'
    ?>



    
      
        <table  id="tabla2">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido paterno</th>
              <th>Apellido materno</th>
              <th>Correo</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>

            <?php include('muestra_usuarios.php'); ?>

          </tbody>
        </table>
      
    
  </div>



  <div class="boton-modal">
    <label for="btn-modal">
      Nuevo usuario
    </label>
  </div>

  <input type="checkbox" id="btn-modal">

  <br>
  <br>
  <div id="respuesta"></div>
  <div id="respuesta2"></div>


  <div class="container-modal">
    <div class="content-modal">
      <h2>Agregar nuevo usuario</h2>
      <form action="">
        <div class="form first">
          <div class="details ID">

            <div class="fields">
              <div class="izquierda">
                <div class="input-field">
                  <label>Nombre</label>
                  <input type="text" id="nombre" placeholder="Ingrese su nombre" />
                </div>
                <div class="input-field">
                  <label>Apellido paterno</label>
                  <input type="text" id="paterno" placeholder="Ingrese su apellido paterno" />
                </div>
                <div class="input-field">
                  <label>Apellido materno</label>
                  <input type="text" id="materno" placeholder="Ingrese su apellido materno" />
                </div>
              </div>
              <div class="derecha">
                <div class="input-field">
                  <label>Usuario</label>
                  <input type="text" id="usuario" placeholder="Ingrese su usuario" />
                </div>
                <div class="input-field">
                  <label>Contraseña</label>
                  <input type="text" id="contrasena" placeholder="Ingrese su contraseña" />
                </div>
                <div class="input-field">
                  <label>Correo electrónico</label>
                  <input type="text" id="correo" placeholder="Ingrese su correo electrónico" />
                </div>
              </div>
            </div>
            <div>

            </div>
          </div>
        </div>

      </form>
      <div class="btn-guardaruser">
        <button id="guardarmodal" class="bubbly-button" style="top:57;">Guardar</button>
      </div>

      <div class="btn-cerrar">
        <label for="btn-modal">Cerrar</label>

      </div>
    </div>
    <label for="btn-modal" class="cerrar-modal"></label>
  </div>


  </body>
  <script>
  $(document).ready(function() {
    $("#tabla2").DataTable({
      language: {
        processing: "Tratamiento en curso...",
        search: "Buscar&nbsp;:",
        lengthMenu: "Agrupar de _MENU_ items",
        info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
        infoEmpty: "No existen datos.",
        infoFiltered: "(filtrado de _MAX_ elementos en total)",
        infoPostFix: "",
        loadingRecords: "Cargando...",
        zeroRecords: "No se encontraron datos con tu busqueda",
        emptyTable: "No hay datos disponibles en la tabla.",
        paginate: {
          first: "Primero",
          previous: "Anterior",
          next: "Siguiente",
          last: "Ultimo",
        },
        aria: {
          sortAscending: ": active para ordenar la columna en orden ascendente",
          sortDescending: ": active para ordenar la columna en orden descendente",
        },
      },
      scrollY: 400,
      lengthMenu: [
        [5, 10, 25],
        [5, 10, 25],
      ],
    });
  });
</script>

  <script>
    $('#guardarmodal').click(function() {
      var nombre = document.getElementById('nombre').value;
      var paterno = document.getElementById('paterno').value;
      var materno = document.getElementById('materno').value;
      var usuario = document.getElementById('usuario').value;
      var contrasena = document.getElementById('contrasena').value;
      var correo = document.getElementById('correo').value;
      var ruta = "nombre=" + nombre + "&paterno=" + paterno + "&materno=" + materno + "&usuario=" + usuario + "&contrasena=" + contrasena + "&correo=" + correo;
      $.ajax({
          url: 'agregar_usuario.php',
          type: 'POST',
          data: ruta,
        })
        .done(function(res) {
          $('#respuesta').html(res)
        })
    });
  </script>

  </html>