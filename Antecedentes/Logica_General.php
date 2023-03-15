<?php
#echo ("aun no entramos, estamos por entrar a logica General");
if (isset($_SESSION['nControl'])) {
  #echo ("ENtramos a Logica General");
  $NumControl = $_SESSION['nControl'];
  $_SESSION['nControl'] =  $NumControl;

  ############################# Actualizar Ginecoobstetricos #############################
  if (isset($_POST['GO'])) {
    #echo ("Entramos a  Enviar GO");
    $Consulta = $conexion->query("SELECT * from `ginecobstetrico`
                              WHERE No_Paciente = '$NumControl'");
    if ((mysqli_num_rows($Consulta) > 0)) {
      #echo ("Vamos a actualizar");
      $F = $_POST['FUM'];
      $Ci = $_POST['Ciclo'];
      $Mena = $_POST['Menarca'];
      $IV = $_POST['IVSA'];
      $Parejas = $_POST['Nparejas'];
      $Meno = $_POST['Menopausia'];
      $Emba = $_POST['Embarazos'];
      $Par = $_POST['Partos'];
      $Cesar = $_POST['Cesareas'];
      $Abor = $_POST['Abortos'];
      $FUP = $_POST['FUparto'];

      $consulta2 = "UPDATE ginecobstetrico 
          SET Fecha_Ultima_menstruacion = '$F',
          Ciclo = '$Ci',
          Edad_Inicio_Menstruacion = '$Mena',
          Edad_Promedio_Inicio_Sexo = '$IV',
          Num_Parejas = '$Parejas',
          Menopausia = '$Meno',
          Embarazos = '$Emba',
          Partos = '$Par',
          Cesareas = '$Cesar',
          Abortos = '$Abor',
          Fecha_Ultimo_Parto = '$FUP'
          where No_Paciente = $NumControl";
      $consulta3 = $conexion->query($consulta2);

      if ($consulta3) {
?>
        <script>
          Swal.fire(
            'Ginecobstetrico guardados correctamente',
            'Seguir editando antecedentes.',
            'success'
          ).then((result) => {
            /* Read more about handling dismissals below */

            window.location.href = "Antecedentes_Interfaz.php";

          })
        </script>
        <?php
      }
      else{
           echo mysqli_error($conexion);
      }
    } else {
      ############################# Insertar nuevos Ginecoobstetricos #############################
      if (isset($_POST['GO'])) {
        $F = $_POST['FUM'];
        $Ci = $_POST['Ciclo'];
        $Mena = $_POST['Menarca'];
        $IV = $_POST['IVSA'];
        $Parejas = $_POST['Nparejas'];
        $Meno = $_POST['Menopausia'];
        $Emba = $_POST['Embarazos'];
        $Par = $_POST['Partos'];
        $Cesar = $_POST['Cesareas'];
        $Abor = $_POST['Abortos'];
        $FUP = $_POST['FUparto'];

       # echo ("Vamos a insertar");

        $consulta2 = "INSERT into `ginecobstetrico` 
              (No_Paciente,Fecha_Ultima_menstruacion,
              Ciclo,Edad_Inicio_Menstruacion,
              Edad_Promedio_Inicio_Sexo,
              Num_Parejas,
              Menopausia,
              Embarazos,
              Partos,
              Cesareas,
              Abortos,
              Fecha_Ultimo_Parto) 
              VALUES ($NumControl,
              '$F',
              '$Ci',
              '$Mena',
              '$IV',
              '$Parejas',
              '$Meno',
              '$Emba',
              '$Par',
              '$Cesar',
              '$Abor',
              '$FUP')";
        echo $consulta3 = $conexion->query($consulta2);

        if ($consulta3) {
          echo ("insertamos GO");
        ?>
          <script>
              Swal.fire(
            'Ginecobstetrico guardados correctamente',
            'Seguir editando antecedentes.',
            'success'
          ).then((result) => {
            /* Read more about handling dismissals below */

            window.location.href = "Antecedentes_Interfaz.php";

          })

          </script>
        <?php

        } else {
            echo "Error de insertar";
        ?>
          <script>
            swal("Error", "Ocurrio un error", "error");
            window.setTimeout(function() {
              $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(this).remove();
              });
            }, 2300);
          </script>
        <?php
        }
      }
    }
  }
  ############################# Actualizar No Patologicos #############################
  if (isset($_POST['NP'])) {
    #echo ("Entramos a  Enviar GO");
    $Consulta = $conexion->query("SELECT * from `apnp`
                              WHERE No_Paciente = '$NumControl'");
    if ((mysqli_num_rows($Consulta) > 0)) {
      #echo ("Vamos a actualizar");
      $nacimiento =  $_POST['nacimiento'];
      $residencia =  $_POST['residencia'];
      $trabajo =  $_POST['trabajo'];
      $baños =  $_POST['baños'];
      $viajes =  $_POST['viajes'];
      $deportes =  $_POST['deportes'];
      $vivienda =  $_POST['vivienda'];
      $observaciones =  $_POST['observaciones'];
      #$control =  $$NumControl;

      $consulta2 = "UPDATE apnp 
          SET Lugar_Nacimiento='$nacimiento', 
          Duchas_semana ='$baños',
          Lugar_Residencia ='$residencia',
          Viajes_extranjero ='$viajes',
          Trabajo ='$trabajo',
          Deportes ='$deportes',
          Observaciones ='$observaciones',
          Vivienda_Rural ='$vivienda'
          
           WHERE No_Paciente='$NumControl'";
      $consulta3 = $conexion->query($consulta2);

      if ($consulta3) {
        ?>
        <script>
          Swal.fire(
            'No patológicos guardados correctamente',
            'Seguir editando antecedentes.',
            'success'
          ).then((result) => {
            /* Read more about handling dismissals below */

            window.location.href = "Antecedentes_Interfaz.php";

          })
        </script>
        <?php
      }
    } else {
      ############################# Insertar nuevos No Patologicos #############################
      if (isset($_POST['NP'])) {
        $nacimiento =  $_POST['nacimiento'];
        $residencia =  $_POST['residencia'];
        $trabajo =  $_POST['trabajo'];
        $baños =  $_POST['baños'];
        $viajes =  $_POST['viajes'];
        $deportes =  $_POST['deportes'];
        $vivienda =  $_POST['vivienda'];
        $observaciones =  $_POST['observaciones'];
        #$control =  $_POST['control'];

        #echo ("Vamos a insertar");

        $consulta2 = "INSERT INTO `apnp`
              (`No_Paciente`,
              `Lugar_Nacimiento`,
              `Duchas_semana`, 
              `Lugar_Residencia`,
              `Viajes_extranjero`,
              `Trabajo`, 
              `Deportes`, 
              `Observaciones`, 
              `Vivienda_Rural`) 
              VALUES
              ('$NumControl',
              '$nacimiento',
              '$baños',
              '$residencia',
              '$viajes',
              '$trabajo',
              '$deportes',
              '$observaciones',
              '$vivienda')";
        echo $consulta3 = $conexion->query($consulta2);

        if ($consulta3) {
          #echo ("insertamos GO");
        ?>
          <script>
            Swal.fire(
              'No patológicos guardados correctamente',
              'Seguir editando antecedentes.',
              'success'
            ).then((result) => {
              /* Read more about handling dismissals below */

              window.location.href = "Antecedentes_Interfaz.php";

            })
          </script>
        <?php

        } else {
        ?>
          <script>
            swal("Error", "Ocurrio un error", "error");
            window.setTimeout(function() {
              $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(this).remove();
              });
            }, 2300);
          </script>
        <?php
        }
      }
    }
  }
  ############################# Actualizar Heredo Familiares #############################
  if (isset($_POST['HF'])) {
    #echo ("Entramos a  Enviar HF");
    $Consulta = $conexion->query("SELECT * from `heredofamiliares`
                                 WHERE No_Paciente = '$NumControl'");
    if ((mysqli_num_rows($Consulta) > 0)) {
      #echo ("Vamos a actualizar");
      $Cardiopatias = $_POST['cardio'];
      $Trastornos_psiquiatricos = $_POST['psi'];
      $Enfermedades_respiratorias = $_POST['respi'];
      $Hepatopatias = $_POST['hepato'];
      $Alergias = $_POST['alerg'];
      $Enfermedades_endocrinas = $_POST['endo'];
      $Enfermedades_genéticas = $_POST['gen'];
      $Enfermedades_neurologicas = $_POST['neuro'];
      $Dermatologicas= $_POST['derma'];
      $Articulaciones_Huesos= $_POST['artic'];
      $Renales= $_POST['rena'];
      $Gastrointestinales= $_POST['gastro'];
      $Ginecologicos= $_POST['gine'];

      #$control =  $$NumControl;

      $consulta2 = "UPDATE heredofamiliares 
             SET Texto_Cardio= '$Cardiopatias' , 
             Texto_TrastornosPsi= '$Trastornos_psiquiatricos',
             Texto_EnfermedadesRes= '$Enfermedades_respiratorias',
             Texto_Hepatopatias= '$Hepatopatias',
             Texto_Alergias= '$Alergias',
             Texto_EnfermedadesEndo= '$Enfermedades_endocrinas',
             Texto_EnfermedadesGen= '$Enfermedades_genéticas',
             Texto_EnfermedadesNeuro= '$Enfermedades_neurologicas', 
             Texto_Derma = '$Dermatologicas',
            Texto_Articulaciones_Huesos= '$Articulaciones_Huesos',
            Texto_Renales = '$Renales',
            Texto_Gastrointestinales = '$Gastrointestinales',
            Texto_Ginecologicos = '$Ginecologicos'

             WHERE No_Paciente='$NumControl'";

      $consulta3 = $conexion->query($consulta2);

      if ($consulta3) {
        #echo "se actualizo HF"
        ?>
        <script>
            Swal.fire(
            'Heredofamiliares guardados correctamente',
            'Seguir editando antecedentes.',
            'success'
          ).then((result) => {
            /* Read more about handling dismissals below */

            window.location.href = "Antecedentes_Interfaz.php";

          })

        </script>
        <?php
      }
    } else {
      ############################# Insertar nuevos Heredo Familiares #############################
      if (isset($_POST['HF'])) {
        $Cardiopatias = $_POST['cardio'];
        $Trastornos_psiquiatricos = $_POST['psi'];
        $Enfermedades_respiratorias = $_POST['respi'];
        $Hepatopatias = $_POST['hepato'];
        $Alergias = $_POST['alerg'];
        $Enfermedades_endocrinas = $_POST['endo'];
        $Enfermedades_genéticas = $_POST['gen'];
        $Enfermedades_neurologicas = $_POST['neuro'];
        $Dermatologicas= $_POST['derma'];
        $Articulaciones_Huesos= $_POST['artic'];
        $Renales= $_POST['rena'];
        $Gastrointestinales= $_POST['gastro'];
        $Ginecologicos= $_POST['gine'];
  

        #$control =  $_POST['control'];

        echo ("Vamos a insertar");

        $consulta2 = "INSERT INTO `heredofamiliares`
                 (`No_Paciente`,
                 `Texto_Cardio`, 
                 `Texto_TrastornosPsi`, 
                 `Texto_EnfermedadesRes`, 
                 `Texto_Hepatopatias`, 
                 `Texto_Alergias`, 
                 `Texto_EnfermedadesEndo`, 
                 `Texto_EnfermedadesGen`, 
                 `Texto_EnfermedadesNeuro`,
                 `Texto_Derma`,
                  `Texto_Articulaciones_Huesos`,
                  `Texto_Renales`,
                  `Texto_Gastrointestinales`,
                  `Texto_Ginecologicos`) 
                 VALUES
                     ('$NumControl',
                     '$Cardiopatias',
                     '$Trastornos_psiquiatricos',
                     '$Enfermedades_respiratorias',
                     '$Hepatopatias',
                     '$Alergias',
                     '$Enfermedades_endocrinas',
                     '$Enfermedades_genéticas',
                     '$Enfermedades_neurologicas',
                     '$Dermatologicas',
                      '$Articulaciones_Huesos',
                      '$Renales',
                      '$Gastrointestinales',
                      '$Ginecologicos'
                     )";
        echo $consulta3 = $conexion->query($consulta2);

        if ($consulta3) {
          echo ("insertamos GO");
        ?>
          <script>
            Swal.fire(
            'Heredofamiliares guardados correctamente',
            'Seguir editando antecedentes.',
            'success'
          ).then((result) => {
            /* Read more about handling dismissals below */

            window.location.href = "Antecedentes_Interfaz.php";

          })
          </script>
        <?php

        } else {
        ?>
          <script>
            swal("Error", "Ocurrio un error", "error");
            window.setTimeout(function() {
              $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(this).remove();
              });
            }, 2300);
          </script>
        <?php
        }
      }
    }
  }
  ############################# Actualizar Personales Patologicos #############################
  if (isset($_POST['PP'])) {
    #echo ("Entramos a  Enviar HF");
    $Consulta = $conexion->query("SELECT * FROM `personales_patologicos` 
                                    WHERE No_Paciente='$NumControl'");

    if ((mysqli_num_rows($Consulta) > 0)) {
      #echo ("Vamos a actualizar");
      //echo("hols");
      #$numpaciente = $_POST["id_paciente"];
      //echo($numpaciente);
      $infancia = $_POST["infancia"];
      //echo($infancia);
      $secuelas = $_POST["secuelas"];
      //echo($secuelas);
      $hospitalizaciones = $_POST["hospitalizaciones"];
      // echo($hospitalizaciones);
      $quirurgicos = $_POST["quirurgicos"];
      //echo($quirurgicos);
      $transfuciones = $_POST["transfuciones"];
      //echo($transfuciones);
      $fracturas = $_POST["fracturas"];
      //echo($fracturas);
      $traumatismo = $_POST["traumatismo"];
      //echo($traumatismo);
      $otraenfe = $_POST["otraenfe"];
      //echo($otraenfe);

      $consulta2 = "UPDATE `personales_patologicos` 
             SET `Enf_Infancia`='$infancia',
             `Quirurgicos`='$quirurgicos',
             `Traumatismo`='$traumatismo',
             `Secuelas`='$secuelas',
             `Transfucionoes`='$transfuciones',
             `Hospitalizaciones`='$hospitalizaciones',
             `Fracturas`='$fracturas',
             `Otra_enfermedad`='$otraenfe' 
             WHERE No_Paciente='$NumControl'";

      $consulta3 = $conexion->query($consulta2);

      if ($consulta3) {
        #echo "se actualizo HF"
        ?>
        <script>
            Swal.fire(
            'Patológicos guardados correctamente',
            'Seguir editando antecedentes.',
            'success'
          ).then((result) => {
            /* Read more about handling dismissals below */

            window.location.href = "Antecedentes_Interfaz.php";

          })

        </script>
        <?php
      }
    } else {
      ############################# Insertar nuevos Personales Patologicos #############################
      if (isset($_POST['PP'])) {
        //echo("hols");

        //echo($numpaciente);
        $infancia = $_POST["infancia"];
        //echo($infancia);
        $secuelas = $_POST["secuelas"];
        //echo($secuelas);
        $hospitalizaciones = $_POST["hospitalizaciones"];
        // echo($hospitalizaciones);
        $quirurgicos = $_POST["quirurgicos"];
        //echo($quirurgicos);
        $transfuciones = $_POST["transfuciones"];
        //echo($transfuciones);
        $fracturas = $_POST["fracturas"];
        //echo($fracturas);
        $traumatismo = $_POST["traumatismo"];
        //echo($traumatismo);
        $otraenfe = $_POST["otraenfe"];
        //echo($otraenfe);
        #echo ("Vamos a insertar");

        $consulta2 = "INSERT INTO `personales_patologicos`
                 (`No_Paciente`, 
                 `Enf_Infancia`, 
                 `Quirurgicos`, 
                 `Traumatismo`, 
                 `Secuelas`, 
                 `Transfucionoes`, 
                 `Hospitalizaciones`, 
                 `Fracturas`, 
                 `Otra_enfermedad`) 
                 VALUES ('$NumControl',
                 '$infancia',
                 '$quirurgicos',
                 '$traumatismo',
                 '$secuelas',
                 '$transfuciones',
                 '$hospitalizaciones',
                 '$fracturas',
                 ' $otraenfe')";
        $consulta3 = $conexion->query($consulta2);

        if ($consulta3) {
          #echo ("insertamos GO");
        ?>
          <script>
             Swal.fire(
            'Patológicos guardados correctamente',
            'Seguir editando antecedentes.',
            'success'
          ).then((result) => {
            /* Read more about handling dismissals below */

            window.location.href = "Antecedentes_Interfaz.php";

          })
          </script>
        <?php

        } else {
        ?>
          <script>
            swal("Error", "Ocurrio un error", "error");
            window.setTimeout(function() {
              $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(this).remove();
              });
            }, 2300);
          </script>
<?php
        }
      }
    }
  }
}
