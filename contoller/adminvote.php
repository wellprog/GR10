<?php

class adminvoteController extends baseController {

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

        $votes = GetAllFromDB("SELECT * FROM `vote`");

        return $this->Page([
            "Votes" => $votes
        ]);
    }

    public function edit($params)
    {
        $vote = [
            "Id" => 0, 
            "Title" => "", 
            "Text" => "", 
            "StartDate" => date("Y-m-d H:i:s"), 
            "EndDate" => date("Y-m-d H:i:s"), 
            "IsAnonym" => 0, 
            "Type" => 0
        ];

        return $this->Page([
            "Vote" => $vote
        ]);
    }

}