<?php
$title="Registro de paciente";

include ('../Menu/menu_cabecera.php');
?>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="estilo_registro_paciente.css" />

    <!----======== JS ======== -->
    <script src="js_nuevo_paciente.js"></script>
    <title>Registro de paciente</title>
  </head>
  <body>
      <!-- CODIGO PARA EL SCROLLBAR-->
    <style>
      #scroll {
        overflow-y: scroll;
        overflow-x: hidden;
      }
    </style>
    <!-- DIVISION PARA MANIPULAR EL FORMULARIO-->
    <div class="container">
      <header>Registro de nuevo paciente</header>

      <form action="#" id="scroll">
        <div class="form first">
          <div class="details personal">
            <span class="title">Datos personales</span>

            <div class="fields">
              <div class="input-field">
                <label>Nombre completo</label>
                <input type="text" placeholder="Ingresa tu nombre" required />
              </div>

              <div class="input-field">
                <label>Curp</label>
                <input type="text" placeholder="Ingresa tu curp" required />
              </div>

              <div class="input-field">
                <label>Fecha de nacimiento</label>
                <input
                  type="date"
                  placeholder="Ingresa tu fecha de nacimiento"
                  required
                />
              </div>
              <div class="input-field">
                <label>Edad</label>
                <input type="number" placeholder="Ingresa tu edad" required />
              </div>

              <div class="input-field">
                <label>Genero</label>
                <select required>
                  <option disabled selected>Seleciona tu genero</option>
                  <option>Masculino</option>
                  <option>Femenino</option>
                  <option>Otro</option>
                </select>
              </div>

              <div class="input-field">
                <label>Estado Civil</label>
                <select required>
                  <option disabled selected>Seleciona tu estado civil</option>
                  <option>Casado</option>
                  <option>Soltero</option>
                  <option>Otro</option>
                </select>
              </div>
            </div>
          </div>  
          <div class="details ID">
            <span class="title">Detalles de expediente</span>
            <div class="fields">
              <div class="input-field">
                <label>Fólio</label>
                <input type="number" placeholder="Ingese su Fólio" required />
              </div>
              <div class="input-field">
                <label>Numero de paciente</label>
                <input type="number" placeholder="Ingese su Numero de paciente" required />
              </div>
              <div class="input-field">
                <label>Fecha de alta</label>
                <input
                  type="date"
                  placeholder="Ingresa tu fecha de alta"
                  required
                />
              </div>
            


          </div>

          <div class="details ID">
            <span class="title">Detalles de identidad</span>

            <div class="fields">
              <div class="input-field">
                <label>Ocupación</label>
                <input type="text" placeholder="Ingese su ocupación" required />
              </div>
              <div class="input-field">
                <label>Escolaridad</label>
                <select required>
                  <option disabled selected>Selecciona tu escolaridad</option>
                  <option>Primaria</option>
                  <option>Secundaria</option>
                  <option>Preparatoria</option>
                  <option>Universidad</option>
                  <option>Otro</option>
                </select>
              </div>

              <div class="input-field">
                <label>Religión</label>
                <input type="text" placeholder="Ingresa tu Religión" required />
              </div>

              <div class="input-field">
                <label>Entidad</label>
                <select name="estado" , required>
                  <option value="no">Seleccione uno...</option>
                  <option value="Aguascalientes">Aguascalientes</option>
                  <option value="Baja California">Baja California</option>
                  <option value="Baja California Sur">
                    Baja California Sur
                  </option>
                  <option value="Campeche">Campeche</option>
                  <option value="Chiapas">Chiapas</option>
                  <option value="Chihuahua">Chihuahua</option>
                  <option value="CDMX">Ciudad de México</option>
                  <option value="Coahuila">Coahuila</option>
                  <option value="Colima">Colima</option>
                  <option value="Durango">Durango</option>
                  <option value="Estado de México">Estado de México</option>
                  <option value="Guanajuato">Guanajuato</option>
                  <option value="Guerrero">Guerrero</option>
                  <option value="Hidalgo">Hidalgo</option>
                  <option value="Jalisco">Jalisco</option>
                  <option value="Michoacán">Michoacán</option>
                  <option value="Morelos">Morelos</option>
                  <option value="Nayarit">Nayarit</option>
                  <option value="Nuevo León">Nuevo León</option>
                  <option value="Oaxaca">Oaxaca</option>
                  <option value="Puebla">Puebla</option>
                  <option value="Querétaro">Querétaro</option>
                  <option value="Quintana Roo">Quintana Roo</option>
                  <option value="San Luis Potosí">San Luis Potosí</option>
                  <option value="Sinaloa">Sinaloa</option>
                  <option value="Sonora">Sonora</option>
                  <option value="Tabasco">Tabasco</option>
                  <option value="Tamaulipas">Tamaulipas</option>
                  <option value="Tlaxcala">Tlaxcala</option>
                  <option value="Veracruz">Veracruz</option>
                  <option value="Yucatán">Yucatán</option>
                  <option value="Zacatecas">Zacatecas</option>
                </select>
              </div>

              <div class="input-field">
                <label>Municipio</label>
                <input
                  type="text"
                  placeholder="Ingresa tu municipio"
                  required
                />
              </div>
              <div class="input-field">
                <label>Código Postal</label>
                <input
                  type="text"
                  placeholder="Ingresa tu Código Postal"
                  required
                />
              </div>

              <div class="input-field">
                <label>Colonia</label>
                <input type="text" placeholder="Ingresa tu colonia" required />
              </div>
              <div class="input-field">
                <label>Calle</label>
                <input type="text" placeholder="Ingresa tu calle" required />
              </div>
              <div class="input-field">
                <label>Numero</label>
                <input type="number" placeholder="Ingresa tu numero" required />
              </div>
              <div class="input-field">
                <label>Numero de padre</label>
                <input type="number" placeholder="Ingresa numero" required />
              </div>
              <div class="input-field">
                <label>Numero de madre</label>
                <input type="number" placeholder="Ingresa numero" required />
              </div>
              <div class="input-field">
                <label>Numero de emergencia</label>
                <input type="number" placeholder="Ingresa tu numero emergencia" required />
              </div>
              <div class="input-sel_foto">
                <label>Subir foto</label>
    
                <input type="file" required />
              </div>

              <div class="input-imagen">
                <label>IMAGEN</label>
                
              </div>
            </div>
          </div>



          <button class="nextBtn" id="boton">
            <span class="btnText">Siguiente</span>
            <i class="uil uil-navigator"></i>
          </button>
        </div>
      </form>
    </div>

  </body>
</html>
