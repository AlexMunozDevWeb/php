<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subida de ficheros</title>
</head>
<body>
  <h2>Subida de ficheros</h2>
  <form action="./3-2-formularios/procesar_subida.php" method="post" enctype="multipart/form-data">
    Escoja un fichero:<br>
    <input type="file" name="fichero"><br>
    <input type="submit" value="Enviar fichero">
  </form>
</body>
</html>