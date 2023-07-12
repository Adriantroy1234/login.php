<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = $_POST['usuario'];
  $clave = $_POST['clave'];

  // Verifica si el usuario y la contraseña son válidos
  $stmt = $pdo->prepare('SELECT * FROM users WHERE usuario = ? AND clave = ?');
  $stmt->execute([$usuario, $clave]);
  $user = $stmt->fetch();

  if ($user) {
    $_SESSION['usuario'] = $user['usuario'];
    $_SESSION['acceso'] = $user['acceso'];

    if ($user['acceso'] == 1) {
      header('Location: page1.php');
      exit();
    } elseif ($user['acceso'] == 2) {
      header('Location: level2.php');
      exit();
    }
  }

  // Verifica si el usuario es un administrador
  $stmt_admin = $pdo->prepare('SELECT * FROM admin WHERE usuario = ? AND clave = ?');
  $stmt_admin->execute([$usuario, $clave]);
  $admin = $stmt_admin->fetch();

  if ($admin) {
    $_SESSION['usuario'] = $admin['usuario'];
    $_SESSION['acceso'] = $admin['acceso'];

    header('Location: admin.php');
    exit();
  }

  // Muestra un mensaje de error si el usuario o la contraseña son incorrectos
  $error_message = 'Usuario o contraseña incorrectos';

}             
?>

<!DOCTYPE html>
<html>
<head>
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  <h2>Iniciar Sesión</h2>

  <?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
  <?php endif; ?>

  <form method="post" action="">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br><br>

    <label for="clave">Contraseña:</label>
    <input type="password" id="clave" name="clave" required>

    <br><br>

    <input type="submit" value="Iniciar Sesión">
  </form>

  <p>No tienes una cuenta? <a href="register.php">Registrarse</a></p>

 
</body>
</html>