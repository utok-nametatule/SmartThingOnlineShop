<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <!--Основной стиль-->
  <link rel="stylesheet" href="css/main-style.css" type="text/css">
  <!--Дополнительный стиль-->
  <link rel="stylesheet" href="css/serti-style.css" type="text/css">
  <title>SmarTuk</title>
  <script src="scripts/visitors.js"></script>
</head>
<body onload="visits()">
  <header>
   <!--Лого-->
    <div class="logo">
      <img src="images/logo.png" alt="LOGO">
    </div>
    <!--Баннер-->
    <div class="banner">
     <!--Вернуться на предыдущую страницу-->
      <a href="#" onclick="history.back();">Назад</a>
    </div>
  </header>
  <!--Основной контент-->
  <main>
   <!--Заголовок-->
    <h1>Сертификаты</h1>
    <div class="serti">
      <!--Первый сертификат-->
      <img src="images/sert1.jpg" alt="Сертификат 1">
      <!--Второй сертификат-->
      <img src="images/sert2.jpg" alt="Сертификат 2">
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