<?php

class adminController extends baseController {

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
        return $this->Page();
    }

    public function pull() {
        $result = shell_exec("cd " . PATH . " & git pull");

        var_dump($result);
    }

}