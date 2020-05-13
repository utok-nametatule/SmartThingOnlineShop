<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <!--Основной стиль-->
  <link rel="stylesheet" href="css/main-style.css" type="text/css">
  <title>SmarTuk</title>
  <style>
  
  </style>
   <!-- <script id="purchase-order" type="application/xml" src="xml/shop.xml"></script>-->
  <script src="scripts/basket.js"></script>
  <script src="scripts/visitors.js"></script>
  <script src="scripts/main.js"></script>
</head>
<body onload="setNews();countItems();visits()">
<object id="purchase-order" data="xml/shop.xml" type="text/xml" style="display: none;"></object>
  <script src="scripts/basket.js"></script>
  <script src="scripts/visitors.js"></script>
  <script src="scripts/main.js"></script>
  
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
  <!--Загаловки с переходами-->
   <h1><span onclick="setNews()">НОВОСТИ</span> / <span onclick="setIndex()">АКЦИИ</span></h1>
   <!--Куда будет выгружатся контент-->
   <!--НОВОСТИ-->
   <div class="slider">
     <p>Сегодня в связи с пандемией, у нас проходят акции. По следующим категориям:</p>
     <!--Слайдер-->
     <div class='slider'>
       <div class='slider__wrapper'>
         <!--Картинка для слайдера-->
         <div class='slider__item'>
           <img src='images/robo.jpg' class='preview'>
         </div>
         <!--Картинка для слайдера-->
         <div class='slider__item'>
           <img src='images/light.jpg' class='preview'>
         </div>
       </div>
       <!--Стрелки перехода для картинок-->
       <a class='slider__control slider__control_left'  role='button'></a>
       <a class='slider__control slider__control_right slider__control_show' role='button'></a>
     </div>
     <p>Роботы пылесосы и Умный свет.</p>
     <p>Переходите в каталог, чтобы выбрать себе товар</p>
   </div>
   <!--АКЦИИ-->
   <div id="article" class="items"></div>
  </main>
  <script src="scripts/slider.js"></script>
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