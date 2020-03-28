<?php

class userController extends baseController {

    public function index($params) {
        return $this->Page();
    }

    public function register($params) {

        $errors = [];

        if (isset($_POST["name"])) {

            $name = trim($_POST["name"]);
            $lastname = trim($_POST["lastname"]);
            $login = trim($_POST["login"]);
            $password = trim($_POST["password"]);
            $password1 = trim($_POST["password1"]);

            if ($name == "")
                $errors[] = "Имя обязательно";
            if ($lastname == "")
                $errors[] = "Фамилия обязательна";
            if ($login == "")
                $errors[] = "Логин обязателен";
            if ($password == "")
                $errors[] = "Пароль обязателен";
            if ($password != $password1)
                $errors[] = "Пароли не совпадают";

            if (count($errors) == 0) {
            //TODO ЗАписать в базу

            return $this->Redirect("index");
            }

        }

        return $this->Page([
            "errors" => $errors
        ]);   
    }

}