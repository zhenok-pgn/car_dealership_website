<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body>
    <?php
    require_once('header.php');
    require_once("classes/DBClass.php");
    $db = new DBClass();

    if (empty($_SESSION['auth']))
      header("Location: authorization.php");
    
    $user = $db->getUserById($_SESSION['id']);

    setcookie('request', '', time() - 3600, '/');
    setcookie('request', $_SERVER['REQUEST_URI'], 0, '/');
    ?>
      <main class="py-4">
        <div class="container pb-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
              <li class="breadcrumb-item active" aria-current="page">Личный кабинет</li>
            </ol>
          </nav>
        </div> 
        <div class="container">
          <form action="editAccaunt.php" method="post">
            <h1 class="h3 fw-normal w-50">Личный кабинет</h1>
            <div class="form-floating w-50 mt-2">
              <input
                class="form-control"
                id="floatingInput"
                placeholder="Имя"
                name="name"
                value="<?php echo $user['name'];?>"
              />
              <label for="floatingInput">Имя</label>
            </div>
            <div class="form-floating w-50 mt-2">
              <input
                type="tel"
                class="form-control"
                id="floatingTel"
                placeholder="Телефон"
                name="login"
                value="<?php echo $user['login'];?>"
                readonly
              />
              <label for="floatingTel">Телефон</label>
            </div>
            <button class="btn btn-primary w-50 py-2 mt-2" type="submit">Применить</button>
            <a href="logout.php" class="btn btn-primary w-50 py-2 mt-2" type="submit">Выйти из аккаунта</a>
          </form>
        </div>
        <div class="container my-4">
          <h1 class="h3 fw-normal w-50">Избранные</h1>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-gap-3">
            <?php
              $cars = $db->getCarsByUserId($_SESSION['id']);
              $likedCars = $db->getUsersCarsById($_SESSION['id']);
              $reservedCars = $db->getUserReservedCars($_SESSION['id']);
              unset($db);

              $addition = 0;
              $messageIfNoResult = 'Нет избранных автомобилей';
              require('carsCards.php');
            ?>
          </div>
          <h1 class="h3 fw-normal w-50 mt-4">Забронированные</h1>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-gap-3">
            <?php
              $db = new DBClass();
              $cars = $db->getUserReservedCarsClasses($_SESSION['id']);
              unset($db);

              $addition++;
              $messageIfNoResult = 'Нет забронированных автомобилей';
              require('carsCards.php');
            ?>
          </div>
        </div>
      </main>
      <?php
      require_once('footer.php');
      ?>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"
      ></script>
      <script src="js/catalogPageUpload.js"></script>
  </body>
</html>
