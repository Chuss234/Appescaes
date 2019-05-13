<?php

use Dompdf\Dompdf;
$cod = $_GET["cod"];

$html=file_get_contents("http://localhost/Appescaes/app/vista/facturas/facturaventa.php?cod=$cod");

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();

// Definimos el tamaño y orientación del papel que queremos.
//$pdf->set_paper("letter", "portrait");
$pdf->set_paper(array(0,-36,375,225));

// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));

// Renderizamos el documento PDF.
$pdf->render();
$pdf->output_html();

// Enviamos el fichero PDF al navegador.

$pdf->stream('FicheroEjemplo.pdf',array('Attachment'=>0));
