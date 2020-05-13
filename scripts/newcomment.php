<?php
//Начало сессии
  session_start();
//Адрес локального домена
  $address_site = "https://smartuk.000webhostapp.com/";
//Подключение к БД
  require('connect.php');
  date_default_timezone_set("Europe/Moscow");
//Переменная на ошибку
  $_SESSION["error_messages"] = "";
//Если комментарий не пуст то он запишется в БД
  if (!empty($_POST['comment']))
  {
    //Запоменание логина, отзыва и времени
    $username = $_SESSION['username'];
    $comment = $_POST['comment'];
    $today = date("Y-m-d H:i:s");
    //Запрос в БД в таблицу comment
    $query = "INSERT INTO comment (username,comment,data) VALUES ('$username','$comment','$today');";
    //Отправка запроса
    $result = mysqli_query($connection,$query);
    //Если успешно отправился то перезагружает страницу
    if($result)
    {
      //Стирает поле
      $_POST['comment']="";
      //Перезагрузка страницы
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: ".$address_site."/recom.php");
      exit();
    }
    else
    {
      //Вывод об ошибке
      $_SESSION["error_messages"] .= "Ошибка!";
      //Перезагрузка страницы
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: ".$address_site."/recom.php");
      exit();
    }
  }
  else
  {
      //Вывод об ошибке
      $_SESSION["error_messages"] .= "Ничего не ввели";
      //Перезагрузка страницы
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: ".$address_site."/recom.php");
      exit();
  }
?>