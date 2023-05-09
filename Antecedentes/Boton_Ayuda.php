<html>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Montserrat', sans-serif;
}

.wrapper{
	width: 100%;
	height: 100vh;
}

.wrapper .modal_btn{
	background: #647374;
	color: #fff;
	padding: 15px;
	border-radius: 5px;
	cursor: pointer;
	position: absolute;
	top: 0%;
	left: 105%;
	transform: translate(-50%,-50%);
}

.wrapper .modal_btn:hover{
	background: #7b8d8f;
}

.wrapper .modal_box{
	position: relative;
	top: -100px;
	width: 100%;
	height: 100%;
	z-index: 999;
	display: none;
}

.wrapper .modal_box .modal_bg_shadow{
	position: fixed;
	top: 0;
	left: 0;
	background: #000;
	opacity: 0.5;
	width: 100%;
	height: 100%;
	z-index: -1;
}

.wrapper .modal_box .modal_box_wrap{
	width: 550px;
	height: 800px;
	background: #fff;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	border-radius: 5px;
}
.wrapper .modal_box .modal_box_wrap .modal_close{
	position: absolute;
	top: -25px;
	right: -25px;
	width: 50px;
	height: 50px;
	background: #363d4e;
	border-radius: 50%;
	cursor: pointer;
}

.wrapper .modal_box .modal_box_wrap .modal_close:before,
.wrapper .modal_box .modal_box_wrap .modal_close:after{
	content: "";
	position: absolute;
	top: 25px;
	left: 13px;
	width: 25px;
	height: 2px;
	background: #fff;
}

.wrapper .modal_box .modal_box_wrap .modal_close:before{
	transform: rotate(45deg);
}

.wrapper .modal_box .modal_box_wrap .modal_close:after{
	transform: rotate(130deg);
}

.wrapper .modal_box .modal_box_wrap .modal_header{
	padding: 20px;
	border-bottom: 1px solid #e0e0e0;
	height: 60px;
	font-size: 22px;
}	


.wrapper .modal_box .modal_box_wrap .modal_body{
	padding: 20px;
	border-bottom: 1px solid #e0e0e0;
	height: calc(150px - 200px);
	font-size: 14px;
	line-height: 21px;
}

.wrapper .modal_box .modal_box_wrap .modal_footer{
	padding: 20px;
	height: 60px;
}

.wrapper .modal_footer .modal_btn_grp{
	display: flex;
	justify-content: flex-end;
	align-items: center;
	height: 100%;
}

.wrapper .modal_footer .modal_btn_grp .btn{
	width: 100px;
	padding: 10px;
	border-radius: 5px;
	text-align: center;
	cursor: pointer;
}

.wrapper .modal_footer .modal_btn_grp .btn.btn_confirm{
	margin-left: 10px;
	background: #363d4e;
	color: #fff;
}

.wrapper .modal_footer .modal_btn_grp .btn.btn_cancel{
	border: 1px solid #363d4e;
	color: #363d4e;
}

.wrapper .modal_footer .modal_btn_grp .btn.btn_cancel:hover{
	background: #363d4e;
	color: #fff;
}

.wrapper .modal_footer .modal_btn_grp .btn:hover{
	background: #7b8d8f;
}

.wrapper .modal_box.active{
	display: block;
}


@media (max-width: 750px) {
	
.wrapper .modal_btn{
	background-color: blue;
}

.wrapper .modal_box .modal_box_wrap{
	width: 450px;
	height: 400px;

}
    
}

@media (max-width: 550px) {
	.wrapper .modal_btn{
		background-color: orange;
		top: -80px;
	}
	.wrapper .modal_box .modal_box_wrap{
		width: 310px;
		height: 500px;
	
	}
}
</style> 
<script>
    $(document).ready(function() {
      $(".modal_btn").click(function() {
        $(".modal_box").addClass("active");
      });

      $(".modal_close").click(function() {
        $(".modal_box").removeClass("active");
      });
    });
  </script>

    <div class="wrapper">
      <div class="modal_btn">
        Ayuda
      </div>

      <div class="modal_box">
        <div class="modal_bg_shadow"></div>
        <div class="modal_box_wrap">
          <div class="modal_close"></div>
          <div class="modal_header">
            Ayuda
          </div>
          <div class="modal_body">

          Enfermedad Infecta contagiosa:<br>Exantemáticas: como varicela, rubeola, sarampión, 
          escarlatina, exantema súbito, enfermedad mano pie boca <br> Parasitarias: amibiasis, 
          giardiasis, cisticercosis, taeniasis, uncinarias etc. <br><br>
          Enfermedad Crónica degenerativa: <br> Ejemplos comunes de estas son obesidad, Diabetes 
          mellitus, Hipertensión arterial.<br><br>
          Traumatológicos: <br> Articulares, esguinces, luxaciones y fracturas óseas, cualquier agresión 
          que sufre el organismo a consecuencia de la acción de agentes físicos o mecánicos, 
          pueden ser: articulares como los esguinces las luxaciones; óseos como las fracturas: de 
          cráneo, cara o columna <br><br>
          Alérgicos: <br> Medicamentos, alimentos, etc. <br><br>
          Quirúrgicos: <br> Tipo de operación, Fecha, presencia o no de complicaciones, resultados. <br><br>
          Hospitalizaciones previas: <br> preguntar al paciente la fecha y motivo de su ingreso, si se 
          resolvió su problema o sufrió recaídas. <br><br>
          Transfusiones: <br> especificar fecha, tipo de componente, cantidad, motivo y si se presentó 
          alguna reacción adversa. <br><br>
          Toxicomanías o alcoholismo: <br> fecha de inicio, habito de consumo, si ya lo ha dejado, 
          cuánto tiempo lleva sin consumirlo. <br><br>
          </div>
        </div>
      </div>
    </div>
  </div>

</html>