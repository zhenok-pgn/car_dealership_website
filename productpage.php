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
  <body class="bg-white">
    <?php
    require_once('header.php');
    require_once("classes/DBClass.php");                                
    $db = new DBClass();

    $carId = $_GET["car-id"] ?? null;

    setcookie('request', '', time() - 3600, '/');
    setcookie('request', $_SERVER['REQUEST_URI'], 0, '/');
    ?>
      <main class="py-4">
        <div class="container pb-2">
          <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
            <li class="breadcrumb-item"><a href="catalog.php">Каталог</a></li>
            <li class="breadcrumb-item active" aria-current="page">Авто</li>
          </ol>
        </nav>
        </div>
        <div class="container">
          <?php
            $car = $db->getCarById($carId);
            $likedCars = null;
            $reservedCars = null;
            if(!empty($_SESSION['auth'])){
              $likedCars = $db->getUsersCarsById($_SESSION['id']); 
              $reservedCars = $db->getUserReservedCars($_SESSION['id']);
            }   
            unset($db);
            require_once('carInfo.php');
          ?>
        </div>
      </main>
      <div class="mt-5 pt-5">
      <?php
      require_once('footer.php');
      ?>
      </div>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"
      ></script>
      <script src="js/catalogPageUpload.js"></script>
  </body>
</html>
