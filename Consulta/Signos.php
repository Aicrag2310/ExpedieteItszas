<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/actualizar.js"></script>
<script src="js/jquery-3.6.1.min.js"></script>
<div>
    <div>
        <h2>Buscar paciente</h2>
        <label for="campo">Buscar:</label>
        <?php include 'buscar_pacientes.php';?>
    </div>

    <div>
        <label for="nombre">Paciente</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" disabled>
        <input type="text" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido paterno" disabled>
        <input type="text" name="apellido_materno" id="apellido_materno" placeholder="Apellido materno" disabled>
    </div>
</div>

<div>
    <div class="TablasEnLinea">
        <div id="motivo">
            <h5>Ingrese motivo de consulta</h5>
            <textarea id="motivoText" name="motivo" placeholder="Ingrese motivo..." disabled></textarea>
        </div>

        <div id="padecimiento">
            <h5>Ingrese exploración física</h5>
            <textarea id="padecimientoText" name="padecimiento" placeholder="Ingrese exploración física..." disabled></textarea>
        </div>
    </div>
</div>
<div id="ApartadoSignos">
    <div>
        <?php
        include("EvaluarSignos.php");
        ?>
        <br>
        <br>
        <h2>Agregar signos vitales</h2>

        <div class="fields">
            <div class="izquierda">
                <div class="input-field">
                    <label>Peso (kg)</label>
                    <input  type="number" id="Peso" name="Peso" onkeyup="EvaluaPeso();" placeholder="Ingrese su peso" disabled />
                </div>
                <div class="input-field">
                    <label>Altura (cm)</label>
                    <input  type="number" id="Talla" name="Talla" onkeyup="EvaluaTalla();" placeholder="Ingrese su altura" disabled />
                </div>
                <div class="input-field">
                    <label>IMC (Necesita Peso y Altura)</label>
                    <input type="text" id="imc" name="imc" onkeypress="return ((event.charCode == 17 ))" onkeyup="EvaluaIMC();" placeholder="Presiona CTRL 2 veces para calcular" />
                    <input type="text" id="imc2" value="" disabled>
                </div>
                <div class="input-field">
                    <label>Temperatura</label>
                    <input required type="number" id="Temperatura" name="Temperatura" onkeyup="EvaluaTemp();" placeholder="Ingrese su temperatura" disabled />
                    <input type="text" id="Temperatura2" value="" disabled>
                </div>
                <div class="input-field">
                    <label>Glucosa</label>
                    <input  type="number" id="Glucosa" name="Glucosa" onkeyup="EvaluaGluc();" placeholder="Ingrese su Glucosa" disabled />
                    <input type="text" id="Glucosa2" value="" disabled>
                </div>

            </div>

            <div class="derecha">

                <div class="input-field">
                    <label>Tensión sistólica</label>
                    <input required type="number" id="sistólica" name="sistólica" onkeyup="EvaluaTenSisto();" placeholder="Ingrese su tensión sistólica" disabled />
                    <input type="text" id="sistólica2" value="" disabled>
                </div>
                <div class="input-field">
                    <label>Tensión diastólica</label>
                    <input required type="number" id="diastólica" name="diastólica" onkeyup="EvaluaTenDias();" placeholder="Ingrese su tensión diastólica" disabled />
                    <input type="text" id="diastólica2" value="" disabled>
                </div>
                <div class="input-field">
                    <label>Frecuencia cardiaca</label>
                    <input required type="number" id="cardiaca" name="cardiaca" onkeyup="EvaluaFrecCard();" placeholder="Ingrese su frecuencia cardiaca" disabled />
                    <input type="text" id="cardiaca2" value="" disabled>
                </div>
                <div class="input-field">
                    <label>Frecuencia respiratoria</label>
                    <input required type="number" id="respiratoria" name="respiratoria" onkeyup="EvaluaFrecRes();" placeholder="Ingrese su frecuencia respiratoria" disabled />
                    <input type="text" id="respiratoria2" value="" disabled>
                </div>
            </div>

            <!--  <button type="button" id="guardarmodal">Guardar Signos</button> -->

        </div>
    </div>
    <p class="broken"></p>

</div>