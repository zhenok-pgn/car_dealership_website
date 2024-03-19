<?php

class CarClass {
    public $id;
    public $brand;
    public $model;
    public $body;
    public $year;
    public $gear;
    public $wheelDrive;
    public $engine;
    public $color;
    public $price;
    public $mileage;
    public $engineVolume;
    public $enginePower;
    public $condition;
    public $ownersCount;
    public $passport;
    public $images;

    public function __construct(
        $id, $brand, $model, $body, $gear, $wheelDrive, 
        $engine, $color, $price, $mileage, $engineVolume, 
        $enginePower, $condition, $ownersCount = NULL, $passport = NULL, $images, $year
        ) {
        $this->id= $id;
        $this->brand = $brand; 
        $this->model = $model; 
        $this->body = $body; 
        $this->gear = $gear; 
        $this->wheelDrive = $wheelDrive; 
        $this->engine = $engine; 
        $this->color = $color; 
        $this->price = $price; 
        $this->mileage = $mileage; 
        $this->engineVolume = $engineVolume; 
        $this->enginePower = $enginePower; 
        $this->condition = $condition; 
        $this->ownersCount = $ownersCount;
        $this->passport = $passport;
        $this->images = $images;
        $this->year = $year;
    }

    function __destruct() {
        
    }
}

?>