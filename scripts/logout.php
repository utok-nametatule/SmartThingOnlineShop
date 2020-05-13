<?php

    //Запускаем сессию
    session_start();
 
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
     
    // Возвращаем пользователя на ту страницу, на которой он нажал на кнопку выход.
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$_SERVER["HTTP_REFERER"]);
  echo "<button class='button3' onclick='location.href = \"vhod.php\"'>Вход</button> ";
?>
