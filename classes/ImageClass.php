<?php

class ImageClass {
    public $id;
    public $path;

    public function __construct($id, $path) {
        $this->id = $id;
        $this->path = $path;
    }

    function __destruct() {
        
    }
}

?>