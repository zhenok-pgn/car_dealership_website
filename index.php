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
    setcookie('request', '', time() - 3600, '/');
    setcookie('request', $_SERVER['REQUEST_URI'], 0, '/');

    require_once('header.php');
    ?>
    
    <section class="news">
      <div id="carouselExampleRide" class="carousel slide h-100" data-bs-ride="carousel">
        <div class="carousel-inner h-100"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Следующий</span>
        </button>
      </div>
    </section>
    <section class="car-filter mb-5">
      <ul class="nav nav-tabs container" id="myTab" role="tablist">
        <li class="nav-item col" role="presentation">
          <button
            class="nav-link active w-100 mynav-item"
            id="home-tab"
            data-bs-toggle="tab"
            data-bs-target="#home-tab-pane"
            type="button"
            role="tab"
            aria-controls="home-tab-pane"
            aria-selected="true"
          >
            Новые автомобили
          </button>
        </li>
        <li class="nav-item col" role="presentation">
          <button
            class="nav-link w-100 mynav-item"
            id="profile-tab"
            data-bs-toggle="tab"
            data-bs-target="#profile-tab-pane"
            type="button"
            role="tab"
            aria-controls="profile-tab-pane"
            aria-selected="false"
          >
            Автомобили с пробегом
          </button>
        </li>
      </ul>
      <div class="line container"></div>
      <div class="tab-content bg-white pt-4" id="myTabContent">
        <div
          class="tab-pane fade show active container"
          id="home-tab-pane"
          role="tabpanel"
          aria-labelledby="home-tab"
          tabindex="0"
        >
        <p class="text-center fs-3 mb-4 container">Новые автомобили</p>
        <form action="catalog.php" method="get">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4"> 
          <div class="col pe-4">   
          <select class="brand-select-1 rounded-1 border border-secondary-subtle w-100 h-100" name="brand">
          </select>
          </div>
          <div class="col pe-4"> 
          <select class="model-select-1 rounded-1 border border-secondary-subtle w-100 h-100" name="model">
            <option selected disabled>Модель</option>
          </select>
          </div>
          <div class="price-select col pe-4">
            <div class="row">
            <div class="col px-0 text-center">
            <span class="price-title fw-light w-100">Цена</span>
            </div>
            <div class="col px-0">
            <input class="rounded-1 border border-secondary-subtle w-100 h-100" type="number" placeholder="от" name="price-low">
            </div>
            <div class="col">
            <input class="rounded-1 border border-secondary-subtle w-100 h-100" type="number" placeholder="до" name="price-high"> 
            </div>  
            </div> 
            <input hidden value="new" name="condition">       
          </div>
          <div class="col">
            <input class="btn btn-primary w-100" type="submit" value="Показать авто">
          </div>
        </div>
        </form>
        <div class="line mt-4 mb-4"></div>
          <div class="row row-cols-1 row-cols-sm-4 row-cols-lg-9">
            <a class="col p-3" href="catalog.php?condition=new&body=cupe">
              <img src="image/cupe.svg" alt="">
              <span class="ms-3">Купе</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&body=furgon">
              <img src="image/furgon.svg" alt="">
              <span class="ms-3">Фургон</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&body=hatch">
              <img src="image/hatch.svg" alt="">
              <span class="ms-3">Хэтчбек</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&body=microbus">
              <img src="image/microbus.svg" alt="">
              <span class="ms-3">Микроавтобус</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&body=minivan">
              <img src="image/minivan.svg" alt="">
              <span class="ms-3">Минивен</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&body=pickup">
              <img src="image/pickup.svg" alt="">
              <span class="ms-3">Пикап</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&body=sedan">
              <img src="image/sedan.svg" alt="">
              <span class="ms-3">Седан</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&body=suv">
              <img src="image/suv.svg" alt="">
              <span class="ms-3">Внедорожник</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&body=universal">
              <img src="image/universal.svg" alt="">
              <span class="ms-3">Универсал</span>
            </a>
          </div>
          <div class="line mt-4 mb-4"></div>
          <div class="brands-block-1 row row-cols-1 row-cols-sm-4 row-cols-md-6">
          </div>
          <div class="line mt-4 mb-4"></div>
          <div class="row row-cols-1 row-cols-sm-4 row-cols-lg-7">
            <a class="col p-3" href="catalog.php?condition=new&engine=benzine">
              <img src="image/gasoline.svg" alt="">
              <span class="ms-3">Бензин</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&engine=diesel">
              <img src="image/diesel.svg" alt="">
              <span class="ms-3">Дизель</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&">
              <img src="image/beginner-auto.svg" alt="">
              <span class="ms-3">Для новичка</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&">
              <img src="image/family-auto.svg" alt="">
              <span class="ms-3">Семейный </span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&">
              <img src="image/town-car.svg" alt="">
              <span class="ms-3">Для города</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&">
              <img src="image/dlya-prigoroda.svg" alt="">
              <span class="ms-3">Для пригорода</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=new&">
              <img src="image/dlya-puteshesvii.svg" alt="">
              <span class="ms-3">Для путешествий</span>
            </a>
          </div>
        </div>
        <div
          class="tab-pane fade container"
          id="profile-tab-pane"
          role="tabpanel"
          aria-labelledby="profile-tab"
          tabindex="0"
        >
        <p class="text-center fs-3 mb-4 container">Автомобили с пробегом</p>
        <form action="catalog.php" method="get">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4"> 
            <div class="col pe-4">   
            <select class="brand-select-2 rounded-1 border border-secondary-subtle w-100 h-100" name="brand">
            </select>
            </div>
            <div class="col pe-4"> 
            <select class="model-select-2 rounded-1 border border-secondary-subtle w-100 h-100" name="model">
              <option selected disabled>Модель</option>
            </select>
            </div>
            <div class="price-select col pe-4">
              <div class="row">
              <div class="col px-0 text-center">
              <span class="price-title fw-light w-100">Цена</span>
              </div>
              <div class="col px-0">
              <input class="rounded-1 border border-secondary-subtle w-100 h-100" type="number" placeholder="от" name="price-low">
              </div>
              <div class="col">
              <input class="rounded-1 border border-secondary-subtle w-100 h-100" type="number" placeholder="до" name="price-high"> 
              </div>  
              </div> 
              <input hidden value="used" name="condition">       
            </div>
            <div class="col">
              <input class="btn btn-primary w-100" type="submit" value="Показать авто">
            </div>
          </div>
          </form>
        <div class="line mt-4 mb-4"></div>
          <div class="row row-cols-1 row-cols-sm-4 row-cols-lg-9">
            <a class="col p-3" href="catalog.php?condition=used&body=cupe">
              <img src="image/cupe.svg" alt="">
              <span class="ms-3">Купе</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&body=furgon">
              <img src="image/furgon.svg" alt="">
              <span class="ms-3">Фургон</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&body=hatch">
              <img src="image/hatch.svg" alt="">
              <span class="ms-3">Хэтчбек</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&body=microbus">
              <img src="image/microbus.svg" alt="">
              <span class="ms-3">Микроавтобус</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&body=minivan">
              <img src="image/minivan.svg" alt="">
              <span class="ms-3">Минивен</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&body=pickup">
              <img src="image/pickup.svg" alt="">
              <span class="ms-3">Пикап</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&body=sedan">
              <img src="image/sedan.svg" alt="">
              <span class="ms-3">Седан</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&body=suv">
              <img src="image/suv.svg" alt="">
              <span class="ms-3">Внедорожник</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&body=universal">
              <img src="image/universal.svg" alt="">
              <span class="ms-3">Универсал</span>
            </a>
          </div>
          <div class="line mt-4 mb-4"></div>
          <div class="brands-block-2 row row-cols-1 row-cols-sm-4 row-cols-md-6">
          </div>
          <div class="line mt-4 mb-4"></div>
          <div class="row row-cols-1 row-cols-sm-4 row-cols-lg-7">
            <a class="col p-3" href="catalog.php?condition=used&engine=benzine">
              <img src="image/gasoline.svg" alt="">
              <span class="ms-3">Бензин</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&engine=diesel">
              <img src="image/diesel.svg" alt="">
              <span class="ms-3">Дизель</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&">
              <img src="image/beginner-auto.svg" alt="">
              <span class="ms-3">Для новичка</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&">
              <img src="image/family-auto.svg" alt="">
              <span class="ms-3">Семейный </span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&">
              <img src="image/town-car.svg" alt="">
              <span class="ms-3">Для города</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&">
              <img src="image/dlya-prigoroda.svg" alt="">
              <span class="ms-3">Для пригорода</span>
            </a>
            <a class="col p-3" href="catalog.php?condition=used&">
              <img src="image/dlya-puteshesvii.svg" alt="">
              <span class="ms-3">Для путешествий</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section>
      <form id="application" class="container shadow p-3" action="" method="">
        <?php
        require_once("classes/DBClass.php");                             
        $db = new DBClass();
        $user = null;
        if(!empty($_SESSION['auth'])){
          $user = $db->getUserById($_SESSION['id']);
        }
        unset($db);
        ?>
        <div>
          <p class="text-center fs-3">Оставьте заявку и наш специалист свяжется с Вами</p>
        </div>
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 px-5 pt-1 pb-3">
          <div class="col">
            <input type="text" name="user-name" class="user-name-input rounded-1 border border-secondary-subtle w-100 h-100" placeholder="Имя" value="<?php echo $user['name'];?>">
          </div>
          <div class="col">
            <input type="tel" name="phone" id="" class="phone-number-input rounded-1 border border-secondary-subtle w-100 h-100" placeholder="Телефон" value="<?php echo $user['login'];?>">
          </div>
          <div class="col">
            <select name="theme" class="theme-select rounded-1 border border-secondary-subtle w-100 h-100">
            </select>
          </div>
        </div>
        <div class="text-center">
          <input type="button" class="send-application-btn btn btn-primary w-25" value="Отправить">
        </div>
      </form>
    </section>
    <?php
      require_once('footer.php');
    ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="js/indexPageUpload.js"></script>
  </body>
</html>
