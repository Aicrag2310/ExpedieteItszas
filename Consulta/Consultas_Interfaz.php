<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
#LE COLOCAMOS EL TITULO
$title = "Expediente Clinico ITSZaS";
#IMPORTAMOS EL MENU LATERAL
require('../Menu/menu_cabecera.php');




?>
<html>


<head>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="js/jquery-3.6.1.min.js"></script>
        <link rel="stylesheet" href="css/estilos_modal.css">
        <link rel="stylesheet" href="css/consulta.css">
        <script src="js/reloj.js"></script>
        <script src="peticiones.js"></script>

    </head>

    <style>
        #scroll {
            overflow-y: scroll;
            overflow-x: hidden;
        }
    </style>
    <div class="aside3">
        <div id="pointer">
            <div id="reloj"> 00 : 00 : 00 </div>
        </div>
        <h2 id="TextoAgenda" id="atras1">Nueva consulta</h2>

    </div>

<body>
    <div class="containerDat">
        <form action="" method="POST" id="scroll">
            <div id="ParteSignos">
                <div>
                    <div>
                        <?php
                        include("Signos.php");
                        ?>
                    </div>

                    <div id="Diagnostico">
                        <h5>Ingrese diagnóstico</h5>
                        <textarea id="DiagnosticoText" name="Diagnostico" placeholder="Ingrese diagnóstico..." disabled></textarea>
                    </div>

                    <script src="js/peticiones.js"></script>
                    <?php
                    include('crea_consulta.php');
                    ?>
                    <div>
                    <button class="bubbly-button" type="submit" name="guardaconsulta">Guardar</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
        
</body>

</html>