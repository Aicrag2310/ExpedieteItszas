<html>
<?php
$title = "Expediente Clinico ITSZaS";
require '../Menu/menu_cabecera.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="Estilo_Form_Expediente.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="aside3">
  <div id="pointer"></div>
  <h2 id="TextoAgenda" id="atras1">Expedientes</h2>
</div>
<div class="asidemaster">
  <div class="aside2">
    <div class="container">
      <form action="#" id="scroll2">
      <table class="rwd_auto">
          <thead>
            <tr>
              <th>No. Paciente</th>  
            </tr>
          </thead>
          <tbody>
          <?php 
        ?>
          </tbody>
        </table>
      </form>
    </div>
  </div>

  <div class="aside">
    <div class="container">
        <?php 
          include "Menu_De_Expediente.php"
          ?>
    </div> 
  </div> 
</div>  
</html>