function login() {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if ( this.readyState == 4 && this.status == 200) {
      if( this.responseText === "FALSE" ){
        alert( "Revise usuario y contraseña." )
      } else {
        document.getElementById("principal").style.display = "block";
        document.getElementById("login").style.display = "none";
        document.getElementById("cab_usuario").innerHTML = "Usuario: " + usuario;
        cargarCategorias();
      }
    } 
  }

  var usuario = document.getElementById("usuario").value;
  var clave = document.getElementById("clave").value;
  var params = "usuario=" + usuario + "&clave=" + clave;

  xhttp.open( "POST", "login_json.php", true );
  xhttp.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
  xhttp.send( params );
  return false;
}
