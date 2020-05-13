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
  <link rel="stylesheet" href="css/reg-log-style.css" type="text/css">
  <title>SmarTuk</title>
    <script src="scripts/visitors.js"></script>
</head>
<body onload="visits()">
 <!--Шапка с лого и баннером-->
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
    <div id="range1">
    <div class="outer">
      <div class="middle">
        <div class="inner">
            <div class="login-wr">
             <!--Загаловок-->
             
              <h2>Регистрация</h2>
              <form action="scripts/registration.php" class="form" method="post">
              <!--Выгрузка об ошибка-->
               <?php if(isset($_SESSION["error_messages"])){ ?><div role="alert" class="messagebox"><?php echo $_SESSION["error_messages"];?></div><?php } unset($_SESSION["error_messages"]);?>
                
                <!--E-mail-->
                <input type="email" name="email" placeholder="Почта">
                <!--Имя пользователя-->
                <input type="text" name="username" placeholder="Имя пользователя" maxlength="30">
                <!--Пароль-->
                <input type="password" name="password" placeholder="Пароль" min="8" maxlength="24">
                <!--Повторить пароль-->
                <input type="password" name="replypassword" placeholder="Повторите пароль" min="8" maxlength="24">
                <button type="submit" > Зарегистрироваться </button>
                
              </form>
            </div>
        </div>
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