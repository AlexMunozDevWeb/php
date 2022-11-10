
function crearVinculoCategorias( nom, cod) {
  var vinculo = document.createElement('a');
  var ruta = "productos_json.php?categoria=" + cod;
  vinculo.href = ruta;
  vinculo.innerHTML = nom;
  vinculo.onclick = function(){return cargarProductos(this);}
  return vinculo;
}

function cargarCategorias() {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if ( this.readyState == 4 && this.status == 200) {
      var cats = JSON.parse( this.response );
      var lista = document.createElement( "ul" );
      for (let i = 0; i < cats.length; i++) {
        var elem = document.createElement( "li" );
        vinculo = crearVinculoCategorias( cats[i].Nombre, cats[i].CodCat );
        elem.appendChild( vinculo );
        lista.appendChild( elem );        
      }
      var contenido = document.getElementById( "contenido" );
      contenido.innerHTML = '';
      var titulo = document.getElementById( "titulo" );
      titulo.innerHTML = "Categorias";
      contenido.appendChild( lista );
    } 
  }

  xhttp.open( "GET", "categorias_json.php", true );
  xhttp.send();
  return false;
}

function cargarProductos( destino ) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if ( this.readyState == 4 && this.status == 200) {
      var prod = document.getElementById( 'contenido' );
      var titulo = document.getElementById( 'titulo' );
      titulo.innerHTML = "Productos";
      try {
        var filas = JSON.parse( this.responseText );
        var tabla = crearTablaProductos( filas );
        prod.innerHTML = '';
        prod.appendChild( tabla );
      } catch (e) {
        var mensaje = document.createElement( 'p' );
        mensaje.innerHTML = 'Categoría sin productos';
        prod.innerHTML = '';
        prod.appendChild( mensaje );
      }
    } 
  }

  xhttp.open( "GET", destino, true );
  xhttp.send();
  return false;
}

function crearTablaProductos( productos ) {
  var tabla = document.createElement( 'table' );
  var cabecera = crearFila(['Código', 'Nombre', 'Descripción', 'Stock', 'Comprar'], "th");
  tabla.appendChild( cabecera );
  for (let i = 0; i < productos.length; i++) {
    /*Formulario*/
    formu = crearFormulario( "Añadir", productos[i]['CodPro'], anadirProductos);
    fila = crearFila([ productos[i]['CodPro'], productos[i]['Nombre'], productos[i]['Descripcion'], productos[i]['Stock']], "td");
    celda_form = document.createElement( 'td' );    
    celda_form.appendChild( formu );    
    fila.appendChild( celda_form );
    tabla.appendChild( fila );    
  }
  return tabla;
}

function crearFormulario( texto, cod, funcion){
  var formu = document.createElement('form');
  var unidades = document.createElement( 'input' );
  unidades.value = 1;
  unidades.name = 'unidades';
  var codigo = document.createElement( 'input' );
  codigo.value = cod;
  codigo.type = 'hidden';
  codigo.name = 'unidades';
  var bsubmit = document.createElement( 'input' );
  bsubmit.type = 'submit';
  bsubmit.value = texto;
  formu.onsubmit = function(){ return funcion(this) }
  formu.appendChild( unidades );
  formu.appendChild( codigo );
  formu.appendChild( bsubmit );
  return formu;
}

function crearFila( array_data, nombre_fila ){
  var fila = document.createElement( 'tr' );
  for (let i = 0; i < array_data.length; i++) {
    var fila_content = document.createElement(nombre_fila);
    fila_content.innerHTML += array_data[i];
    fila.appendChild(fila_content);
  }
  return fila;
}

function anadirProductos( formulario ) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if ( this.readyState == 4 && this.status == 200 ) {
      alert('Producto añadido con éxito');
      cargarCarrito();
    }
  }
  var params = "cod" + formulario.elements[ 'cod' ].value + '&unidades=' + formulario.elements[ 'unidades' ] .value;
  xhttp.open( "POST", 'anadir_json.php', true );
  xhttp.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
  xhttp.send( params );
  return false;
}

function eliminarProductos( formulario ) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if ( this.readyState == 4 && this.status == 200 ) {
      alert('Producto eliminado con éxito');
      cargarCarrito();
    }
  }
  var params = "cod" + formulario.elements[ 'cod' ].value + '&unidades=' + formulario.elements[ 'unidades' ] .value;
  xhttp.open( "POST", 'eliminar_json.php', true );
  xhttp.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
  xhttp.send( params );
  return false;
}

function cargarCarrito() {
  
}

function cerrarSesionUnaPagina() {
  
}
