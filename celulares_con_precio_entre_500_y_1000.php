<?php
require_once 'libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "pdf_adrian");
if ($conexion->connect_error) {
  die("Error al conectar con la base de datos: " . $conexion->connect_error);
}

// Realizar la consulta SQL
$query = "SELECT COUNT(*) AS cantidad FROM celulares WHERE precio BETWEEN 500 AND 1000";
$resultado = $conexion->query($query);

// Crear el objeto Dompdf
$dompdf = new Dompdf();

// Crear el contenido HTML del PDF
$html = '<html><body>';
if ($resultado->num_rows > 0) {
  $fila = $resultado->fetch_assoc();
  $html .= "Cantidad de celulares con precio entre $500 y $1000: " . $fila["cantidad"];
} else {
  $html .= "No se encontraron celulares con ese rango de precio";
}
$html .= '</body></html>';

// Cargar el contenido HTML en el objeto Dompdf
$dompdf->loadHtml($html);

// Renderizar el PDF
$dompdf->render();

// Mostrar el contenido del PDF en pantalla
$dompdf->stream();
?>