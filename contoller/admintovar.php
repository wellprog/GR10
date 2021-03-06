<?php 

class admintovarController extends baseController {

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

        $items = GetAllFromDB("SELECT * FROM `tovar`");

        return $this->Page([
            "Tovars" => $items
        ]);
    }

    public function edit($params) {
        //Создание шаблона
        $item = [
            "Id" => 0,
            "Title" => "",
            "Description" => "",
            "ShortDescription" => "",
            "Price" => 0,
            "Type" => "",
            "IsPresent" => 0,
            "Pictures" => "",
            "BuyDiscount" => 0,
        ];

        //Если пользователь хочет редактировать какой то
        //конкретный товар то нам надо его забрать из
        //Базы данных

        //Проверяем ID
        if (count($params) > 0) {
            $id = $params[0];
            //Пытаемся достать товар
            $tmp = GetFirstFromDB("SELECT * FROM `tovar` WHERE `Id` = :id", ["id" => $id]);

            //Если он есть то записываем в шаблон
            if ($tmp !== false) $item = $tmp;
        }

        //Проверяем что нам отправили товар
        if (isset($_POST["Id"])) {
            //Копируем все поля из запроса
            $item = $_POST;

            foreach ($_FILES as $file) {
                if ($file["error"] != 0 || $file["size"] == 0) continue;

                $item["Pictures"] = uniqid() . ".jpg";
                move_uploaded_file($file["tmp_name"], PATH . "content/img/" . $item["Pictures"]);
            }

            //Проверить новый товар или нет
            if ($item["Id"] == 0) {
                $item["Id"] = null;
                InsertIntoDB("INSERT INTO `tovar` (
                                    `Id`,
                                    `Title`,
                                    `ShortDescription`,
                                    `Description`,
                                    `Price`,
                                    `Type`,
                                    `IsPresent`,
                                    `Pictures`,
                                    `BuyDiscount`
                                ) VALUES (
                                    :Id,
                                    :Title,
                                    :ShortDescription,
                                    :Description,
                                    :Price,
                                    :Type,
                                    :IsPresent,
                                    :Pictures,
                                    :BuyDiscount                                    
                                )", $item);
            } else { 
                UpdateIntoDB("UPDATE `tovar` SET
                                `Title` = :Title,
                                `ShortDescription` = :ShortDescription,
                                `Description` = :Description,
                                `Price` = :Price,
                                `Type` = :Type,
                                `IsPresent` = :IsPresent,
                                `Pictures` = :Pictures,
                                `BuyDiscount` = :BuyDiscount
                            WHERE
                                `Id` = :Id", $item);
            }
            
            return $this->Redirect("index");

        }


        return $this->Page([
            "Tovar" => $item
        ]);
    }

    public function delete($params) {
        if (count($params) < 1)
            return $this->Redirect("index");

        $id = $params[0];

        DeleteFromDB("DELETE FROM `tovar` WHERE `Id` = :Id", ["Id" => $id]);

        return $this->Redirect("index");
    }

}