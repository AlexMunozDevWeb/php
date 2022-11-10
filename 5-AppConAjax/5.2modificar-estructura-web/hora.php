<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hora en el servidor</title>
</head>

<body>
  
  <h1>Hora en el servidor</h1>
  <section id="hora"></section>
  <section id="lista"></section>

  <script>
    
    function loadDoc(){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if ( this.readyState == 4 && this.status == 200 ) {
          document.getElementById( "hora" ).innerHTML = "Hora en el servidor: " + this.responseText;
        }
      }
      xhttp.open( "GET", "hora_servidor.php", true );
      xhttp.send();
      console.log(xhttp);
      return false;
    }
    // setInterval( loadDoc, 5000 );

    function categorias(){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if ( this.readyState == 4 && this.status == 200 ) {
          var lista = document.createElement("ul"); //Crear lista
          var cats = JSON.parse( this.response );
          for (let i = 0; i < cats.length; i++) {
            var elem = document.createElement("li"); //Crear lista
            elem.innerHTML = cats[i]['Nombre'];
            lista.appendChild( elem )
          }
          var lista_container = document.getElementById( "lista" );
          lista_container.appendChild( lista );
        }
      }
      xhttp.open( "GET", "datos_categorias_json.php", true );
      xhttp.send();
    }
    categorias();
  
  </script>

</body>
</html>