<html>
<?php
$title = "Expediente Clinico ITSZaS";
require '../Menu/menu_cabecera.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="estilo_expediente_modificada2.css">
<script src="Obtener_Paciente.js"></script>
<style>
      #scroll2{
        overflow-x: scroll;
        overflow-y: hidden;       
      }
      
    </style>
<div class="aside3">
  <div id="pointer"></div>
  <h2 id="TextoAgenda" id="atras1">Expedientes</h2>
</div>
<div class="aside2">

  <form class="" action="" method="get">
    <div class="form first">
      <div class="fields">
        <input class="CajasText" id="nomb" type="text" name="Nombre" placeholder="Nombres">
      </div>
      <div class="fields">
        <input class="CajasText" id="pate" type="text" name="Paterno" placeholder="Ap. paterno">
      </div>
      <div class="fields">
        <input class="CajasText" id="mater" type="text" name="Materno" placeholder="Ap. materno">
      </div>
      <div class="fields">
        <select class="CajasText" id="sex" type="text" name="Sexo">
          <option value="" selected>Selecciona un Sexo</option>
          <option value="Hombre">Hombre</option>
          <option value="Mujer">Mujer</option>
        </select>
      </div>
      <div class="fields">
        <input class="CajasText" id="date" type="text" name="Control" placeholder="No. control"> 
      </div>
    </div>

    <div class="fields">
      <input  id="buton" class="bubbly-button" type="submit" name="enviar" value="Buscar">
    </div>
  </form>

</div>


<div class="container">

<form method="post" action="../Datos_Del_Paciente/Dat_Pac_Interfaz.php" >

  <form id="scroll2">
    <table class="rwd_auto">
      <thead>
        <tr>
          <th>No. control</th>
          <th>Nombre</th>
          <th>Apellido paterno</th>
          <th>Apellido materno</th>
          <th>Sexo</th>
          <th>Mostrar Mas...</th>
        </tr>
      </thead>
      <tbody>
        
      <?php 
    include  'Busqueda_Inteligente.php';
    ?>
      </tbody>
    </table>
  </form>
  </form>
</div>

</html>