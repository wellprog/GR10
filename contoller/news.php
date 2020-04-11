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

    public function single($params) {
        //Проверка на каличество параметров которые нам передали
        if (count($params) == 0)
            return $this->Redirect("index", "home"); //Если их нет то редирект на главную

        //Получили первый параметр
        $id = $params[0];

        //Пытаемся получить новость из базы данных
        $single = GetFirstFromDB("SELECT * FROM `news` WHERE `Id` = :id", ["id" => $id]);

        //Если такой новости нет
        if ($single === false)
            return $this->Redirect("index", "home");//то редирект на главную

        //Если все ОК то отрисовываем страницу
        return $this->Page([
            "news" => $single
        ]);
    }

}