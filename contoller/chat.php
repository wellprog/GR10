<?php

class chatController extends baseController {

    //Авторизация пользователя
    //Можно ли пользователю достучаться до контроллера
    public function Auth()
    {
        $user = GetUser();

        if ($user == null)
            return false;

        return true;
    }

    public function index($params) {

        $rooms = GetAllFromDB("SELECT * FROM `allchat` GROUP BY `ChatName`;");
        $user = GetUser();

        if (isset($_POST["ChatName"])) {
            InsertIntoDB("INSERT INTO `allchat` (`ChatName`, `UserName`, `Text`) 
                          values(:ChatName, :UserName, :Text)", [
                              "ChatName" => $_POST["ChatName"],
                              "UserName" => $user["Name"],
                              "Text" => "Пользователь " . $user["Name"] . " Начал чат"
                          ]);

            return $this->Redirect("room/" . $_POST["ChatName"]);
        }

        return $this->Page([
            "Rooms" => $rooms
        ]);
    }

    public function room($params) {
        if (count($params) < 1) {
            return $this->Redirect("index");
        }

        $messages = GetAllFromDB("SELECT * FROM `allchat` WHERE `ChatName` = :ChatName", ["ChatName" => $params[0]]);

        return $this->Page([
            "Messages" => $messages
        ]);
    }

    public function store($params) {
        if (count($params) < 1) {
            return $this->Redirect("index");
        }

        $user = GetUser();
        $room = $params[0];
        $text = $_POST["Text"];

        $id = InsertIntoDB("INSERT INTO `allchat` (`ChatName`, `UserName`, `Text`) 
                          values(:ChatName, :UserName, :Text)", [
                              "ChatName" => $room,
                              "UserName" => $user["Name"],
                              "Text" => $text
                          ]);

        return $this->getnext([$room, $id]);
    }

    public function getnext($params) {
        if (count($params) < 2) {
            return $this->Redirect("index");
        }

        $room = $params[0];
        $lastid = $params[1];

        $messages = GetAllFromDB("SELECT * FROM `allchat` WHERE `ChatName` = :ChatName AND `Id` > :Id", [
            "ChatName" => $room, ":Id" => $lastid]);

        header('Content-Type: application/json');
        echo json_encode($messages);
    }

}