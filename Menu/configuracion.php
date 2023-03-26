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
    <script src=""></script>
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
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Apellido paterno</th>
              <th>Apellido materno</th>
              <th>Cedula</th>
              <th>Especialidad</th>
              <th>Correo</th>
              <th>Contraseña</th>
              <th>Logo Universiadad</th>
              <th>Acciones</th>
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
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form first">
          <div class="details ID">

            <div class="fields">
              <div class="izquierda">

                <div class="input-field">
                  <label>Nombre</label>
                  <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required/>
                </div>

                <div class="input-field">
                  <label>Apellido paterno</label>
                  <input type="text" id="paterno" name="paterno" placeholder="Ingrese su apellido paterno" required/>
                </div>

                <div class="input-field">
                  <label>Apellido materno</label>
                  <input type="text" id="materno" name="materno" placeholder="Ingrese su apellido materno" required/>
                </div>

                <div class="input-field">
                  <label>Cedula</label>
                  <input type="text" id="cedula" name="cedula" placeholder="Ingrese su cedula" required/>
                </div>

              </div>
              <div class="derecha">

                <div class="input-field">
                  <label>Usuario</label>
                  <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario" required/>
                </div>

                <div class="input-field">
                  <label>Contraseña</label>
                  <input type="text" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña" required/>
                </div>

                <div class="input-field">
                  <label>Correo electrónico</label>
                  <input type="text" id="correo" name="correo" placeholder="Ingrese su correo electrónico" required/>
                </div>

                <div class="input-field">
                  <label>Especialidad</label>
                  <input type="text" id="especialidad" name="especialidad" placeholder="Ingrese su especialidad" required/>
                </div>

              </div>
              <div class="input-field">
              <label>Logo de universidad en donde se egreso</label>
                <input type="file" id="FotoUni" name="FotoUni" required accept="image/png, .jpeg, .jpg">/>
                <!--<input type="submit" name="submit" value="UPLOAD"/>-->
              </div>
              
            </div>
            <div>

            </div>
          </div>
        </div>
        <div class="btn-guardaruser">
        <button id="guardarmodal" class="bubbly-button" style="top:57;" name="guardarmodal" type="submit">Guardar</button>
      </div>
      <div class="btn-cerrar">
        <label for="btn-modal">Cerrar</label>
      </div>
    </div>
    <label for="btn-modal" class="cerrar-modal"></label>
  </div>
      </form>
      

      


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
<?php 
  if (isset($_POST['guardarmodal'])){

    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $correo = $_POST['correo'];
    $cedula = $_POST['cedula'];
    $especialidad = $_POST['especialidad'];

    $image = $_FILES['FotoUni']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($image));

    $repetido=0;
    $consulta=$conexion->query("SELECT `Nombre`, 
    `Apellido1`, 
    `Apellido2`, 
    `Nombre_Usuario`, 
    `Contrasena`, 
    `Correo` 
    FROM `usuarios`");
    ?>
      <?php
      while ($row=$consulta->fetch_array()) {
        if ($usuario==$row['Nombre_Usuario']){
          $repetido=$repetido+1;
          ?>
        <script>
          Swal.fire({
          icon: 'error',
          title: 'El usuario ya existe',
          text: 'Ingresa un nuevo nombre de usuario',    
    })
      </script> <?php

        }
      }

      if ($repetido==0){


    $insert = $conexion->query("INSERT INTO `usuarios`(`Nombre`, 
                                                      `Apellido1`, 
                                                      `Apellido2`, 
                                                      `Nombre_Usuario`, 
                                                      `Contrasena`, 
                                                      `Correo`, 
                                                      `Cedula`, 
                                                      `Especialidad`,
                                                      `EscudoUniversidad`) 
                                VALUES ('$nombre',
                                '$paterno',
                                '$materno',
                                '$usuario',
                                '$contrasena',
                                '$correo',
                                '$cedula',
                                '$especialidad',
                                '$imgContenido');");

    if ($insert) {
    ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Usuario agregado correctamente',
          showConfirmButton: false,
          timer: 1500
        }).then((result) => {
          window.location.href = "configuracion.php";

        })

      </script> <?php

              } else {
                echo "ALgo";
                echo mysqli_error($conexion);
                ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Error al agregar usuario',
          showConfirmButton: false,
          timer: 1500
        })
      </script> <?php
          }
  }
}

    ?>

  </html>