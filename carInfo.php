<?php
require_once("classes/LikeButtons.php"); 
$db = new DBClass();

$carouselIcons = "";
$carouselImages = "";
$images =  $car->images;
for($j = 0; $j < count($images); $j++){
    $path = $images[$j]->path;
    $active = $j == 0 ? "active" : "";
    $carouselIcons = $carouselIcons."
      <img class=\"product-image $active col pt-3 px-1\" src=\"$path\" alt=\"\">";
    $carouselImages = $carouselImages."
      <div class=\"carousel-item $active\">
        <img
          src=\"$path\"
          class=\"w-100\"
        />
      </div>";
}

$icon = getUnlikedButt();
$selected = 'false';
if($likedCars != null)
    if(in_array($car->id, $likedCars)){
        $icon = getLikedButt();
        $selected = 'true';
        }
$reserved = 'false';
$text = 'Забронировать';
if($reservedCars != null and in_array($car->id, $reservedCars)){
    $reserved = 'true';
    $text = 'Забронирована';
}
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2">
    <div class="col-md-8 px-3">
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide col px-0 mb-2">
                <div class="carousel-inner">
                    <?php
                        echo $carouselImages;
                    ?>
                </div>
                <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev"
                >
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next"
                >
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row row-cols-4 row-cols-sm-5 row-cols-md-6">
            <?php
                echo $carouselIcons;
            ?>
        </div>
    </div>
    <div class="col-md-4 ps-3 pe-5">
        <div>
            <h3 class="pb-2"><?php echo("{$car->brand} {$car->model}"); ?></h3>
            <h2 class="pb-2"><?php echo("{$car->price} &#8381"); ?></h2>
        </div>
        <div class="row">
            <button type="button" class="make-reservation-btn col btn btn-primary" data-reserved="<?php echo $reserved; ?>" data-carid="<?php echo $car->id; ?>"><?php echo $text; ?></button>             
            <div class="col">
                <img 
                    class="like-button" 
                    data-carid="<?php echo $car->id; ?>" 
                    data-selected="<?php echo $selected; ?>" 
                    src="<?php echo $icon; ?>" 
                    alt="..."
                >
            </div>
        </div>
        <div class="pt-4">
            <p class="pt-0">
                Год выпуска: <?php echo $car->year; ?>
            </p>
            <?php
                if($car->condition =="used"){
                ?>
                    <p class="pt-0">
                        Пробег: <?php echo $car->mileage; ?> км
                    </p>
                    <p class="pt-0">
                        Количество владельцев: <?php echo $car->ownersCount; ?>
                    </p>
                    <p class="pt-0">
                        ПТС: <?php echo $db->getTitle('VehiclePassport', $car->passport); ?>
                    </p>
                <?php
                }
            ?>
            <p class="pt-0">
                Кузов: <?php echo $db->getTitle('CarBody', $car->body); ?>
            </p>
            <p class="pt-0">
                Привод: <?php echo $db->getTitle('WheelDrive', $car->wheelDrive); ?>
            </p>
            <p class="pt-0">
                КПП: <?php echo $db->getTitle('GearBox', $car->gear); ?>
            </p>
            <p class="pt-0">
                Тип двигателя: <?php echo $db->getTitle('Engine', $car->engine); ?>
            </p>
            <p class="pt-0">
                Объем двигателя: <?php echo $car->engineVolume; ?> л
            </p>
            <p class="pt-0">
                Мощность двигателя: <?php echo $car->enginePower; ?> л.с.
            </p>
        </div>
    </div>
</div> 
<?php
    unset($db);
?>