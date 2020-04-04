<?php

class userController extends baseController {

    public function index($params) {
        return $this->Page();
    }

    public function logout($params) {
        UnsetUser();

        return $this->Redirect("index", "home");
    }

    public function login($params) {
        $errors = [];

        if (isset($_POST["login"])) {
            $login = $_POST["login"];
            $password = $_POST["password"];

            //Очистить данные от мусора
            $login = trim($login);
            $password = trim($password);

            //Проверить переменные на наличие данных
            if ($login == "") {
                $errors[] = "Логин обязателен";
            }
            if ($password == "") {
                $errors[] = "Пароль обязателен";
            }

            //Проверить что пользователь уже существует
            $currentUser = GetFirstFromDB("SELECT * FROM `Users` WHERE `Login` = :login;", ["login" => $login]);
            if ($currentUser === false) {
                $errors[] = "Такого пользователя не существует";
            } else {
                if ($currentUser["Password"] != md5($password)) {
                    $errors[] = "Пароль не верен!";
                }
            }

            if (count($errors) == 0) {
                SetUser($currentUser);

                return $this->Redirect("index", "home");
            }
        }

        return $this->Page([
            "errors" => $errors
        ]);
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

            //Проверить что пользователь уже существует
            $currentUser = GetFirstFromDB("SELECT * FROM `Users` WHERE `Login` = :login;", ["login" => $login]);
            if ($currentUser !== false) {
                $errors[] = "Такой пользователь существует";
            }
                
            if (count($errors) == 0) {

                InsertIntoDB("INSERT INTO `Users` 
                                (`Id`, `Name`, `LastName`, `Login`, `Password`, `IsAdmin`) 
                                VALUES (NULL, :name, :lastname, :login, :password, '0') ", [
                                    "name" => $name,
                                    "lastname" => $lastname,
                                    "login" => $login,
                                    "password" => md5($password)
                                ]);

                return $this->Redirect("index");
            }

        }

        return $this->Page([
            "errors" => $errors
        ]);   
    }

}