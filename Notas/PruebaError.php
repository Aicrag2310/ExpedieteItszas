<html>
<body>

      <script>
        swal("Sin Resultados", "No se han encontrado Resultados", "error");
          window.setTimeout(function(){
          $(".alert").fadeTo(2000 ,500).slideUp(500,function(){
          $(this).remove();
          });
          },2300);
      </script>

      </body>
</html>
