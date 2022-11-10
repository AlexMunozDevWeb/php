<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lecturas de ficheros XML</title>
</head>
<body>
  <h2>Lecturas de ficheros XML</h2>
  <p>
    la funcion <b>simplexml_load_file("empleado.xml")</b> le un archivo XML y devuelve un objeto de clase <b>SimpreXMLElement</b>.
    <br>
    El fichero se manipula a través de este objeto.
  </p>
  <?php
    $datos = simplexml_load_file( "./3-8-2FicherosXML/empleados.xml" );
    echo "<br>";
    if ( $datos === FALSE ) {
      echo "Error al leer el archivo";
    } 
    foreach ($datos as $valor) {
      print_r( $valor );
      echo "<br>";
    }
    
    //Método xpath()
    $datos = simplexml_load_file( "./3-8-2FicherosXML/empleados.xml" );
    $dni = $datos->xpath("//DNI");
    foreach ($dni as $valor) {
      print_r( $valor );
      echo "<br>";
    } 

    //Validar con XSD
    $dept = new DOMDocument();
    $dept->load( "./3-8-2FicherosXML/empleados.xml" );
    $res = $dept->schemaValidate( "./3-8-2FicherosXML/departamento.xsd" );
    if ( $res ) {
      echo "El fichero es válido.";
    } else {
      echo "Fichero no válido";
    }

    //Transformación con el objeto XSLTProcessor
    //Cargar el documento a transformar
    $dept = new DOMDocument();
    $dept->laod('./3-8-2FicherosXML/empleados.xml');
    $transformacion = new DOMDocument(); //cargar la transformación
    $transformacion->load( './3-8-2FicherosXML/departamento.xslt' );
    $procesador = new XSLTProcessor();//Cear el procesador
    $procesador->importStylesheet( $transformacion );//asociar el procesador y la transformación
    $transformada = $procesador->transformToXml( $dept );//Transformar
    echo $transformada;
    
  ?>
</body>
</html>