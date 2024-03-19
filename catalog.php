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
  <body class="bg-body-white">
      <?php
        require_once('header.php');
        require_once("classes/DBClass.php");                                
        $db = new DBClass();

        $carName = $_GET["car-name"] ?? null;
        $brand = $_GET["brand"] ?? null;
        $model = $_GET["model"] ?? null;
        $priceLow = $_GET["price-low"] ?? null;
        $priceHigh = $_GET["price-high"] ?? null;
        $condition = $_GET["condition"] ?? null;
        $body = $_GET["body"] ?? null;
        $gear = $_GET["gear"] ?? null;
        $wheelDrive = $_GET["wheel-drive"] ?? null; 
        $engine = $_GET["engine"] ?? null;
        $color = $_GET["color"] ?? null;
        $mileageLow = $_GET["mileage-low"] ?? null;
        $mileageHigh = $_GET["mileage-high"] ?? null;
        $engineVolumeLow = $_GET["engine-volume-low"] ?? null;
        $engineVolumeHigh = $_GET["engine-volume-high"] ?? null; 
        $enginePowerLow = $_GET["engine-power-low"] ?? null;
        $enginePowerHigh = $_GET["engine-power-high"] ?? null;
        $ownersCountLow = $_GET["owners-count-low"] ?? null;
        $ownersCountHigh = $_GET["owners-count-high"] ?? null;
        $passport = $_GET["passport"] ?? null;
        $yearLow = $_GET["year-low"] ?? null;
        $yearHigh = $_GET["year-high"] ?? null;
    
        // $carName = isset($carName) && !empty($carName) ? $carName : NULL;
        // $brand = isset($brand) && !empty($brand) ? $brand : NULL;
        // $model = isset($model) && !empty($model) ? $model : NULL;
        // $priceLow = isset($priceLow) && !empty($priceLow) ? $priceLow : NULL;
        // $priceHigh = isset($priceHigh) && !empty($priceHigh) ? $priceHigh : NULL;
        // $condition = isset($condition) && !empty($condition) ? $condition : NULL;
        // $body = isset($body) && !empty($body) ? $body : NULL;
        // $gear = isset($gear) && !empty($gear) ? $gear : NULL;
        // $wheelDrive = isset($wheelDrive) && !empty($wheelDrive) ? $wheelDrive : NULL;
        // $engine = isset($engine) && !empty($engine) ? $engine : NULL;
        // $color = isset($color) && !empty($color) ? $color : NULL;
        // $mileageLow = isset($mileageLow) && !empty($mileageLow) ? $mileageLow : NULL;
        // $mileageHigh = isset($mileageHigh) && !empty($mileageHigh) ? $mileageHigh : NULL;
        // $engineVolumeLow = isset($engineVolumeLow) && !empty($engineVolumeLow) ? $engineVolumeLow : NULL;
        // $engineVolumeHigh = isset($engineVolumeHigh) && !empty($engineVolumeHigh) ? $engineVolumeHigh : NULL;
        // $enginePowerLow = isset($enginePowerLow) && !empty($enginePowerLow) ? $enginePowerLow : NULL;
        // $enginePowerHigh = isset($enginePowerHigh) && !empty($enginePowerHigh) ? $enginePowerHigh : NULL;
        // $ownersCountLow = isset($ownersCountLow) && !empty($ownersCountLow) ? $ownersCountLow : NULL;
        // $ownersCountHigh = isset($ownersCountHigh) && !empty($ownersCountHigh) ? $ownersCountHigh : NULL;
        // $passport = isset($passport) && !empty($passport) ? $passport : NULL;
        // $yearLow = isset($yearLow) && !empty($yearLow) ? $yearLow : NULL;
        // $yearHigh = isset($yearHigh) && !empty($yearHigh) ? $yearHigh : NULL;

        setcookie('request', '', time() - 3600, '/');
        setcookie('request', $_SERVER['REQUEST_URI'], 0, '/');
        ?>
      <main class="py-4">
        <div class="container pb-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
              <li class="breadcrumb-item active" aria-current="page">Каталог</li>
            </ol>
          </nav>
        </div>  
        <h1 class="container pb-2">Каталог автомобилей</h1>
        <form action="catalog.php" method="get">
          <div class="catalog-filter container bg-white shadow rounded-2 p-3">
            <div class="row">
              <div class="col">
              <ul class="nav nav-underline">
                <?php
                  if($condition !== 'new'){
                    echo("
                      <li class=\"nav-item\">
                        <a class=\"nav-link\" aria-current=\"page\" href=\"catalog.php?condition=new#\">Новые авто</a>
                      </li>
                      <li class=\"nav-item\">
                        <a class=\"nav-link active\" href=\"catalog.php?condition=used#\">С пробегом</a>
                      </li>
                    ");
                    echo("<input hidden value=\"used\" name=\"condition\"> ");
                  }
                  else{
                    echo("
                      <li class=\"nav-item\">
                        <a class=\"nav-link active\" href=\"catalog.php?condition=new#\">Новые авто</a>
                      </li>
                      <li class=\"nav-item\">
                        <a class=\"nav-link\" aria-current=\"page\" href=\"catalog.php?condition=used#\">С пробегом</a>
                      </li>");
                      echo("<input hidden value=\"new\" name=\"condition\"> ");
                    }
                ?>
              </ul>
              </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 my-3"> 
              <div class="col pe-4 py-2">   
              <select name="brand" class="rounded-1 border border-secondary-subtle w-100 h-100 ">
                <?php 
                  $brands = $db->getBrands();
                  if($brand !== NULL)
                    echo("<option disabled>Марка</option>");
                  else
                    echo("<option selected disabled>Марка</option>");
                  foreach($brands as $key => $value) {
                      if($brand !== NULL and $key == $brand)
                        $option = "<option selected value=".$key.">".$value."</option>";
                      else
                        $option = "<option value=".$key.">".$value."</option>";                 
                      echo $option;
                  }
                ?> 
              </select>
              </div>
              <div class="col pe-4  py-2"> 
              <select name="model" class="rounded-1 border border-secondary-subtle w-100 h-100">
                <?php 
                    $result = ($brand !== NULL) ? $db->getModelsByBrand($brand) : $db->getModels();
                    if($model !== NULL)
                      echo("<option disabled>Модель</option>");
                    else
                      echo("<option selected disabled>Модель</option>");
                    foreach($result as $key => $value) {
                        if($model !== NULL and $key == $model)
                          $option = "<option selected value=".$key.">".$value."</option>";
                        else
                          $option = "<option value=".$key.">".$value."</option>";                 
                        echo $option;
                    }
                  ?> 
              </select>
              </div>
              <div class="price-select col pe-4  py-2">
                <div class="row">
                <div class="col px-0 text-center">
                <span class="price-title fw-light w-100">Цена</span>
                </div>
                <div class="col px-0">
                <input name="price-low" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                  <?php 
                  if($priceLow !== NULL)
                    echo("value=\"$priceLow\"");
                  ?>
                  type="number" placeholder="от">
                </div>
                <div class="col">
                <input name="price-high" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                <?php 
                  if($priceHigh !== NULL)
                    echo("value=\"$priceHigh\"");
                  ?>
                type="number" placeholder="до"> 
                </div>  
                </div>        
              </div>
              <div class="col  py-2"> 
                <select name="gear" class="rounded-1 border border-secondary-subtle w-100 h-100">
                  <?php 
                    $result = $db->getGears();
                    if($gear !== NULL)
                      echo("<option disabled>КПП</option>");
                    else
                      echo("<option selected disabled>КПП</option>");
                    foreach($result as $key => $value) {
                        if($gear !== NULL and $key == $gear)
                          $option = "<option selected value=".$key.">".$value."</option>";
                        else
                          $option = "<option value=".$key.">".$value."</option>";                 
                        echo $option;
                    }
                  ?> 
                </select>
              </div>
                <div class="col pe-4  py-2">
                  <div class="collapse multy-collapse" id="col1">   
                  <select name="body" class="rounded-1 border border-secondary-subtle w-100 h-100">
                    <?php 
                      $result = $db->getCarBodies();
                      if($body !== NULL)
                        echo("<option disabled>Кузов</option>");
                      else
                        echo("<option selected disabled>Кузов</option>");
                      foreach($result as $key => $value) {
                          if($body !== NULL and $key == $body)
                            $option = "<option selected value=".$key.">".$value."</option>";
                          else
                            $option = "<option value=".$key.">".$value."</option>";                 
                          echo $option;
                      }
                    ?> 
                  </select>
                  </div>
                  </div>
                  <div class="col pe-4  py-2"> 
                  <div class="collapse multy-collapse" id="col2">
                  <select name="engine" class="rounded-1 border border-secondary-subtle w-100 h-100">
                    <?php 
                      $result = $db->getEngins();
                      if($engine !== NULL)
                        echo("<option disabled>Тип двигателя</option>");
                      else
                        echo("<option selected disabled>Тип двигателя</option>");
                      foreach($result as $key => $value) {
                          if($engine !== NULL and $key == $engine)
                            $option = "<option selected value=".$key.">".$value."</option>";
                          else
                            $option = "<option value=".$key.">".$value."</option>";                 
                          echo $option;
                      }
                    ?> 
                  </select>
                  </div>
                  </div>
                  <div class="col pe-4  py-2"> 
                  <div class="collapse multy-collapse" id="col2">
                    <select name="wheel-drive" class="rounded-1 border border-secondary-subtle w-100 h-100">
                      <?php 
                        $result = $db->getWheelDrives();
                        if($wheelDrive !== NULL)
                          echo("<option disabled>Привод</option>");
                        else
                          echo("<option selected disabled>Привод</option>");
                        foreach($result as $key => $value) {
                            if($wheelDrive !== NULL and $key == $wheelDrive)
                              $option = "<option selected value=".$key.">".$value."</option>";
                            else
                              $option = "<option value=".$key.">".$value."</option>";                 
                            echo $option;
                        }
                      ?> 
                    </select>
                  </div>
                  </div>
                  <div class="col pe-4  py-2"> 
                    <div class="row collapse multy-collapse" id="col3">  
                    <div class="col px-0 text-center">
                          <span class="diapason-title fw-light w-100">Пробег, км</span>
                        </div>
                        <div class="col px-0">
                          <input name="mileage-low" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                          <?php 
                          if($mileageLow !== NULL)
                            echo("value=\"$mileageLow\"");
                          ?>
                          type="number" placeholder="от">
                        </div>
                        <div class="col">
                          <input name="mileage-high" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                          <?php 
                          if($mileageHigh !== NULL)
                            echo("value=\"$mileageHigh\"");
                          ?>
                          type="number" placeholder="до"> 
                        </div>  
                    </div>
                    </div>
                    <div class="col  py-2"> 
                      <div class="row collapse multy-collapse" id="col4">
                      <div class="col px-0 text-center">
                          <span class="diapason-title fw-light w-100">Год выпуска</span>
                        </div>
                        <div class="col px-0">
                          <input name="year-low" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                          <?php 
                          if($yearLow !== NULL)
                            echo("value=\"$yearLow\"");
                          ?>
                          type="number" placeholder="от">
                        </div>
                        <div class="col">
                          <input name="year-high" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                          <?php 
                          if($yearHigh !== NULL)
                            echo("value=\"$yearHigh\"");
                          ?>
                          type="number" placeholder="до"> 
                        </div>  
                      </div>
                    </div>
                    <div class="col pe-4  py-2"> 
                      <div class="row collapse multy-collapse" id="col5">
                      <div class="col px-0 text-center">
                          <span class="diapason-title fw-light w-100">Мощность двигателя, л.с.</span>
                        </div>
                        <div class="col px-0">
                          <input name="engine-power-low" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                          <?php 
                          if($enginePowerLow !== NULL)
                            echo("value=\"$enginePowerLow\"");
                          ?>
                          type="number" placeholder="от">
                        </div>
                        <div class="col">
                          <input name="engine-power-high" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                          <?php 
                          if($enginePowerHigh !== NULL)
                            echo("value=\"$enginePowerHigh\"");
                          ?>
                          type="number" placeholder="до"> 
                        </div>  
                      </div>
                    </div>  
                    <div class="col pe-4  py-2">
                      <div class="row collapse multy-collapse" id="col6">
                        <div class="col px-0 text-center">
                          <span class="diapason-title fw-light w-100">Объем двигателя, л</span>
                        </div>
                        <div class="col px-0">
                          <input name="engine-volume-low" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                          <?php 
                          if($engineVolumeLow !== NULL)
                            echo("value=\"$engineVolumeLow\"");
                          ?>
                          type="number" placeholder="от">
                        </div>
                        <div class="col">
                          <input name="engine-volume-high" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                          <?php 
                          if($engineVolumeHigh !== NULL)
                            echo("value=\"$engineVolumeHigh\"");
                          ?>
                          type="number" placeholder="до"> 
                        </div>  
                      </div>        
                    </div> 
                    <div <?php if($condition == "new") echo("hidden"); ?> class="col pe-4  py-2">
                      <div class="row collapse multy-collapse" id="col7">
                        <div class="col px-0 text-center">
                          <span class="diapason-title fw-light w-100">Количество владельцев</span>
                        </div>
                        <div class="col px-0">
                          <input name="owners-count-low" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                          <?php 
                          if($ownersCountLow !== NULL)
                            echo("value=\"$ownersCountLow\"");
                          ?>
                          type="number" placeholder="от">
                        </div>
                        <div class="col">
                          <input name="owners-count-high" class="rounded-1 border border-secondary-subtle w-100 h-100" 
                          <?php 
                          if($ownersCountHigh !== NULL)
                            echo("value=\"$ownersCountHigh\"");
                          ?>
                          type="number" placeholder="до"> 
                        </div>  
                      </div>        
                    </div>
                    <div <?php if($condition == "new") echo("hidden"); ?> class="col pe-4  py-2"> 
                    <div class="collapse multy-collapse" id="col2">
                      <select name="passport" class="rounded-1 border border-secondary-subtle w-100 h-100">
                        <?php 
                          $result = $db->getVehiclePassports();
                          if($passport !== NULL)
                            echo("<option disabled>ПТС</option>");
                          else
                            echo("<option selected disabled>ПТС</option>");
                          foreach($result as $key => $value) {
                              if($passport !== NULL and $key == $passport)
                                $option = "<option selected value=".$key.">".$value."</option>";
                              else
                                $option = "<option value=".$key.">".$value."</option>";                 
                              echo $option;
                          }
                        ?> 
                      </select>
                    </div>
                    </div> 
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
              <div class="col">
                <div class="form-check form-switch"> 
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target=".multy-collapse" aria-expanded="false" aria-controls="col1 col2 col3 col4 col5 col6">
                  <label class="form-check-label" for="flexSwitchCheckDefault">Расширенный поиск</label>
                </div>
              </div>
              <div class="col">
                <a href="index.php#application" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Не нашли подходящий автомобиль?</a>
              </div>
              <div class="col pe-4">
                <a class="btn btn-outline-secondary w-100" role="button" <?php echo("href=\"catalog.php?condition={$condition}#\"")?>>
                  Сбросить
                </a>
              </div>
              <div class="col">
                <input class="btn btn-primary w-100" type="submit" value="Показать">
              </div>
            </div>
          </div>
        </form>
        <div class="container my-5">
          <div class="cars-section row row-cols-1 row-cols-sm-2 row-cols-md-3 row-gap-3">
            <?php 
            $cars = $db->getCars($carName, $brand, $model, $body, $gear, $wheelDrive, 
            $engine, $color, $priceLow, $priceHigh, $mileageLow, $mileageHigh, $engineVolumeLow, $engineVolumeHigh, 
            $enginePowerLow, $enginePowerHigh, $condition, $ownersCountLow, $ownersCountHigh, $passport, $yearLow, $yearHigh);
            $likedCars = null;
            $reservedCars = null;
            if(!empty($_SESSION['auth'])){
              $likedCars = $db->getUsersCarsById($_SESSION['id']); 
              $reservedCars = $db->getUserReservedCars($_SESSION['id']);
            }                 
            unset($db);

            $messageIfNoResult = 'По запросу ничего не нашлось';
            $addition = 0;
            require_once('carsCards.php');
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
