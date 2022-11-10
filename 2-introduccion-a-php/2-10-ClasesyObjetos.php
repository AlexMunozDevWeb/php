<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clases y objetos</title>
</head>
<body>
  <h2>Clases y objetos</h2>
  <p>Los atributos y métodos se pueden declarar como estáticos, de manera que no habrá uno por objeto, sino uno por clase.
     Se utiliza la palabra reservada static.</p>
  <b>public:</b>Se pueden utilizar desde dentro y fuera de la clase.
  <br><b>private:</b>Pueden emplearse desde la propia clase.
  <br><b>protected:</b>Se pueden utilizar dentro de la propia clase, las derivadas y las antecesoras.</br>
  
  <p>Para acceder a los metodos y atributos se utiliza:</p>
  <span>$objeto->propiedad;</span><br>
  <span>$objeto->metodo( argumento );</span><br>

  <?php
   class Persona {
    private $DNI;
    private $nombre;
    private $apellido;

    //Constructor
    function __construct( $DNI, $nombre, $apellido ){
      $this->DNI = $DNI;
      $this->nombre = $nombre;
      $this->apellido = $apellido;
    }

    // Getters
    public function getNombre(){
      return $this->nombre;
    }
    public function getApellido(){
      return $this->apellido;
    }
    
    // Setters
    public function setNombre( $nombre ){
      $this->nombre = $nombre;
    }
    public function setApellido( $apellido ){
      $this->apellido = $apellido;
    }

    public function __toString(){
      return "Persona: " . $this->nombre . " " . $this->apellido .".";
    }
    
   }

   //Crear una persona
   $per = new Persona( '11111111A', 'Ana', 'Puertas' );
   //mostrarla, usa el método __toString
   echo $per.'<br>';
   //Cambiar apellido
   $per->setApellido('Muñoz');
   echo $per.'<br>';

  ?>

  <p>Herencia</p>
  <span>Para que una clase herede de otra, se utiliza la palabra reservada <b>extends</b>. La clase derivada tendra los mismos
        atributos y métodos, podra añadir nuevo o sobreescribir los que hereda.</span><br>
  <?php 
  class Cliente extends Persona {
    private $saldo;

    function __construct( $DNI, $nombre, $apellido, $saldo ){
      parent::__construct( $DNI, $nombre ,$apellido );
      $this->saldo = $saldo;
    }
    public function getSaldo(){
      return $this->saldo;
    }
    public function setSaldo( $saldo ){
      $this->saldo = $saldo;
    }

    public function __toString(){
      return "Cliente: " . $this->getNombre();
    }
  }

  $cli = new Cliente( '22222222A', 'Pedro', 'Sales', 100 );
  echo $cli . '<br>'; 
  ?>

</body>
</html>