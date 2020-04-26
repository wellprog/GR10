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
            $menu["Персональная страница"] = "/user/personal";
            if ($currentUser["IsAdmin"] == 1) {
                $menu["Админка"] = "/admin";
            }
        }

        return $this->Partial($menu);

    }

    public function user_pages($params) {
        
        $items = GetAllFromDB("SELECT * FROM `personalpages` as p LEFT JOIN `users` as u on p.UserId = u.Id WHERE p.IsActive = 1");

        $menu = [];

        foreach ($items as $v) {
            $menu[$v["Login"]] = "/user/userpage/" . $v["UserID"];
        }

        return $this->Partial($menu, "user_menu");
    }

}