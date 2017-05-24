<?php

  $connection = mysqli_connect('localhost', 'root', 'fiap', 'cms');

  if(!$connection){
    echo "Não conectou";
  }

  if (!mysqli_set_charset($connection, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($connection));
    exit();
} else {
     mysqli_character_set_name($connection);
}

 ?>
