<?php
  
  if( $_POST[ 'usuario' ] == 'alex' && $_POST[ 'clave' ] == '1' ){
    header( 'Location:bienvenido.html' );
  } else {
    header( 'Location:error.html' );
  }

?>