

<?php

 
  require('fpdf/fpdf.php');
  
  class PDF extends FPDF
  {
  // Cabecera de página
  function Header()
  {
     // Logos
  
   $this->Image('TEC.jpg',130,20,60);
      
    
      // Salto de línea
      $this->Ln(45);
  }
  
  // Pie de página
  function Footer()
  {
    $this->SetFont('Arial','',8);
    $this->SetY(-43);
    $this->Cell(150,1,utf8_decode('Copyright © 2015 - 2020. Instituto Tecnológico Superior Zacatecas Sur'),0,0,'C');
    $this->SetY(-40);
    $this->Cell(150,1,utf8_decode('Av. Tecnológico # 100 Tlaltenango, Zac'),0,0,'C');
    $this->SetY(-37);
    $this->Cell(150,1,utf8_decode('Col. Las Moritas, C.P. 99700'),0,0,'C');
    $this->SetY(-34);
    $this->Cell(150,1,utf8_decode('Tels. 4379541834, 4379540675, 4379540760'),0,0,'C');
      // Posición: a 1,5 cm del final
      $this->SetY(-31);
      // Arial italic 8
      $this->SetFont('Arial','B',9);

      // Número de página
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

  }
  }
  
  //Base de datos
  
  $hola='hola';
  
  
   include('../Conexion_BD/Conexion.php');
  
  
  
  
  
  
  // Creación del objeto de la clase heredada
  $pdf = new PDF();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetMargins(30, 10 , 30);
  $pdf->SetAutoPageBreak(true,50);
   
   // Arial bold 15
   $pdf->SetFont('Arial','B',20);
   // Movernos a la derecha
   $pdf->Cell(55);
   // Título
   $pdf->Cell(80,40,utf8_decode('Historia Clínica'),0,0,'C');
  $pdf->Ln(50);
  $pdf->SetFont('Helvetica','B',13);
  $pdf->SetFillColor(187,238,238);;  // Establece el color del texto (en este caso es blanco)

  $pdf->Cell(150,10,'Datos del paciente',0,0,'C',1);
  $pdf->Ln(10);


  
  
  
  $NumTrata = $_POST["todas"];
  
  
  $consulta2=$conexion->query("SELECT consultas.No_Consulta,consultas.No_Paciente,datosgen_paciente.Nombre,  datosgen_paciente.Apellido_Paterno,  datosgen_paciente.Apellido_Materno, datosgen_paciente.Sexo from datosgen_paciente 
  inner join consultas WHERE consultas.No_Consulta='$NumTrata' and consultas.No_Paciente=datosgen_paciente.No_Paciente");
   while ($row=$consulta2->fetch_array()) {
  
  
  
  //datos
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'No Paciente:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(97,10,$row[1],0,1,'L');
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'Nombre:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(97,10,$row[2]." ".$row[3]." ".$row[4],0,1,'L');
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'Sexo:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(97,10,$row[5],0,1,'L');
   }


   $pdf->Ln(17);
   $pdf->SetFont('Arial','B',13);
   $pdf->Cell(150,10,'Consulta',0,0,'C',1);
   
  $consulta=$conexion->query("SELECT * FROM consultas WHERE No_paciente='$NumTrata'");
  while ($row=$consulta->fetch_array()) {
      
  
  
  //consulta
  $pdf->Ln(10);
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'No Consulta:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(97,10,$row['No_Consulta'],0,1,'L');
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'Hora inicio:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(97,10,$row['Hora_inicio'],0,1,'L');
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'Hora fin:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(97,10,$row['Hora_end'],0,1,'L');
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'Fecha:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(97,10,$row['Fecha'],0,1,'L');
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'Motivo:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->SetFillColor(255,255,255);;
  $pdf->MultiCell(120,10,$row['Motivo_consulta'],0,1,'L');
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(30,10,'Padecimiento:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->MultiCell(120,10,$row['Padecimiento'],0,1,'L');
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(30,10,'Diagnostico:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->MultiCell(120,10,$row['Diagnostico'],0,1,'L');
  
  
  }

  $pdf->Ln(17);
  $pdf->SetFont('Arial','B',13);
  $pdf->SetFillColor(187,238,238);;
  $pdf->Cell(150,10,'Tratamiento',0,0,'C',1);
  

  
  $consulta3=$conexion->query("SELECT tratamientos.No_Paciente,tratamientos.No_Trata,tratamientos.Nombre,tratamientos.Contenido from tratamientos 
  inner join consultas WHERE consultas.No_Consulta='$NumTrata' and consultas.No_Paciente=tratamientos.No_Paciente");
  while ($row=$consulta3->fetch_array()) {
  //Tratamiento
  $pdf->Ln(10);
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'Nombre:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(97,10,$row['3'],0,1,'L');
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'Contenido:',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->SetFillColor(255,255,255);
  $pdf->MultiCell(120,10,$row['3'],0,1,'L');
  
  }


  $pdf->Ln(20);
  $pdf->SetFont('Arial','B',13);
  $pdf->SetFillColor(187,238,238);;
  $pdf->Cell(150,10,utf8_decode('Notas evolución'),0,0,'C',1);
 



  $consulta4=$conexion->query("SELECT notas_evolucion.No_Paciente,notas_evolucion.No_nota,notas_evolucion.Nombre,notas_evolucion.Contenido from notas_evolucion 
  inner join consultas WHERE consultas.No_Consulta='$NumTrata' and consultas.No_Paciente=notas_evolucion.No_Paciente");
  while ($row=$consulta4->fetch_array()) {
  //notas de evolucion
  $pdf->Ln(10);
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'Nombre:',0,0,'L');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(97,10,$row['2'],0,1,'L');
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(30,10,'Contenido:',0,0,'L');
  $pdf->SetFont('Arial','',10);
  $pdf->SetFillColor(255,255,255);;
  $pdf->MultiCell(120,10,$row['3'],0,1,'L');
  
  
  }
  
  
  
  
  
  
  $pdf->Output();
  



 ?>
