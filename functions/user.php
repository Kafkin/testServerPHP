<?php

  function addUser( $db, $data ) {
    $name = $data['name']; $email = $data['email']; $password = $data['password'];

    $verifyEmail = $db->query( "SELECT * FROM `users` WHERE `email`='$email'" );
    if( mysqli_num_rows( $verifyEmail ) !== 0 ){
      http_response_code( 401 );
      die( json_encode([
        'message' => 'Данная почта уже занята',
        'status' => false,
      ]));
    }

    $user = 
      $db->query( "INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password');" );

    if ( mail($email, "Данные пользователя", "Имя: $name, Почта: $email, Пароль: $password" ,"From: papayrus137@mail.ru \r\n") ) echo "Сообщение успешно отправлено";
    else echo "При отправке сообщения возникли ошибки";

    http_response_code( 201 );
    echo json_encode([
      'message' => 'Пользователь успешно создан, письмо со всеми данными были отправленны вам на почту =3',
      'status' => true,
    ]);
  }