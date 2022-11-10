<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Login</title>
  <script type="text/JavaScript" src="js/cargarDatos.js"></script>
  <script type="text/JavaScript" src="js/sesion.js"></script>
</head>
<body>
  <section id="login">
    <form onsubmit=" return login(); " method="POST" >
    <!-- <form action="login_json.php" method="POST"> -->
      <h2>Inicio de sesión:</h2>
      Usuario: <input type="text" name="usuario" id="usuario">
      Clave <input type="password" name="clave" id="clave">
      <input type="submit">
    </form>
  </section>
  <section id="principal" style="display:none">
    <header>
      <?php require 'cabecera_json.php'; ?>
    </header>

    <h2 id="titulo"></h2>
    <section id="contenido">
  
    </section>
  </section>
</body>
</html>