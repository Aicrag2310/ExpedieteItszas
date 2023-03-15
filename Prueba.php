<html class="html">
    <form method="POST">
<div class="input-field">
<label>Número</label>
<input type="text" name="Numero" placeholder="Ingresa tu numero"?> />
</div>
<button class="nextBtn" id="boton" type="submit" name="submit">
</form>
<?php
  if (isset($_POST['submit'])){
    ############################# Datos Generales #############################
    $N = $_POST['Numero'];
    echo $N;
  }
    ?>
</html>