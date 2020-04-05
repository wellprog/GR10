<?php

class newsController extends baseController {

    public function category_menu($params) {
        $elements = GetAllFromDB("SELECT * FROM `newscategoryes`");

        return $this->Partial([
            "items" => $elements
        ]);
    }

    public function category($params) {
        if (count($params) == 0) {
            return $this->Redirect("index", "home");
        }

        $id = $params[0];

        $elements = GetAllFromDB("SELECT * FROM `news` WHERE `CategoryId` = :id", ["id" => $id]);

        return $this->Page([
            "items" => $elements
        ]);
    }

}