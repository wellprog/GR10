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
            "ShortText" => "",
            "Text" => "", 
            "StartDate" => date("Y-m-d H:i:s"), 
            "EndDate" => date("Y-m-d H:i:s"), 
            "IsAnonym" => 0, 
            "Type" => 0
        ];

        if (count($params) > 0) {
            $tmp = GetFirstFromDB("SELECT * FROM `vote` where Id = :id", [ "id" => $params[0]]);
            if ($tmp !== false)
                $vote = $tmp;
        }

        //Пользователь хочет что то сохранить
        if (isset($_POST["Title"])) {

            $vote["Title"] = $_POST["Title"];
            $vote["ShortText"] = $_POST["ShortText"];
            $vote["Text"] = $_POST["Text"];
            $vote["StartDate"] = $_POST["StartDate"];
            $vote["EndDate"] = $_POST["EndDate"];
            $vote["IsAnonym"] = $_POST["IsAnonym"];
            $vote["Type"] = $_POST["Type"];

            //Update
            if ($vote["Id"] > 0) {

                UpdateIntoDB("UPDATE `vote` SET 
                                     `Title` = :Title,
                                     `ShortText` = :ShortText,
                                     `Text` = :Text, 
                                     `StartDate` = :StartDate, 
                                     `EndDate` = :EndDate, 
                                     `IsAnonym` = :IsAnonym, 
                                     `Type` = :Type
                                WHERE `Id` = :Id"
                            ,[
                                "Title" => $vote["Title"],
                                "ShortText" => $vote["ShortText"],
                                "Text" => $vote["Text"],
                                "StartDate" => $vote["StartDate"],
                                "EndDate" => $vote["EndDate"],
                                "IsAnonym" => $vote["IsAnonym"],
                                "Type" => $vote["Type"],
                                "Id" => $vote["Id"]
                            ]);

                return $this->Redirect("index");

            } else { //Insert

                UpdateIntoDB("INSERT INTO `vote` (
                                        `Title`,
                                        `ShortText`,
                                        `Text`, 
                                        `StartDate`, 
                                        `EndDate`,
                                        `IsAnonym`,
                                        `Type`
                                      ) 
                                      values (
                                        :Title,
                                        :ShortText,
                                        :Text, 
                                        :StartDate, 
                                        :EndDate, 
                                        :IsAnonym, 
                                        :Type
                                     )"
                            ,[
                                "Title" => $vote["Title"],
                                "ShortText" => $vote["ShortText"],
                                "Text" => $vote["Text"],
                                "StartDate" => $vote["StartDate"],
                                "EndDate" => $vote["EndDate"],
                                "IsAnonym" => $vote["IsAnonym"],
                                "Type" => $vote["Type"],
                            ]);

                return $this->Redirect("index");

            }

            var_dump($_POST); exit();
        }

        return $this->Page([
            "Vote" => $vote
        ]);
    }


    public function questions($params) {
        if (count($params) == 0)
            return $this->Redirect("index");

        $vote = GetFirstFromDB("SELECT * FROM `vote` where Id = :Id", ["Id" => $params[0]]);
        if ($vote === false)
            return $this->Redirect("index");


        $questions = GetAllFromDB("SELECT * FROM `votequestions` WHERE `VoteId` = :Id", ["Id" => $vote["Id"]]);

        return $this->Page([
            "Vote" => $vote,
            "Questions" => $questions
        ]);
    }

    public function question_edit($params) {
        if (count($params) < 1)
            $this->Redirect("index");

        $vote = GetFirstFromDB("SELECT * FROM `vote` where Id = :Id", ["Id" => $params[0]]);
        if ($vote === false)
            return $this->Redirect("index");

        $question = [
            "Id" => 0,
            "VoteId" => $vote["Id"],
            "Title" => "",
            "Text" => ""
        ];

        //TODO Сохранить или обновить

        return $this->Page([
            "Vote" => $vote,
            "Question" => $question
        ]);
    }

}