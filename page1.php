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
  <title>Bienvenido a Teléfonos.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  <header>
    <h1>Teléfonos.com</h1>
    <nav>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="page2.php">Complementación</a></li>
        <li><a href="#">puntuar pagina</a></li>
        <li><a href="#">Pagar Premiun</a></li>
         <li><a href="logout.php">cerrar</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2>La mejor información sobre teléfonos</h2>
    <p>Bienvenido a Teléfonos.com, el sitio web donde encontrarás la mejor información sobre teléfonos móviles. Aquí podrás leer reseñas, comparativas y noticias sobre las últimas novedades en el mundo de los teléfonos.</p>
    <p>¿Quieres estar al día en cuanto a tecnología móvil? Entonces este es el sitio web que estabas buscando. ¡Explora nuestro contenido y descubre todo lo que necesitas saber sobre los teléfonos móviles!</p>
  </main>

  <footer>
    <p>Teléfonos.com - Todos los derechos reservados &copy; 2023</p>
  </footer>
</body>
</html>