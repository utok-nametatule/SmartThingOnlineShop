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
  <title>SmarTuk</title>
  <script src="scripts/basket.js"></script>
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
    <!--Загаловки с переходами-->
    <h1><a href="catalog.php">Каталог</a> | <a href="recom.php">Отзывы</a></h1>
    <div class="comments">
     <?php
      //Подключение к БД
      require('scripts/connect.php');
      //Запрос на получение всех отзывов
      $query = "SELECT username, comment, data FROM comment;";
      //Отправка запроса
      $sql = mysqli_query($connection,$query);
      //Для чередование стилей
      $i = 0;
      while ($result = mysqli_fetch_array($sql)) 
      {
        //Чередование стилей
        $i++;
        if ($i % 2 != 0) $f_s = "first";
        else $f_s = "second";
        //Вывод отзыва
        echo "<div class='comment ".$f_s."'>
        <div>
        <h2>".$result['username']."</h2>
        <span>".$result['data']."</span></div>
        <p>".$result['comment']."</p></div>";
      }
      //Если нет отзывов он виведет что их нет
      if ($i == 0) echo "<div>Пока что отзывов нет</div>";
      ?>
      <div class="newcomment">
     <form action="scripts/newcomment.php" method="post">
      <!--Выгрузка об ошибка-->
       <?php if(isset($_SESSION["error_messages"])){ ?><div role="alert"><?php echo $_SESSION["error_messages"];?></div><?php } unset($_SESSION["error_messages"]);?>
       <!--Загружает кнопку и поле для ввода, если пользователь вошел-->
       <?php 
       if (isset($_SESSION['username']) &&   isset($_SESSION['password']))
       { 
         echo '<textarea name="comment" maxlength="255" cols="100" rows="10" style="resize: none;"></textarea><br>
       <button class="sub" type="submit">Отправить</button>';
       }
       else 
       { 
         echo 'Доступно только для просмотра<br>Предлагаю вам <a href="log.php" class="log-in-a">авторизоваться</a> на нашем сайте';
       }
       ?>
         
     </form>
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