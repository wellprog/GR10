<?php

class adminnewsController extends baseController {

    //Авторизация пользователя
    //Можно ли пользователю достучаться до контроллера
    public function Auth()
    {
        $user = GetUser();

        if ($user == null)
            return false;

        if ($user["IsAdmin"] != 1)
            return false;

        return true;
    }


    public function categories ($params) {
        $cats = GetAllFromDB("SELECT * FROM `NewsCategoryes`");
        return $this->Page([
            "Cats" => $cats 
        ]);
    }

    public function editcategory($params) {

        //Создал переменную по умолчанию
        $cat = [
            "name" => "",
            "description" => ""
        ];

        $id = 0;

        //Смотрю что мне передали ID записи
        if (count($params) > 0) {
            $id = $params[0];

            //И если передали я пытаюсь найти эту запись
            $tmp = GetFirstFromDB("SELECT * FROM `NewsCategoryes` WHERE `Id` = :id ", [ "id" => $id ]);
            if ($tmp != false)
                $cat = $tmp;
        }

        if (isset($_POST["name"])) {
            $name = $_POST["name"];
            $description = $_POST["description"];

            if ($id == 0) {
                InsertIntoDB("INSERT INTO `NewsCategoryes`(`Name`, `Description`)
                              VALUES (:name, :description)", [
                                  "name" => $name,
                                  "description" => $description
                              ]);
            } else {
                UpdateIntoDB("UPDATE `NewsCategoryes` SET `Name` = :name, `Description` = :description WHERE `Id` = :id", [
                    "name" => $name,
                    "description" => $description,
                    "id" => $id
                ]);
            }

            return $this->Redirect("categories");
        }

        return $this->Page($cat);
    }

    public function deletecategory($params) {
        $id = 0;
        if (count($params) > 0) {
            $id = $params[0];
        }

        if ($id != 0)
            UpdateIntoDB("DELETE FROM `newscategoryes` WHERE `Id` = :id", ["id" => $id]);

        return $this->Redirect("categories");
    }

}