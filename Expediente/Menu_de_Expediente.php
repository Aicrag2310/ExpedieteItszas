<html>
<?php
$title = "Expediente Clinico ITSZaS";
require '../Menu/menu_cabecera.php';
include 'Menu_Clic_Derecho.php'
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="estilo_expediente_modificada2.css">
<style>
      #scroll2{
        overflow-x: scroll;
        overflow-y: hidden;       
      }
      
    </style>

<div class="aside3">
  <div id="pointer"></div>
  <h2 id="TextoAgenda" id="atras1">Acciones del Expediente</h2>
</div>
<div class="aside2">
<?php
include 'Opciones_Defecto.php'
?>
</div>

</html>