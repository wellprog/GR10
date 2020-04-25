<?php 

class admintovarController extends baseController {

    public function index($params) {

        $items = GetAllFromDB("SELECT * FROM `tovar`");

        return $this->Page([
            "Tovars" => $items
        ]);
    }

}