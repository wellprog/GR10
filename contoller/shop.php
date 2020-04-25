<?php

class shopController extends baseController {

    public function index($params) {

        $items = GetAllFromDB("SELECT * FROM `tovar`");

        $types = GetAllFromDB("SELECT `Type` FROM `tovar` GROUP BY `Type`");

        return $this->Page([
            "items" => $items,
            "types" => $types
        ]);
    }

    public function item($params) {
        if (count($params) < 1)
            return $this->Redirect("index");

        $item = GetFirstFromDB("SELECT * FROM `tovar` WHERE `Id` = :Id", ["Id" => $params[0]]);

        return $this->Page([
            "item" => $item
        ]);
    }

}