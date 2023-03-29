<?php


/// Powered by Evilnapsis go to http://evilnapsis.com
include '../Imprimir/FPDF/fpdf.php';
// Definir el nombre de la persona y el logo
$nombre = 'Dra. J. Iris Gonzalez R.';
$logo = 'logo.jpg';
$Cedula = 'asd';
$celular = '3312890130';
$Nombre_paciente = "Flavio Alejandro Garcia Garcia";
$fecha = date('d/m/Y');
$peso = "50 kg";
$Talla = "125 cm";
$IMC = "72";
$Edad = "22";
$FC = "313";
$FR = "123";
$consulta = "Se murio possssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssr no tomar ";
$motivo = "Alejandro no quisossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss toamr agua y se murio ppipipipipi";


$pdf = new FPDF('L', 'mm', array(250,220));
$pdf->AddPage();
$pdf->SetLineWidth(0.5);
$pdf->SetFont('Arial','B',25);
$width = 50;
$pdf->SetDrawColor(0, 0, 150); // Establecer el color del borde en azul
$pdf->SetTextColor(0, 0, 150); // Establecer el color del texto en azul
$width = $pdf->GetStringWidth($nombre) + 20; // Agregar un margen de 4 unidades a cada lado
$x = ($pdf->GetPageWidth() - $width) / 2;
$pdf->SetXY($x, 5); // Ajustar la coordenada Y según sea necesario
$pdf->Cell($width, 10, $nombre, 1, 1, 'C', false, '', 1, '', 'LRTB');



$pdf->Image('logo.jpg',5,3,30);
$pdf->Image('logo.jpg',210,3,30);
$pdf->SetFont('Arial','',12);

$pdf->SetXY(15, 15); // Ajustar las coordenadas para colocar los textos debajo del nombre
$pdf->SetFont('helvetica', 'B', 12); // Definir la fuente en negrita, tamaño 12
$pdf->MultiCell($width, 10, 'CED.PROF.'.$Cedula, 0, 'C'); // Agregar el primer texto con posible salto de línea

$pdf->SetXY(100, 15); // Ajustar las coordenadas para el segundo texto
$pdf->MultiCell(40, 10, 'Medico Cirujano y Ultrasonografica', 0, 'C'); // Agregar el segundo texto con posible salto de línea

$pdf->SetXY(110, 15); // Ajustar las coordenadas para el tercer texto
$pdf->MultiCell($width, 10, 'Celular: '.$celular, 0, 'C'); // Agregar el tercer texto con posible salto de línea

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 40);
$pdf->Cell(0, 10, 'Nombre: ' . str_repeat('_', strlen($Nombre_paciente)+2), 0, 1); // Agregar los guiones bajos
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(30, 40); // Mover el cursor a la posición correcta
$pdf->Cell(0, 10, $Nombre_paciente, 0, 1, 'B'); // Agregar el nombre en negrita

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(140, 40);
$pdf->Cell(140, 10, 'Fecha: ' . str_repeat('_', strlen($fecha)+2), 0, 1); // Agregar los guiones bajos
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(160, 40); // Mover el cursor a la posición correcta
$pdf->Cell(170, 10, $fecha, 0, 1, 'B'); // Agregar el nombre en negrita


#FC
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 55);
$pdf->Cell(0, 10, 'FC: ' . str_repeat('_', strlen($FC)+7), 0, 1); // Agregar los guiones bajos
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(25, 55); // Mover el cursor a la posición correcta
$pdf->Cell(0, 10, $Edad, 0, 1, 'B'); // Agregar el nombre en negrita

#FR
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 62);
$pdf->Cell(0, 10, 'FR: ' . str_repeat('_', strlen($FR)+7), 0, 1); // Agregar los guiones bajos
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(25, 62); // Mover el cursor a la posición correcta
$pdf->Cell(0, 10, $FR, 0, 1, 'B'); // Agregar el nombre en negrita


#PESO
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 69);
$pdf->Cell(0, 10, 'Peso: ' . str_repeat('_', strlen($peso)+2), 0, 1); // Agregar los guiones bajos
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(25, 69); // Mover el cursor a la posición correcta
$pdf->Cell(0, 10, $peso, 0, 1, 'B'); // Agregar el nombre en negrita

#Talla
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 76);
$pdf->Cell(0, 10, 'Talla: ' . str_repeat('_', strlen($Talla)+2), 0, 1); // Agregar los guiones bajos
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(25, 76); // Mover el cursor a la posición correcta
$pdf->Cell(0, 10, $Talla, 0, 1, 'B'); // Agregar el nombre en negrita

#IMC
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 83);
$pdf->Cell(0, 10, 'IMC: ' . str_repeat('_', strlen($IMC)+7), 0, 1); // Agregar los guiones bajos
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(25, 83); // Mover el cursor a la posición correcta
$pdf->Cell(0, 10, $IMC, 0, 1, 'B'); // Agregar el nombre en negrita

#EDAD
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 90);
$pdf->Cell(0, 10, 'Edad: ' . str_repeat('_', strlen($Edad)+7), 0, 1); // Agregar los guiones bajos
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(25, 90); // Mover el cursor a la posición correcta
$pdf->Cell(0, 10, $Edad, 0, 1, 'B'); // Agregar el nombre en negrita


$pdf->Image('logo.jpg', 150, 150, 50);


#Consulta


$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(140, 55);
$pdf->Cell(0, 10, 'Consulta', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(60, 70);
$pdf->MultiCell(0, 10, $consulta, 1, 'C', false);



#Motivo
$pdf->SetFont('Arial', 'B', 12);
$pos_y = $pdf->GetY();
$pdf->SetXY(140, $pos_y);
$pdf->Cell(0, 10, 'Motivo', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pos_y = $pdf->GetY();
$pdf->SetXY(60, $pos_y);
$pdf->MultiCell(0, 10, $motivo, 1, 'C', false);


#Medico
$pdf->SetFont('Arial', 'B', 12);
$pos_y = $pdf->GetY() + 40;
$pdf->SetXY(150, $pos_y);
$pdf->Cell(0, 10, str_repeat('_', strlen($nombre)+7), 0, 1); // Agregar los guiones bajos

$pdf->SetFont('Arial', '', 12);
$pos_y = $pdf->GetY();
$pdf->SetXY(165, $pos_y-10);
$pdf->Cell(0, 10, $nombre, 0, 1); // Agregar los guiones bajos

$pdf->SetFont('Arial', 'B', 12);
$pos_y = $pdf->GetY();
$pdf->SetXY(160, $pos_y-5);
$pdf->Cell(0, 10, 'Nombre y firma del medico', 0, 1); // Agregar los guiones bajos



$pdf->Output();



