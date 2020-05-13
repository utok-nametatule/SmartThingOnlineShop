<?php
//Начало сессии
  session_start();
//Адрес локального домена
  $address_site = "https://smartuk.000webhostapp.com/";
//Подключение к БД
  require('connect.php');
//Переменная на ошибку
    $_SESSION["error_messages"]="";
//Проверка на получение логина и пароля
  if(!empty($_POST["username"]) && !empty($_POST["password"])){
    //Запоменание логина и пароля
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    //Проверка с таблицей в БД
    $query = "SELECT * FROM users WHERE name = '$username' AND password = '$password';";
    //Отправка запроса
    $result = mysqli_query($connection,$query);
    //Если количество найденных строк найденно 1, то логин и пароль верен
    if ($result->num_rows == 1){
      //Записывает в сессию
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      //Возврат на главную страницу
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: ".$address_site."/index.php");
      exit();
    }
    else{
      //Вывод об ошибке
      $_SESSION["error_messages"] .= "Не правильный логин/пароль";
      //Возврат на форму входа
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: ".$address_site."/log.php");
      exit();
    }
  }
  else{
    if (empty($_POST['username']))
        {
          //Вывод об ошибке
          $_SESSION["error_messages"] .= "Не введено поле с именем пользователя";
          //Возврат на форму входа
          header("HTTP/1.1 301 Moved Permanently");
          header("Location: ".$address_site."/log.php");
        }
        else
        {
          if (empty($_POST['password'])){
            //Вывод об ошибке
            $_SESSION["error_messages"] .= "Не введено поле с паролем";
            //Возврат на форму входа
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/log.php");
          }
        }
  }
  
?>