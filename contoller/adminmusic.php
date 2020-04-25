<?php

class adminmusicController extends baseController {

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

    public function index($params) {
        $items = GetAllFromDB("SELECT * FROM `music`");

        return $this->Page([
            "items" => $items
        ]);
    }

    public function edit($params) {
        $item = [
            "Id" => 0,
            "Title" => "",
            "File" => "",
            "Description" => "",
            "Autor" => "" 
        ];

        if (count($params) > 0) {
            $tmp = GetFirstFromDB("SELECT * FROM `music` WHERE Id = :id", [ "id" => $params[0] ]);
            if ($tmp !== false)
                $item = $tmp;
        }

        if (isset($_POST["Id"])) {
            $item = $_POST;

            foreach ($_FILES as $file) {
                if ($file["error"] != 0 || $file["size"] == 0) continue;
    
                $item["File"] = uniqid() . ".mp3";
                move_uploaded_file($file["tmp_name"], PATH . "content/music/" . $item["File"]);
            }    

            if ($item["Id"] != 0) {
                UpdateIntoDB("UPDATE `music` SET 
                                `Title` = :Title,
                                `File` = :File,
                                `Description` = :Description,
                                `Autor` = :Autor 
                            WHERE
                                `Id` = :Id
                ", $item);

            } else {
                $item["Id"] = null;
                InsertIntoDB("INSERT INTO `music` (
                                `Id`,
                                `Title`,
                                `File`,
                                `Description`,
                                `Autor` 
                            ) VALUES (
                                :Id,
                                :Title,
                                :File,
                                :Description,
                                :Autor 
                            )", $item);

            }

            return $this->Redirect("index");
        }

        return $this->Page([
            "item" => $item
        ]);
    }

    public function delete($params) {
        if (count($params) > 0) {
            $id = $params[0];

            DeleteFromDB("DELETE FROM `music` WHERE Id = :id ", [ "id" => $id ]);
        }

        return $this->Redirect("index");
    }


}