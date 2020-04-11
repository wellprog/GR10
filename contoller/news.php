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
            "items" => $elements,
            "category" => $id
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

    public function category_side($params) {

        $cats = GetAllFromDB("  SELECT 
                                    `newscategoryes`.*,
                                    COUNT(news.Id) as newsCount
                                FROM `newscategoryes`
                                LEFT JOIN `news` ON `news`.`CategoryId` = newscategoryes.Id
                                GROUP BY newscategoryes.Id");

        //Отрисовать часть страницы
        return $this->Partial($cats);
    }

    public function recent_side($params) {
        $news = GetAllFromDB("SELECT * FROM `news` ORDER BY CreateDate DESC limit 3");

        return $this->Partial($news);
    }

    public function search_side($params) {
        return $this->Partial();
    }

    public function subscribe_side($params) {
        $category = $params[0];
        return $this->Partial($category);
    }

    public function subscribe($params) {
        if (!isset($_POST["email"]))
            return $this->RedirectBack();

        $currentUser = GetUser();

        $email = trim($_POST["email"]);
        $userId = 0;
        $category = $params[0];
        
        if ($currentUser != null)
            $userId = $currentUser["Id"];

        if ($email == "")
            return $this->RedirectBack();

        InsertIntoDB("INSERT INTO `subscribes` (`Id`, `UserID`, `EMail`, `CategoryId`) 
                      VALUES (NULL, :userid, :email, :category)", [
            "userid" => $userId,
            "email" => $email,
            "category" => $category
        ]);

        return $this->RedirectBack();
    }

    public function search($params) {
        if (!isset($_GET["keyword"]))
            return $this->RedirectBack();

        $elements = GetAllFromDB("SELECT * FROM `news` WHERE `Text` like :text", [
            "text" => "%" . $_GET["keyword"] . "%"
        ]);

        return $this->Page([
            "items" => $elements
        ], "category");
    }

}