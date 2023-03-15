
<script src="js/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
    
function ObtenerPaciente(){
    var Paciente = document.getElementById("campo").value;
    
    if ( (Paciente === "")||(Paciente === " "))
    {
        $("#motivoText" ).prop("disabled", true);
        $("#padecimientoText" ).prop("disabled", true);
        $("#Peso" ).prop("disabled", true);
        $("#Talla" ).prop("disabled", true);
        $("#Temperatura" ).prop("disabled", true);
        $("#imc" ).prop("disabled", true);
        $("#Glucosa" ).prop("disabled", true);

        $("#sistólica" ).prop("disabled", true);
        $("#diastólica" ).prop("disabled", true);
        $("#cardiaca" ).prop("disabled", true);
        $("#respiratoria" ).prop("disabled", true);
        $("#DiagnosticoText" ).prop("disabled", true);

        
    }
    else if((Paciente != "")||(Paciente != " "))
    {   
        datos = { nombre: Paciente };
  $.ajax({
    url: "sacar_nombre.php",
    type: "POST",
    data: datos,
  }).done(function (respuesta) {
    if (respuesta.estado === "ok") {
      console.log(JSON.stringify(respuesta));
      
      var nombre = respuesta.nombre;
      var Apellido = respuesta.apellido;
      var Apellido2 = respuesta.apellido2;
      
      $("#nombre").val(nombre);
      $("#apellido_paterno").val(Apellido);
      $("#apellido_materno").val(Apellido2);
    }
  });

        
        $("#motivoText" ).prop("disabled", false);
        $("#padecimientoText" ).prop("disabled", false);
        $("#Peso" ).prop("disabled", false);
        $("#Talla" ).prop("disabled", false);
        $("#Temperatura" ).prop("disabled", false);
        $("#imc" ).prop("disabled", false);
        $("#Glucosa" ).prop("disabled", false);

        $("#sistólica" ).prop("disabled", false);
        $("#diastólica" ).prop("disabled", false);
        $("#cardiaca" ).prop("disabled", false);
        $("#respiratoria" ).prop("disabled", false);
        $("#DiagnosticoText" ).prop("disabled", false);
    }
}

function EvaluaFrecRes() 
{
     //FRECUENCIA RESPIRATORIA======================================================
    var Respiratoria2 = document.getElementById("respiratoria2");
    var ValRes = document.getElementById("respiratoria").value;
    var respi_Estado= "No información";

    if (ValRes >= 15 && ValRes<= 20)
    {
        respi_Estado="Normal";
        Respiratoria2.value = respi_Estado;
        Respiratoria2.style.backgroundColor = "lightgreen";
    }
    else if ((ValRes ==="") || (ValRes === 0))
    {
        respi_Estado= "No información";
        Respiratoria2.value = respi_Estado;
        Respiratoria2.style.backgroundColor = "lightgray";
    }
    else
    {
        respi_Estado="Inadecuada";
        Respiratoria2.value = respi_Estado;
        Respiratoria2.style.backgroundColor = "red";
    }     
}

function EvaluaTemp() 
{
    //TEMPERATURA ================================================== 
    var Temp2 = document.getElementById("Temperatura2");
    var ValTemp = document.getElementById("Temperatura").value;
    var Temp_Estado= "No información";

    if (ValTemp >= 36 && ValTemp<= 37)
    {
        Temp_Estado="Normal";
        Temp2.value = Temp_Estado;
        Temp2.style.backgroundColor = "lightgreen";
    }
    else if(ValTemp >= 37.1 && ValTemp <=38.5)
    {
        Temp_Estado= "Fiebre leve";
        Temp2.value = Temp_Estado;
        Temp2.style.backgroundColor = "red";
    }
    else if(ValTemp>=38.6)
    {
        Temp_Estado= "Fiebre alta";
        Temp2.value = Temp_Estado;
        Temp2.style.backgroundColor = "red";
    }
    else if ((ValTemp ==="") || (ValTemp === 0))
    {
        Temp_Estado= "No información";
        Temp2.value = Temp_Estado;
        Temp2.style.backgroundColor = "lightgray";
    }   
    else{
        Temp_Estado= "Inadecuada";
        Temp2.value = Temp_Estado;
        Temp2.style.backgroundColor = "red";
    }
}


function EvaluaPeso() 
{
    var p = document.getElementById("Peso").value;
    Peso = parseInt(p)
    //alert(Peso)
}

function EvaluaTalla() 
{
    var t = document.getElementById("Talla").value;
    Talla = (Number(t)/100)
    //alert(Talla)
}

function EvaluaIMC() 
{
    //I  M  C=======================================================
    document.getElementById("imc").addEventListener("keyup", function(e) 
    {
        if (e.keyCode === 17) {
        var IMC2 = document.getElementById("imc2");
        var ValIMC = document.getElementById("imc").value;
        var IMC_Estado = "No información";

        var IMC_Calculado = Peso/ ((Talla*Talla));
        //alert(IMC_Calculado)

        if (IMC_Calculado>= 18.5 && IMC_Calculado<= 24.9 )
        {
            IMC_Estado= IMC_Calculado +", Normal";
            IMC2.value = IMC_Estado;
            IMC2.style.backgroundColor = "lightgreen";
        }
        else if(IMC_Calculado>= 25 && IMC_Calculado<= 29.9 )
        {
            IMC_Estado=IMC_Calculado + ", Aumentado";
            IMC2.value = IMC_Estado;
            IMC2.style.backgroundColor = "yellow";
        }
        else if(IMC_Calculado>= 30 && IMC_Calculado<= 34.9 )
        {
            IMC_Estado=IMC_Calculado + ", Moderado";
            IMC2.value = IMC_Estado;
            IMC2.style.backgroundColor = "orange";
        }
        else if(IMC_Calculado>= 35 && IMC_Calculado<= 39.9 )
        {
            IMC_Estado=IMC_Calculado + ", Severo";
            IMC2.value = IMC_Estado;
            IMC2.style.backgroundColor = "red";
        }
        else if(IMC_Calculado>= 40 )
        {
            IMC_Estado= IMC_Calculado + ", Muy severo";
            IMC2.value = IMC_Estado;
            IMC2.style.backgroundColor = "red";
        }
        else if(IMC_Calculado < 18.5)
        {
            IMC_Estado= IMC_Calculado + ", Bajo";
            IMC2.value = IMC_Estado;
            IMC2.style.backgroundColor = "lightblue";
        }
        else if ((IMC_Calculado === 0))
    {
        Temp_Estado= "Inadecuado";
        Temp2.value = Temp_Estado;
        Temp2.style.backgroundColor = "lightgray";
    }  
        else{
            Temp_Estado= "No información";
            IMC2.value = IMC_Estado;
            IMC2.style.backgroundColor = "lightgray";
        }
        }
    }
    );
}
function EvaluaGluc() 
{
     //GLUCOSA ======================================================
    var Glucosa2 = document.getElementById("Glucosa2");
    var ValGluc = document.getElementById("Glucosa").value;
    var Gluc_Estado= "No información";

    if (ValGluc>= 1 && ValGluc <= 99)
    {
        Gluc_Estado="Normal";
        Glucosa2.value = Gluc_Estado;
        Glucosa2.style.backgroundColor = "lightgreen";
    }
    else if ((ValGluc>= 100 && ValGluc<= 125 ))
    {
        Gluc_Estado= "Prediabetes";
        Glucosa2.value = Gluc_Estado;
        Glucosa2.style.backgroundColor = "yellow";
    }
    else if ((ValGluc>= 126 ))
    {
        Gluc_Estado= "Diabetes";
        Glucosa2.value = Gluc_Estado;
        Glucosa2.style.backgroundColor = "Red";
    }
    else if ((ValGluc ==="") || (ValGluc === 0))
    {
        Gluc_Estado= "No información";
        Glucosa2.value = Gluc_Estado;
        Glucosa2.style.backgroundColor = "lightgray";
    }
    else
    {
        Gluc_Estado="Inadecuada";
        Glucosa2.value = Gluc_Estado;
        Glucosa2.style.backgroundColor = "red";
    }     
}



function EvaluaFrecCard() 
{ 
    var cardiaca2 = document.getElementById("cardiaca2");
    var PacienteID = document.getElementById("campo").value;
    var Valcardiaca = $("#cardiaca").val();
    var parametros = 
    {
      "Cardi": Valcardiaca,
      "PacienteCita": PacienteID
    };
    $.ajax(
        {
        data: parametros,
        url: 'FrecuenciaCardiaca.php',
        type: 'POST',
        dataType: "json",
    error: function (jqXHR, exception) 
    {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.n' + jqXHR.responseText;
        }
        alert(msg);
    },
    success: function(valores)
    {
        
            frec_cardi_Estado = valores.Frec;
            Color =  valores.Color;
            cardiaca2.value = frec_cardi_Estado;
            cardiaca2.style.backgroundColor = Color;
        }
    });

}

function EvaluaTenDias() 
{ 
    var Diastólica2 = document.getElementById("diastólica2");
    var PacienteID = document.getElementById("campo").value;
    //var ValDiastólica = document.getElementById("Diastólica").value;
    var ValDiastólica = $("#diastólica").val();
    var parametros = 
    {
      "Diast": ValDiastólica,
      "PacienteCita": PacienteID
    };
    $.ajax(
        {
        data: parametros,
        url: 'TensionDiastolica.php',
        type: 'POST',
        dataType: "json",
    error: function (jqXHR, exception) 
    {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.n' + jqXHR.responseText;
        }
        alert(msg);
    },
    success: function(valores)
    {
            
            diastol_Estado = valores.Diasto;
            Color =  valores.Color;
            Diastólica2.value = diastol_Estado;
            Diastólica2.style.backgroundColor = Color;
        }
    });

}

function EvaluaTenSisto() 
{ 
    var Sistólica2 = document.getElementById("sistólica2");
    var PacienteID = document.getElementById("campo").value;
    //var ValDiastólica = document.getElementById("Diastólica").value;
    var ValSistólica = $("#sistólica").val();
    var parametros = 
    {
      "Sist": ValSistólica,
      "PacienteCita": PacienteID
    };
    $.ajax(
        {
        data: parametros,
        url: 'TensionSistolica.php',
        type: 'POST',
        dataType: "json",
    error: function (jqXHR, exception) 
    {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.n' + jqXHR.responseText;
        }
        alert(msg);
    },
    success: function(valores)
    {
            Sistol_Estado = valores.Sistol;
            Color =  valores.Color;
            Sistólica2.value = Sistol_Estado;
            Sistólica2.style.backgroundColor = Color;
        }
    });

}

function Graficas() 
{ 
    $.ajax(
        {
        url: 'Graficas.php',
    error: function (jqXHR, exception) 
    {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.n' + jqXHR.responseText;
        }
        alert(msg);
    },
    success: function(valores)
    {
        alert("si se hizo")
        }
    });

}

</script>