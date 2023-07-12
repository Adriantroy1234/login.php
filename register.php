<?php
require_once 'db_connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtener los datos del formulario
  $cedula = trim($_POST['cedula']);
  $nombre = trim($_POST['nombre']);
  $apellido = trim($_POST['apellido']);
  $email = trim($_POST['email']);
  $direccion = trim($_POST['direccion']);
  $usuario = trim($_POST['usuario']);
  $clave = trim($_POST['clave']);
  $confirmar_clave = trim($_POST['confirmar_clave']);

  // Verificar que los campos no estén vacíos
  if (empty($cedula) || empty($nombre) || empty($apellido) || empty($email) || empty($direccion) || empty($usuario) || empty($clave) || empty($confirmar_clave)) {
    $error_message = 'Todos los campos son requeridos.';
  } else {
    // Verificar que la contraseña cumpla con los requisitos
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[a-zA-Z\d\W]{8,}$/', $clave)) {
      $error_message = 'La contraseña debe incluir al menos una letra mayúscula, una letra minúscula, un número, un carácter especial, no debe tener espacios en blanco y debe tener una longitud de al menos 8 caracteres.';
    } elseif ($clave != $confirmar_clave) {
      $error_message = 'Las contraseñas no coinciden.';
    } else {
      // Agregar el usuario a la base de datos
      $stmt = $pdo->prepare('INSERT INTO users (usuario, clave,acceso) VALUES (?, ?, ?)');
      $stmt->execute([$usuario, $clave, "1"]);

      // Redirigir al usuario a la página de inicio de sesión
      header('Location: login.php');
      exit();
    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registrarse</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Registrarse</h1>

 <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>

    <form method="post" action="">
      <label for="cedula">Cédula:</label>
      <input type="number" id="cedula" name="cedula" required><br><br>

      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required><br><br>

      <label for="apellido">Apellido:</label>
      <input type="text" id="apellido" name="apellido"  required><br><br>

      <label for="email">Correo Electrónico:</label>
      <input type="email" id="email" name="email" required><br><br>

      <label for="direccion">Dirección:</label>
      <input type="text" id="direccion" name="direccion"  required><br><br>

      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="usuario"  required><br><br>

      <label for="clave">Contraseña:</label>
      <input type="password" id="clave" name="clave" required><br><br>

      <label for="confirmar_clave">Confirmar Contraseña:</label>
      <input type="password" id="confirmar_clave" name="confirmar_clave" required><br><br>

      <button type="submit">Registrarse</button>
    </form>

    <p>¿Ya tienes una cuenta? <a href="login.php">Ingresar</a></p>
  </div>
</body>
</html>