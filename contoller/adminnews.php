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

    //Список новостей
    public function news($params) {

        $id = 0;
        if (count($params) > 0) {
            $id = $params[0];
        }

        $sql = "
        SELECT                                              -- Выбрать 
            `news`.*,                                       -- Все Поля из таблицы новосей
            `newscategoryes`.`name` as `CategoryName`,      -- Поле имя из таблицы категорий и переименовать его в CategoryName
            `users`.`Login` as `UserName`                   -- Поле логин из таблицы пользователей и переименовать его в UserName
        FROM `news`                                         -- Из таблицы новостей
        LEFT JOIN `newscategoryes`                          -- Соединить с таблицей категорий
            ON `news`.`CategoryId` = `newscategoryes`.`Id`  -- По Критериям
        LEFT JOIN `users`                                   -- Соединить с таблицей пользователей
            ON `news`.`UserId` = `users`.`Id`               -- По Критериям 
            
        ";
            
        $params = [];

        if ($id != 0) {
            $sql .= "WHERE `CategoryId` = :catid";
            $params["catid"] = $id;
        }
        
        $news = GetAllFromDB($sql, $params);

        return $this->Page([
            "News" => $news
        ]);
    }

    //Редактирование нововсти
    public function editnews($params) {
        $news = [
            "Title" => "",
            "Text" => "",
            "ShortText" => "",
            "CategoryId" => 0,
            "MainPhoto" => ""
        ];

        $cats = GetAllFromDB("SELECT * FROM `newscategoryes`");

        $id = 0;

        //Смотрю что мне передали ID записи
        if (count($params) > 0) {
            $id = $params[0];

            //И если передали я пытаюсь найти эту запись
            $tmp = GetFirstFromDB("SELECT * FROM `news` WHERE `Id` = :id ", [ "id" => $id ]);
            if ($tmp != false)
                $news = $tmp;
        }


        
        if (isset($_POST["title"])) {
            $title = $_POST["title"];
            $text = $_POST["text"];
            $short_text = $_POST["short_text"];
            $category_id = $_POST["category_id"];
            $main_photo = $news["MainPhoto"];

            foreach ($_FILES as $file) {
                if ($file["error"] != 0 || $file["size"] == 0) continue;

                $main_photo = uniqid() . ".jpg";
                move_uploaded_file($file["tmp_name"], PATH . "content/img/" . $main_photo);
            }
            

            $currentUser = GetUser();

            if ($id == 0) {
                InsertIntoDB("INSERT INTO `news` 
                                (`Id`, `Title`, `Text`, `ShortText` ,`CreateDate`, 
                                `CategoryId`, `UserId`, `MainPhoto`) 
                              VALUES 
                                (NULL, :title, :text, :short_text, current_timestamp(), :categoryid, :userid, :photo)", [
                                  "title" => $title,
                                  "text" => $text,
                                  "short_text" => $short_text,
                                  "categoryid" => $category_id,
                                  "userid" => $currentUser["Id"],
                                  "photo" => $main_photo
                              ]);

                //SendMail()
                //TODO отправить сообщение
            } else {
                UpdateIntoDB("UPDATE `news` SET 
                                `Title` = :title, 
                                `Text` = :text, 
                                `ShortText` = :short_text,
                                `CategoryId` = :categoryid,
                                `MainPhoto` = :photo 
                                WHERE `Id` = :id", [
                    "title" => $title,
                    "text" => $text,
                    "short_text" => $short_text,
                    "categoryid" => $category_id,
                    "photo" => $main_photo,
                    "id" => $id
                ]);
            }

            return $this->Redirect("news");
        }


        return $this->Page([
            "News" => $news,
            "Categoryes" => $cats
        ]);
    }

    //Удаление новости
    public function deletenews($params) {

    }

    public function categories ($params) {
        $cats = GetAllFromDB("SELECT * FROM `newscategoryes`");
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
            $tmp = GetFirstFromDB("SELECT * FROM `newscategoryes` WHERE `Id` = :id ", [ "id" => $id ]);
            if ($tmp != false)
                $cat = $tmp;
        }

        if (isset($_POST["name"])) {
            $name = $_POST["name"];
            $description = $_POST["description"];

            if ($id == 0) {
                InsertIntoDB("INSERT INTO `newscategoryes`(`Name`, `Description`)
                              VALUES (:name, :description)", [
                                  "name" => $name,
                                  "description" => $description
                              ]);
            } else {
                UpdateIntoDB("UPDATE `newscategoryes` SET `Name` = :name, `Description` = :description WHERE `Id` = :id", [
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