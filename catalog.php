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
  <link rel="stylesheet" href="css/catalog-style.css" type="text/css">
  <link rel="stylesheet" href="css/modal-window.css" type="text/css">
  <title>SmarTuk</title>
  <!--Скрипт для фильтрации и загрузки товаров из XML-->
  <script src="scripts/filtres.js"></script>
  <!--Скрипт для корзины-->
  <script src="scripts/basket.js"></script>
  <!--Скрипт для просмотров-->
  <script src="scripts/visitors.js"></script>
  <script src="scripts/modal-window.js"></script>
</head>
<body onload="setStore();countItems();visits()">
 <!--Подключение внешнего XML файла-->
  <object id="purchase-order" data="xml/shop.xml" type="text/xml" style="display: none;"></object>
  <!--Дополнительное подключение скриптов, чтобы все работало, а без них не работает-->
  <script src="scripts/filtres.js"></script>
  <script src="scripts/basket.js"></script>
  <script src="scripts/visitors.js"></script>
  <script src="scripts/modal-window.js"></script>
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
   <h1><a href="catalog.php">Каталог</a> | <a href="recom.php">Отзывы</a></h1>
   <content>
     <aside>
      <!--Фильтры-->
       <h2>Фильтры</h2>
       <!--Категории товаров-->
       <div class="categories">
         <h3>Категории</h3>
         <p onclick="setCategories('Камеры видеонаблюдения')">Камеры видеонаблюдения</p>
         <p onclick="setCategories('Умный свет')">Умный свет</p>
         <p onclick="setCategories('Роботы-пылесосы')">Роботы-пылесосы</p>
       </div>
       <!--Бренды товаров-->
       <form name="brandForm" class="brand">
         <h3>Бренд</h3>
         
         <p><input type="checkbox" name="group1" id="check1" onclick="getBrand(brandForm.check1)" value="ELARI"><label for="check1">ELARI</label></p>
         
         <p><input type="checkbox" name="group1" id="check2" onclick="getBrand(brandForm.check2)" value="HomeTree"><label for="check2">HomeTree</label></p>
         
         <p><input type="checkbox" name="group1" id="check3" onclick="getBrand(brandForm.check3)" value="Nokia"><label for="check3">Nokia</label></p>
         
         <p><input type="checkbox" name="group1" id="check4" onclick="getBrand(brandForm.check4)" value="Philips"><label for="check4">Philips</label></p>
         
         <p><input type="checkbox" name="group1" id="check5" onclick="getBrand(brandForm.check5)" value="Xiaomi"><label for="check5">Xiaomi</label></p>
         
       </form>
       <div class="cost">
        <!--Стоимость товаров-->
         <h3>Стоимость</h3>
         <form  name="money">
           <p>990 р. <input type="range" name="range" min="990" max="100990" step="1000" onchange="dragMoney(money)"> 100 990 р.</p>
           <p id="money">50 990 р.</p>
         </form>
       </div>
       <!--Кнопка отфильтровать-->
       <div class="submit">
         <button onclick="Filters()">Отфильтровать</button>
       </div>
     </aside>
     <!--Куда загружается товар-->
     <article id="article">
     </article>
   </content>
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