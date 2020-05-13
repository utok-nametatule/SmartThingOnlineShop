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
  <link rel="stylesheet" href="css/basket-style.css" type="text/css">
  <title>SmarTuk</title>
  <!--Скрипт для корзины-->
  <script src="scripts/basket.js"></script>
  <!--Скрипт для просмотров-->
  <script src="scripts/visitors.js"></script>
</head>
<body onload="openCart();countItems();visits();">
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
  <!--Заголовок-->
   <h1>Корзина</h1>
   <div class="wrap">
    <!--Куда будет выгружатся корзина(таблица с товарами)-->
     <div class="empty" id="cart_content"></div>
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