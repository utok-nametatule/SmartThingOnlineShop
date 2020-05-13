<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <!--Основной стиль-->
  <link rel="stylesheet" href="css/main-style.css" type="text/css">
  <!--Дополнительный стиль-->
  <link rel="stylesheet" href="css/contact-style.css" type="text/css">
  <title>SmarTuk</title>
  <!--Скрипт для корзины-->
  <script src="scripts/basket.js"></script>
  <!--Скрипт для просмотров-->
  <script src="scripts/visitors.js"></script>
</head>
<body onload="countItems();visits()">
 <!--Шапка с лого и баннером-->
  <header>
   <!--Лого-->
    <div class="logo">
      <img src="images/logo.png" alt="LOGO">
    </div>
    <!--Баннер-->
    <div class="banner">
      <a href="index.php">Главная</a>
      <a href="catalog.php">Каталог</a>
      <a href="aboutcompany.php">О компании</a>
      <a href="contacts.php">Контакты</a>
      <!--Поле с поиском-->
      <div class="search">
        <input type="text">
        <button ><img src="images/Lupa.png" alt="Поиск"></button>
      </div>
      <!--Регистрация и Вход-->
      <div class="profile">
       <?php 
        //Если пользователь вошел вместо Регистрации и Входа появится его имя и кнопка выхода
        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
          echo '<a href="reg.php">Регистрация</a> |
          <a href="log.php">Вход</a>';}
        else { 
          echo '<span class="username_in">'. $_SESSION['username'] .'</span>
          <a href="scripts/logout.php"><img src="images/logout-img.png" alt="Выход"></a>';
        }
       ?> 
      </div>
      <!--Корзина и счетчик товаров-->
      <div class="basket">
        <a href="basket.php"><img src="images/basket.png" alt="Корзина"></a>
        <input type="text" id="number-items" value="0" disabled>
      </div>
    </div>
  </header>
  
 <!--Основной контент-->
  <main>
  <div class="contacts">
    <!--Заголовок-->
    <h1>Контактная информация</h1>
    <!--Подпись кто это-->
    <h2>Генеральный директор</h2>
    <!--Информация-->
    <div class="info">
      <!--Моя фотография-->
      <img src="images/Me.jpg" alt="I">
      <div>
        <!--ФИО--> 
        <p>Ток Юрий Владимирович</p>
        <!--Телефон-->
        <p><img src="images/tel.png" alt="">Телефонный номер: +79112483857</p>  
        <!--Почта-->
        <p><img src="images/mail.png" alt="">Email: tokk381@gmail.com</p>
        <!--График работы-->
        <p><img src="images/grafik.png" alt="">Время приема: Пн-Пт 10:00-17:00, Сб-Вс Выходные</p>
        <!--Адрес-->
        <p><img src="images/adr.png" alt="">По адресу:г.Санкт-Петербург, пр-кт Новоизмайловский 16,корпус 9</p>
        <!--Карта от Яндекса с местоположением магазина-->
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ab3c2836de0f38d87af45139f9f120b7b00e2195c8d35814cb0b8217a33a95d6b&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
      </div>
    </div>
  </div>
  </main>
  
 <!--Подвал-->
  <footer>
  <!--Меню-->
   <div class="menu">
     <a href="aboutcompany.php">АО Компания SmarTuk</a>
     <a href="index.php">Главная</a>
     <a href="catalog.php">Каталог</a>
    <a href="contacts.php">Контакты</a>
   </div>
   <!--Счетчик просмотров-->
    <div class="visitors">
      <img src="images/visitor.png" alt="Посетителей" >
        <label id="counter"></label>
    </div>
  </footer>
</body>
</html>