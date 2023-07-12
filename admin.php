<?php
session_start();

// Verifica si el usuario ha iniciado sesión y si tiene acceso a la página
if (!isset($_SESSION['usuario']) || $_SESSION['acceso'] < 3) {
header('Location: login.php');
   //exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Página de administración</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style2.css">
</head>
<body>

  <header>
    <h1>Mi sitio web</h1>
    <nav>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="page1.php">Bienvenido a Teléfonos.com</a></li>
        
        <li><a href="#">Administración</a></li>
        <li><a href="logout.php">cerrar</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2>Página de administración</h2>
    <p>Esta es la página de administración. Aquí puedes acceder a herramientas y funciones adicionales.</p>
  </main>

  <footer>
    <p>Derechos reservados © 2023</p>
  </footer>
</body>
</html>