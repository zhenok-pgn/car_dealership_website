
<?php
    require_once("classes/LikeButtons.php");                                           
    $db = new DBClass();

    for($i = 0; $i < count($cars); $i++){ 
    ?>
    <div class="car-card col w-35" data-carid="<?php echo $cars[$i]->id; ?>">
        <div class="card border-0 rounded-2 p-2 h-100">
          
            <div id="carouselExampleIndicators<?php echo("{$i}{$addition}"); ?>" class="carousel slide">
                <div class="carousel-indicators">
      
                    <?php
                        $images =  $cars[$i]->images;
                        for($j = 0; $j < count($images); $j++){
                            $path = $images[$j]->path;
                            if($j == 0){
                            ?>
                                <button 
                                    type="button" 
                                    data-bs-target="#carouselExampleIndicators<?php echo("{$i}{$addition}"); ?>" 
                                    data-bs-slide-to="<?php echo("{$j}"); ?>" 
                                    data-is-not-clickable="true"
                                    class="active bg-info" 
                                    aria-current="true" 
                                    aria-label="Slide <?php echo("{$j}"); ?>">
                                </button>
                            <?php
                            }
                            else{
                            ?>
                                <button 
                                    type="button" 
                                    data-bs-target="#carouselExampleIndicators<?php echo("{$i}{$addition}"); ?>" 
                                    data-bs-slide-to="<?php echo("{$j}"); ?>" 
                                    data-is-not-clickable="true"
                                    class="active bg-info" 
                                    aria-label="Slide <?php echo("{$j}"); ?>">
                                </button>
                            <?php
                            }
                        }
                        ?>
                </div>
                <div class="carousel-inner">
                    <?php
                    for($j = 0; $j < count($images); $j++){
                        $path = $images[$j]->path;
                        if($j == 0){
                        ?>
                            <div class="carousel-item active">
                                <img src="<?php echo("{$path}"); ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php
                        }
                        else{
                        ?>
                            <div class="carousel-item">
                                <img src="<?php echo("{$path}"); ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php
                        }
                    } 
                    $icon = getUnlikedButt();
                    $selected = 'false';
                    if($likedCars != null)
                        if(in_array($cars[$i]->id, $likedCars)){
                            $icon = getLikedButt();
                            $selected = 'true';
                        }
                    $reserved = 'false';
                    $text = 'Забронировать';
                    if($reservedCars != null and in_array($cars[$i]->id, $reservedCars)){
                      $reserved = 'true';
                      $text = 'Забронирована';
                    }
                    ?>
                </div>
            </div>              
            <div class="card-body container">
              <div class="row">
                <h6 class="card-title col"><?php echo("{$cars[$i]->brand} {$cars[$i]->model} {$cars[$i]->year}"); ?></h6>
                <div class="col text-end">
                  <img 
                    class="like-button" 
                    data-is-not-clickable="true"
                    data-carid="<?php echo("{$cars[$i]->id}"); ?>" 
                    data-selected="<?php echo $selected; ?>" 
                    src="<?php echo $icon; ?>" 
                    alt="..."
                  >
                </div>
              </div>
              <div class="row">
                <h5 class="card-title"><?php echo("{$cars[$i]->price}"); ?> &#8381</h5>
              </div>
              <div class="row">
                <p class="col">
                  <?php echo("{$db->getTitle('CarBody', $cars[$i]->body)}"); ?> 	&#149 
                  <?php echo("{$db->getTitle('GearBox', $cars[$i]->gear)}"); ?> 	&#149 
                  <?php echo("{$db->getTitle('WheelDrive', $cars[$i]->wheelDrive)}"); ?> 	&#149
                  <?php echo("{$cars[$i]->engineVolume}"); ?> л.	&#149  
                  <?php echo("{$cars[$i]->enginePower}"); ?> л.с.	&#149  
                  <?php echo("{$db->getTitle('Engine', $cars[$i]->engine)}"); ?>
                </p>
              </div>
              <div class="row">
                <div class="col text-center">
                  <button type="button" class="make-reservation-btn btn btn-primary w-100" data-is-not-clickable="true" data-reserved="<?php echo $reserved; ?>" data-carid="<?php echo $cars[$i]->id; ?>"><?php echo $text; ?></button>
                </div>               
              </div>
            </div>  
        </div> 
    </div>
    <?php   
    }
    
    // message, if no result
    unset($db);
    if(count($cars) == 0){
    ?>
    <div class="p-5">
      <p class="my-5 py-5 text-center fs-2 fw-normal"><?php echo $messageIfNoResult; ?></p>
    </div>
    <?php
    }
?> 
