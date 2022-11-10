<?php 
  // require_once '../vendor/autoload.php';
  // use Doctrine\ORM\Tools\Setup;
  // use Doctrine\ORM\EntityManager;

  // use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
  // use Doctrine\Common\Annotations\AnnotationReader;
  // use Doctrine\Common\Annotations\AnnotationRegistry;

  // require_once __DIR__ . '/vendor/autoload.php';
  // require_once __DIR__ . '/entities/Users.php';

  // // $paths = array("./src");
  // $paths = array(__DIR__ . '/entities');
  // $isDevMode = true;
  // //Configuración base de datos
  // $dbParams = array(
  //   'driver'   => 'pdo_mysql',
  //   'user'     => 'root',
  //   'password' => '',
  //   'dbname'   => 'pedidos',
  //   'host'     => 'localhost'
  // );
  // $config = Setup::createAnnotationMetadataConfiguration( $paths, $isDevMode, null, null, false );
  // // $config = Setup::createAnnotationMetadataConfiguration(array("/src‌​"), $isDevMode, null, null, false);
  // // $config = Setup::createAnnotationMetadataConfiguration(array(DIR."/src‌​/model/dto"), $isDevMode, null, null, false);

  // $entityManager = EntityManager::create( $dbParams, $config );


  use Doctrine\ORM\Tools\Setup;
  use Doctrine\ORM\EntityManager;
  use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
  use Doctrine\Common\Annotations\AnnotationReader;
  use Doctrine\Common\Annotations\AnnotationRegistry;

  require_once '../vendor/autoload.php';
  require_once './src/Productos.php';

  $paths            = array('./src');
  $isDevMode        = false;
  $connectionParams = array(
      'driver'   => 'pdo_mysql',
      'user'     => 'root',
      'password' => '',
      'dbname'   => 'pedidos',
      'host'     => 'localhost',
  );

  $config = Setup::createConfiguration($isDevMode);
  $driver = new AnnotationDriver(new AnnotationReader(), $paths);

  // registering noop annotation autoloader - allow all annotations by default
  AnnotationRegistry::registerLoader('class_exists');
  $config->setMetadataDriverImpl($driver);

  $product = EntityManager::create($connectionParams, $config);

  $prod = $product->find('Productos', 14);
  echo $productos->getNombre();
?>