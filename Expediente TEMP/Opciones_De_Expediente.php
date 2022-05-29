<link rel="stylesheet" href="Estilo_Menu_Expediente.css">

<div class ="navExp" align="center">
  <!--Boton-->
  <a class="menu-magenta">
      <div class="boton-modal">
            <label for="btn-modal">
              Datos del Paciente
            </label>
        </div>
  </a>
    <!--Fin de Boton-->
    <!--Boton-->
    <a>
      <div class="boton-modal">
          <label for="btn-modal">
          Tratamiento
          </label>
      </div>
    </a>
    <!--Fin de Boton-->
      <!--Boton-->
      <a>
        <div class="boton-modal">
          <label for="btn-modal">
              Notas de evolución
          </label>
        </div>
      </a>
    <!--Fin de Boton-->
    <!--Boton-->
    <a>
      <div class="boton-modal">
          <label for="btn-modal">
          Antecedentes
          </label>
      </div>
    </a>
    <!--Fin de Boton-->
    <!--Boton-->
    <a>
      <div class="boton-modal">
          <label for="btn-modal">
          Historial del Paciente
          </label>
      </div>
    </a>
    <!--Fin de Boton-->
  <div class="animation start-home"></div>
  <!--Ventana Modal-->
  <input type="checkbox" id="btn-modal">
    <div class="containerEvo">
        <div class="content-modal">
        <header>Notas de evolución, consulta --fecha-- de alejandro</header>
            <form action="#" id="form">
                <textarea id="text" NAME="texto" class=estilotextarea3 cols="90" rows="20">El paciente Alejandro...</textarea>
                <button id="entrar">Guardar</button>
                <button id="limpiar">Limpiar</button>
            </form>
        </div>
        <label for="btn-modal" class="cerrar-modal"></label>
    </div>
    <!--Fin de Ventana Modal-->
</div>