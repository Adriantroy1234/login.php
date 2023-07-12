<?php
session_start();

// Verifica si el usuario ha iniciado sesión y si tiene acceso a la página
if (!isset($_SESSION['usuario']) || $_SESSION['acceso'] < 1) {

      header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Complementación - Teléfonos.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  <header>
    <h1>Teléfonos.com</h1>
    <nav>
      <ul>
        <li><a href="page1.php">Inicio</a></li>
        <li><a href="#">Complementación</a></li>
        <li><a href="#">puntuar pagina</a></li>
        <li><a href="#">Pagar Premiun</a></li>
         <li><a href="logout.php">cerrar</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2>Guía para elegir el mejor teléfono móvil</h2>
    <p>Con la gran cantidad de modelos de teléfonos móviles disponibles en el mercado, puede resultar abrumador elegir el mejor para ti. Aquí te proporcionamos una guía para ayudarte a tomar la mejor decisión.</p>

    <h3>1. Define tus necesidades</h3>
    <p>Antes de comprar un teléfono, es importante saber qué esperas de él. ¿Necesitas una batería de larga duración? ¿Una cámara de alta calidad? ¿Una pantalla grande para ver películas? Haz una lista de las características que son importantes para ti.</p>

    <h3>2. Considera tu presupuesto</h3>
    <p>Los teléfonos móviles pueden variar en precio desde unos pocos cientos hasta varios miles de dólares. Define cuánto estás dispuesto a gastar antes de comenzar a buscar modelos.</p>

    <h3>3. Investiga los modelos disponibles</h3>
    <p>Una vez que hayas definido tus necesidades y presupuesto, investiga los modelos disponibles que se ajusten a tus criterios. Lee reseñas y comparativas para tener una idea de las características de cada modelo.</p>

    <h3>4. Prueba el teléfono antes de comprarlo</h3>
    <p>Si es posible, prueba el teléfono antes de comprarlo. Visita una tienda física para ver cómo se siente en tu mano y cómo se ve la pantalla. También puedes buscar videos de reseñas en línea para ver cómo funciona el teléfono en acción.</p>

    <h3>5. Compra con confianza</h3>
    <p>Una vez que hayas investigado y probado el teléfono, compra con confianza. Recuerda que siempre puedes devolverlo si no cumple con tus expectativas.</p>
  </main>

  <footer>
    <p>Teléfonos.com - Todos los derechos reservados &copy; 2023</p>
  </footer>
</body>
</html>