<?php

class commentsController extends baseController {

    public function current_comments($params) {
        //Если нам ничего не передали то нам делать нечего
        if (count($params) < 2) return;

        //Получаем модуль и запись из параметров
        $module = $params[0];
        $record = $params[1];

        $comments = GetAllFromDB("SELECT * FROM `comments` WHERE `Module` = :module AND Record = :record", [
            "module" => $module,
            "record" => $record
        ]);

        //Получаем текущего пользователя
        $currentUser = GetUser();

        return $this->Partial([
            "comments" => $comments,
            "module" => $module,
            "record" => $record,
            "showName" => $currentUser === null
        ]);
    }

    public function save($params) {
        //Получаем страницу с которой мы перешли
        $referer = $_SERVER["HTTP_REFERER"];

        //Если нам ничего не передали то нам делать нечего
        if (count($params) < 2) return $this->RedirectRaw($referer);

        //Получаем текущего пользователя
        $currentUser = GetUser();

        //Получаем модуль и запись из параметров
        $module = $params[0];
        $record = $params[1];

        $username = "";
        $userid = 0;

        //Если пользователь не залогинен
        if ($currentUser === null) {
            $username = $_POST["name"];
        } else {
            $username = $currentUser["Login"];
            $userid = $currentUser["Id"];
        }
        
        $comment = $_POST["comment"];

        //Очистим от мусора
        $username = trim($username);
        $comment = trim($comment);

        if ($username == "" || $comment == "") return $this->RedirectRaw($referer);

        InsertIntoDB("INSERT INTO `comments` 
                        (`Id`, `Module`, `Record`, 
                         `UserName`, `UserId`, `Coment`, `CreateDate`) 
                     VALUES (NULL, :module, :record, 
                             :username, :userid, :comment, current_timestamp())", [
            "module" => $module,
            "record" => $record,
            "username" => $username,
            "userid" => $userid,
            "comment" => $comment
        ]);

        return $this->RedirectRaw($referer);
    }

}