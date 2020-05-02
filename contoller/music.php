<?php

class musicController extends baseController {
    
    
    public function index($params) {

        $items = GetAllFromDB("SELECT * FROM `music`");

        return $this->Page([
            "items" => $items
        ]);
    }
       
}