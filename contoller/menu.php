<?php


class menuController extends baseController {

    public function user_menu($params) {
        //1 - Выход (Если залогинен)
        //2 - Логин (Если разлогинен)
        //3 - Админка (Если пользователь админ)

        $currentUser = GetUser();

        $menu = [];

        if ($currentUser === null) {
            $menu["Вход"] = "/user/login";
            $menu["Регистрация"] = "/user/register";
        } else {
            $menu["Выход"] = "/user/logout";
            if ($currentUser["IsAdmin"] == 1) {
                $menu["Админка"] = "/admin";
            }
        }

        return $this->Partial($menu);

    }

}