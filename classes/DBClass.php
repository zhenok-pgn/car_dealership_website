<?php

class DBClass {
    private $server = "localhost";
    private $userName = "root";
    private $userPassword = "";
    private $dbName = "f0875693_carStore";
    
    private $link;

    public function __construct() {
        $this->link = 
            mysqli_connect(
                $this->server, 
                $this->userName, 
                $this->userPassword,
                $this->dbName);
    }

    function __destruct() {
        mysqli_close($this->link);
    }

    function getSells(){
        $result = [];
        $query = "
            SELECT t2.Id, t1.Path 
            FROM Image t1 INNER JOIN Sell t2 
            ON t1.ImageId = t2.ImageIdRS
            WHERE t2.DateEnd >= CURRENT_DATE() or t2.DateEnd is null";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[$row['Id']] =  $row['Path'];                               
        }
        return $result;
    }

    function getThemes(){
        $result = [];
        $query = "
            SELECT Name, Title 
            FROM Theme 
            ORDER BY Title";            
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[$row['Name']] =  $row['Title'];                               
        }
        return $result;
    }

    function getUsers(){
        $result = [];
        $query = "
            SELECT UserId, Phone, Password, FirstName 
            FROM User";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[] = ['login' => $row['Phone'], 'password' => $row['Password'], 'id' => $row['UserId'], 'name' => $row['FirstName']];                               
        }
        return $result;
    }

    function getUserById($id){
        $result = null;
        $query = "
            SELECT UserId, Phone, Password, FirstName 
            FROM User
            WHERE UserId = $id";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result = ['login' => $row['Phone'], 'password' => $row['Password'], 'id' => $row['UserId'], 'name' => $row['FirstName']];                               
        }
        return $result;
    }

    function getUsersCarsById($id){
        $result = [];
        $query = "
            SELECT CarIdRS 
            FROM User_Car
            WHERE UserIdRS = $id";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[] = $row['CarIdRS'];                               
        }
        return $result;
    }

    function getUserReservedCars($id){
        $result = [];
        $query = "
            SELECT CarId 
            FROM UserReservedCar
            WHERE UserId = $id";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[] = $row['CarId'];                               
        }
        return $result;
    }

    function getCars($carName = NULL, $brand = NULL, $model = NULL, $body = NULL, $gear = NULL, $wheelDrive = NULL, 
        $engine = NULL, $color = NULL, $priceLow = NULL, $priceHigh = NULL, $mileageLow = NULL, $mileageHigh = NULL, $engineVolumeLow = NULL, $engineVolumeHigh = NULL, 
        $enginePowerLow = NULL, $enginePowerHigh = NULL, $condition = NULL, $ownersCountLow = NULL, $ownersCountHigh = NULL, $passport = NULL,
        $yearLow = NULL, $yearHigh = NULL
        ){
        require_once("CarClass.php");
        require_once("ImageClass.php");
        $result = [];
        $query = "
            SELECT t1.CarId, t2.ModelName, t3.BrandName, Price, CarBody, GearBox, Engine, EnginePower, EngineVolume, CarCondition, VehiclePassport, OwnerCount, Year, Mileage, WheelDrive
            FROM Car t1 INNER JOIN Model t2 ON t1.ModelIdRS = t2.ModelId 
            INNER JOIN  Brand t3 on t2.BrandIdRS = t3.BrandId 
            ";
        $isFisrstCondition = TRUE;
        if($carName != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE (BrandName like '%$carName%' or ModelName like '%$carName%') " : $query."and (BrandName like '%$carName%' or ModelName like '%$carName%') ";
            $isFisrstCondition = FALSE;
        }
        if($brand != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE BrandId = $brand " : $query."and BrandId = $brand ";
            $isFisrstCondition = FALSE;
        }
        if($model != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE ModelId = $model " : $query."and ModelId = $model ";
            $isFisrstCondition = FALSE;
        }
        if($gear != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE GearBox = '$gear' " : $query."and GearBox = '$gear' ";
            $isFisrstCondition = FALSE;
        }
        if($wheelDrive != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE WheelDrive = '$wheelDrive' " : $query."and WheelDrive = '$wheelDrive' ";
            $isFisrstCondition = FALSE;
        }
        if($priceLow != NULL and $priceHigh != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE (Price between $priceLow and $priceHigh) " : $query."and (Price between $priceLow and $priceHigh) ";
            $isFisrstCondition = FALSE;
        }
        if($condition != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE CarCondition = '$condition' " : $query."and CarCondition = '$condition' ";
            $isFisrstCondition = FALSE;
        }
        if($body != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE CarBody = '$body' " : $query."and CarBody = '$body' ";
            $isFisrstCondition = FALSE;
        }
        if($engine != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE Engine = '$engine' " : $query."and Engine = '$engine' ";
            $isFisrstCondition = FALSE;
        }
        if($enginePowerLow != NULL and $enginePowerHigh != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE (EnginePower between $enginePowerLow and $enginePowerHigh) " : $query."and (EnginePower between $enginePowerLow and $enginePowerHigh) ";
            $isFisrstCondition = FALSE;
        }
        if($passport != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE VehiclePassport = '$passport' " : $query."and VehiclePassport = '$passport' ";
            $isFisrstCondition = FALSE;
        }
        if($engineVolumeLow != NULL and $engineVolumeHigh != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE (EngineVolume between $engineVolumeLow and $engineVolumeHigh) " : $query."and (EngineVolume between $engineVolumeLow and $engineVolumeHigh) ";
            $isFisrstCondition = FALSE;
        }
        if($ownersCountLow != NULL and $ownersCountHigh != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE (OwnerCount between $ownersCountLow and $ownersCountHigh) " : $query."and (OwnerCount between $ownersCountLow and $ownersCountHigh) ";
            $isFisrstCondition = FALSE;
        }
        if($yearLow != NULL and $yearHigh != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE (Year between $yearLow and $yearHigh) " : $query."and (Year between $yearLow and $yearHigh) ";
            $isFisrstCondition = FALSE;
        }
        if($mileageLow != NULL and $mileageHigh != NULL){
            $query = ($isFisrstCondition) ? $query."WHERE (Mileage between $mileageLow and $mileageHigh) " : $query."and (Mileage between $mileageLow and $mileageHigh) ";
            $isFisrstCondition = FALSE;
        }             
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $crId = $row['CarId'];
            $subQuery = "
                SELECT t1.CarIdRS, t2.ImageId, t2.Path 
                FROM Image_Car t1 INNER JOIN Image t2 on t1.ImageIdRS = t2.ImageId
                WHERE t1.CarIdRS = $crId";
            $subQueryResult = mysqli_query($this->link, $subQuery); 
            $images = [];
            while ($rowOFImages = mysqli_fetch_assoc($subQueryResult)) {
                $images[] = new ImageClass($rowOFImages['ImageId'], $rowOFImages['Path']);
            }
            $result[] = new CarClass($row['CarId'], $row['BrandName'], $row['ModelName'], $row['CarBody'], $row['GearBox'], $row['WheelDrive'], 
            $row['Engine'], $row['Color'], $row['Price'], $row['Mileage'], $row['EngineVolume'], 
            $row['EnginePower'], $row['CarCondition'], $row['OwnerCount'], $row['VehiclePassport'], $images, $row['Year']);                               
        }
        return $result;
    }

    function getCarsByUserId($userId){
        require_once("CarClass.php");
        require_once("ImageClass.php");
        $result = [];
        $query = "
            SELECT t1.CarId, t2.ModelName, t3.BrandName, Price, CarBody, GearBox, Engine, EnginePower, EngineVolume, CarCondition, VehiclePassport, OwnerCount, Year, Mileage, WheelDrive
            FROM Car t1 INNER JOIN Model t2 ON t1.ModelIdRS = t2.ModelId 
            INNER JOIN  Brand t3 on t2.BrandIdRS = t3.BrandId 
            WHERE CarId IN (SELECT CarIdRS FROM User_Car where UserIdRS = $userId)
            ";

        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $crId = $row['CarId'];
            $subQuery = "
                SELECT t1.CarIdRS, t2.ImageId, t2.Path 
                FROM Image_Car t1 INNER JOIN Image t2 on t1.ImageIdRS = t2.ImageId
                WHERE t1.CarIdRS = $crId";
            $subQueryResult = mysqli_query($this->link, $subQuery); 
            $images = [];
            while ($rowOFImages = mysqli_fetch_assoc($subQueryResult)) {
                $images[] = new ImageClass($rowOFImages['ImageId'], $rowOFImages['Path']);
            }
            $result[] = new CarClass($row['CarId'], $row['BrandName'], $row['ModelName'], $row['CarBody'], $row['GearBox'], $row['WheelDrive'], 
            $row['Engine'], $row['Color'], $row['Price'], $row['Mileage'], $row['EngineVolume'], 
            $row['EnginePower'], $row['CarCondition'], $row['OwnerCount'], $row['VehiclePassport'], $images, $row['Year']);                               
        }
        return $result;
    }

    function getUserReservedCarsClasses($userId){
        require_once("CarClass.php");
        require_once("ImageClass.php");
        $result = [];
        $query = "
            SELECT t1.CarId, t2.ModelName, t3.BrandName, Price, CarBody, GearBox, Engine, EnginePower, EngineVolume, CarCondition, VehiclePassport, OwnerCount, Year, Mileage, WheelDrive
            FROM Car t1 INNER JOIN Model t2 ON t1.ModelIdRS = t2.ModelId 
            INNER JOIN  Brand t3 on t2.BrandIdRS = t3.BrandId 
            WHERE CarId IN (SELECT CarId FROM UserReservedCar where UserId = $userId)
            ";

        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $crId = $row['CarId'];
            $subQuery = "
                SELECT t1.CarIdRS, t2.ImageId, t2.Path 
                FROM Image_Car t1 INNER JOIN Image t2 on t1.ImageIdRS = t2.ImageId
                WHERE t1.CarIdRS = $crId";
            $subQueryResult = mysqli_query($this->link, $subQuery); 
            $images = [];
            while ($rowOFImages = mysqli_fetch_assoc($subQueryResult)) {
                $images[] = new ImageClass($rowOFImages['ImageId'], $rowOFImages['Path']);
            }
            $result[] = new CarClass($row['CarId'], $row['BrandName'], $row['ModelName'], $row['CarBody'], $row['GearBox'], $row['WheelDrive'], 
            $row['Engine'], $row['Color'], $row['Price'], $row['Mileage'], $row['EngineVolume'], 
            $row['EnginePower'], $row['CarCondition'], $row['OwnerCount'], $row['VehiclePassport'], $images, $row['Year']);                               
        }
        return $result;
    }

    function getCarById($id){
        require_once("CarClass.php");
        require_once("ImageClass.php");
        $result;
        $query = "
            SELECT t1.CarId, t2.ModelName, t3.BrandName, Price, CarBody, GearBox, Engine, EnginePower, EngineVolume, CarCondition, VehiclePassport, OwnerCount, Year, Mileage, WheelDrive
            FROM Car t1 INNER JOIN Model t2 ON t1.ModelIdRS = t2.ModelId 
            INNER JOIN  Brand t3 on t2.BrandIdRS = t3.BrandId 
            WHERE CarId = $id ";
                           
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $crId = $row['CarId'];
            $subQuery = "
                SELECT t1.CarIdRS, t2.ImageId, t2.Path 
                FROM Image_Car t1 INNER JOIN Image t2 on t1.ImageIdRS = t2.ImageId
                WHERE t1.CarIdRS = $crId";
            $subQueryResult = mysqli_query($this->link, $subQuery); 
            $images = [];
            while ($rowOFImages = mysqli_fetch_assoc($subQueryResult)) {
                $images[] = new ImageClass($rowOFImages['ImageId'], $rowOFImages['Path']);
            }
            $result = new CarClass($row['CarId'], $row['BrandName'], $row['ModelName'], $row['CarBody'], $row['GearBox'], $row['WheelDrive'], 
            $row['Engine'], $row['Color'], $row['Price'], $row['Mileage'], $row['EngineVolume'], 
            $row['EnginePower'], $row['CarCondition'], $row['OwnerCount'], $row['VehiclePassport'], $images, $row['Year']);                            
        }
        return $result;
    }

    function getTitle($tableName, $condition){
        $result = null;
        $query = "
            SELECT Title 
            FROM $tableName
            WHERE Name = '$condition'";                
        $queryResult = mysqli_query($this->link, $query);                
        if ($row = mysqli_fetch_assoc($queryResult)) {
            $result =  $row['Title'];                               
        }
        return $result;
    }

    function getBrands(){
        $result = [];
        $query = "
            SELECT BrandId, BrandName 
            FROM Brand 
            ORDER BY BrandName";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[$row['BrandId']] =  $row['BrandName'];                               
        }
        return $result;
    }

    function getCarBodies(){
        $result = [];
        $query = "
            SELECT Name, Title 
            FROM CarBody 
            ORDER BY Title";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[$row['Name']] =  $row['Title'];                               
        }
        return $result;
    }

    function getGears(){
        $result = [];
        $query = "
            SELECT Name, Title 
            FROM GearBox 
            ORDER BY Title";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[$row['Name']] =  $row['Title'];                               
        }
        return $result;
    }

    function getEngins(){
        $result = [];
        $query = "
            SELECT Name, Title 
            FROM Engine 
            ORDER BY Title";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[$row['Name']] =  $row['Title'];                               
        }
        return $result;
    }

    function getWheelDrives(){
        $result = [];
        $query = "
            SELECT Name, Title 
            FROM WheelDrive 
            ORDER BY Title";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[$row['Name']] =  $row['Title'];                               
        }
        return $result;
    }

    function getModels(){
        $result = [];
        $query = "
            SELECT ModelId, ModelName 
            FROM Model 
            ORDER BY ModelName";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[$row['ModelId']] =  $row['ModelName'];                               
        }
        return $result;
    }

    function getVehiclePassports(){
        $result = [];
        $query = "
            SELECT Name, Title 
            FROM VehiclePassport 
            ORDER BY Title";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[$row['Name']] =  $row['Title'];                               
        }
        return $result;
    }

    function addLikedCar($carId, $userId){
        $query = "INSERT INTO User_Car (CarIdRS, UserIdRS)
        VALUES ($carId, $userId)";                        
        return mysqli_query($this->link, $query); 
    }

    function delLikedCar($carId, $userId){
        $query = "DELETE FROM User_Car WHERE CarIdRS = $carId and UserIdRS = $userId";                        
        return mysqli_query($this->link, $query); 
    }

    function addReservation($carId, $userId){
        $query = "INSERT INTO UserReservedCar (CarId, UserId)
        VALUES ($carId, $userId)";                        
        return mysqli_query($this->link, $query); 
    }

    function delReservation($carId, $userId){
        $query = "DELETE FROM UserReservedCar WHERE CarId = $carId and UserId = $userId";                        
        return mysqli_query($this->link, $query); 
    }

    function addUser($login, $password, $name){
        $query = "INSERT INTO User (Phone, Password, FirstName)
        VALUES ('$login', '$password', '$name')";                        
        if(mysqli_query($this->link, $query))
            return mysqli_insert_id($this->link);
        else
            return null;
    }

    function updateUser($login, $name){
        $query = "UPDATE User SET FirstName = '$name'
        WHERE Phone = '$login'";                        
        return mysqli_query($this->link, $query); 
    }

    function addUserApp($login, $name, $theme){
        $query = "INSERT INTO UserApplication (Phone, UserName, ThemeRS, AppStatus)
        VALUES ('$login', '$name', '$theme', 'На рассмотрении')";                        
        return mysqli_query($this->link, $query); 
    }

    function getUserByLogin($login)
    {
        $result = null;
        $query = "
            SELECT UserId, Phone, Password, FirstName 
            FROM User
            WHERE Phone = '$login'";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result = ['login' => $row['Phone'], 'password' => $row['Password'], 'id' => $row['UserId'], 'name' => $row['FirstName']];                               
        }
        return $result;
    }

    function getModelsByBrand($brand){
        $result = [];
        $query = "
            SELECT ModelId, ModelName FROM Model                 
            WHERE BrandIdRS = $brand 
            ORDER BY ModelName";                
        $queryResult = mysqli_query($this->link, $query);                
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $result[$row['ModelId']] =  $row['ModelName'];                               
        }
        return $result;
    }
}

?>