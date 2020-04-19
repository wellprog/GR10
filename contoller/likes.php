<?php

class likesController extends baseController {


    public function widget($params) {
        if (count($params) < 2) return;
        $user = GetUser();

        if ($user == null) return;

        $likes = GetFirstFromDB("SELECT COUNT(id) as `count` FROM `likes` WHERE `Module` = :module AND `ModuleId` = :id;", [
            "module" => $params[0],
            "id" => $params[1]
        ]);

        return $this->Partial([
            "likes" => $likes["count"],
            "module" => $params[0],
            "id" => $params[1]
        ]);
    }

    public function like($params) {

        if (!isset($_POST["Module"]) || !isset($_POST["ModuleId"]))
            return $this->RedirectBack();


        $user = GetUser();
        if ($user == null) return $this->RedirectBack();

        $post = [
            "UserID" => $user["Id"],
            "Module" => $_POST["Module"],
            "ModuleId" => $_POST["ModuleId"]
        ];

        $record = GetFirstFromDB("SELECT * FROM `likes` WHERE `UserID` = :UserID AND `Module` = :Module AND `ModuleId` = :ModuleId", $post);
        if ($record !== false) return $this->RedirectBack();

        InsertIntoDB("INSERT INTO `likes` (`UserID`, `Module`, `ModuleId`) VALUES (:UserID, :Module, :ModuleId)", $post);

        return $this->RedirectBack();
    }

}