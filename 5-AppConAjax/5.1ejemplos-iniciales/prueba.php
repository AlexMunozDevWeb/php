<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hora servidor</title>
</head>
<body>
  <script>
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
      if ( this.readyState == 4 && this.status == 200 ) {
        console.log( this.response );
        alert( this.response );
      }
    }

    // xhttp.open("GET", "hora_servidor.php", false);
    xhttp.open("GET", "datos_categorias_json.php", false);
    xhttp.send();
    
    // console.log(xhttp);
    
    // if ( xhttp.status == 200 ) {
    //   console.log( xhttp.response );
    // } else if ( xhttp.status == 404 ) {
    //   console.log( xhttp.response );
    // } else {
    //   alert( 'Error' );
    // } 


    // console.log( xhttp.response );

  </script>
</body>
</html>