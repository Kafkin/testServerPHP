<?php

  header( 'Content-Type: application/json' );
  require 'connect.php';

  // functions
  require './functions/user.php';

  $method = $_SERVER['REQUEST_METHOD'];
  $type = $_GET['q'];

  // die( $_POST );

  if( $method === 'POST' ) {
    if( $type === 'users/create' ) addUser( $db, $_POST );
  }

  // if( $method === 'DELETE' )
  // if( $method === 'PATH' )

  $db
    ->close();