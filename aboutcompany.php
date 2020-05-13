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
  <link rel="stylesheet" href="css/ac-style.css" type="text/css">
  <title>SmarTuk</title>
  <!--Скрипт для корзины-->
  <script src="scripts/basket.js"></script>
  <!--Счетчик просморов-->
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
  <!--Заголовок-->
   <h1>О Компании</h1>
    <div class="info">
    <!--Текст-->
    <div class="block1"> 
     <p>
      Компания была основана в 2020 году 6 апреля. В основу бюджета легли накопления нашего гененрального директора. Наша команда прошла долгий тернистый путь, чтобы стать теми, кем мы являемся на сегодняшнй день.
    </p>
    <p>
      Мы очень благодарны вам, за ваши честные отзывы и ценим каждый полученный ответ.
    </p>
    </div>
    <!--Инфографика-->
    <div class="block2">
      <img src="images/infogramma.png" alt="Инфографика">
    </div>
    <div class="block3">
    <p>
      Доставка происходит по всему городу, и в ЛО по договоренности. Но ближайшее время планируем открыть доставку по всей стране.
    </p>
    <p>
      Благодаря поддержки сверстников нашего директора, такие как Вощинский Евгений, Ледовский Никита и Ленивенко Николай, в нас не угасает энтузиазм, который в связи с пандемии так необходим.
    </p>
    <p>Также привожу к вашему вниманию наши сертификаты о гарантии качества нашей продукции</p></div>
   
    
    </div>
    <a href="sertificates.php">Сертификаты</a>
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