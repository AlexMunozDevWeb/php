<?php

  session_start();
  $_SESSION = array();
  session_destroy();

  setcookie( session_name(), 123, time() - 100 );

  header('Location:login.php');

?>