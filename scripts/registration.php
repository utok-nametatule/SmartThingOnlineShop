<?php
    //Начало сессии
    session_start();
    //Адрес локального домена
    require('connect.php');
    //Подключение к БД
    $address_site = "https://smartuk.000webhostapp.com/";
    //Переменная на ошибку
    $_SESSION["error_messages"]="";
//Если пользователь ввел все правильно
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['replypassword']) && ($_POST['replypassword'] == $_POST['password']))
    {
      //Запоминаем логин, пароль и email
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      //Запрос в БД в таблицу users
      $query = "INSERT INTO users(email,name,password) VALUES ('$email','$username','$password');";
      //Отправка запроса
      $result = mysqli_query($connection,$query);
      //Если успешно отправился то перезагружает страницу
      if($result){
        //Стираем в этих полях
        $_POST['username']="";
        $_POST['password']="";
        $_POST['replypassword']="";
        $_POST['email']="";
        //Переход на страницу со входом
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/log.php");

      }
      else{
        //Вывод об ошибке
        $_SESSION["error_messages"] .= "Такой пользователь уже существует";
        //Перезагрузка страницы
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/reg.php");
      }
    }
    else
    {
      if (empty($_POST['email']))
      {
        //Вывод об ошибке
        $_SESSION["error_messages"] .= "Не введено поле с почтой";
        //Перезагрузка страницы
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/reg.php");
      }
        
      else
      {
        if (empty($_POST['username']))
        {
          //Вывод об ошибке
          $_SESSION["error_messages"] .= "Не введено поле с именем пользователя";
          //Перезагрузка страницы
          header("HTTP/1.1 301 Moved Permanently");
          header("Location: ".$address_site."/reg.php");
        }
        else
        {
          if (empty($_POST['password'])){
            //Вывод об ошибке
            $_SESSION["error_messages"] .= "Не введено поле с паролем";
            //Перезагрузка страницы
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/reg.php");
          }
              
          else
          {
            if (empty($_POST['replypassword'])){
              //Вывод об ошибке
              $_SESSION["error_messages"] .= "Повторите свой пароль, пожалуйста";
              //Перезагрузка страницы
              header("HTTP/1.1 301 Moved Permanently");
              header("Location: ".$address_site."/reg.php");
            }
              
            else
            {
              if ($_POST['replypassword'] != $_POST['password']){
                //Вывод об ошибке
                 $_SESSION["error_messages"] .= "Ваши пароли не совпадают, проверьте на правильность";
                //Перезагрузка страницы
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/reg.php");
              }
             
              else
              {
                //Вывод об ошибке
                $_SESSION["error_messages"] .= "Неизвестная ошибка";
                //Перезагрузка страницы
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/reg.php");}  
            }
          }
        }
      }
    }

?>