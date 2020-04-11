<?php

//Создание константы
      //Имя    Значение
define("PATH", dirname(__FILE__) . "/../");

//Подключение всех библиотек
require_once PATH . "lib/request.php";
require_once PATH . "lib/user.php";
require_once PATH . "lib/db.php";
require_once PATH . "lib/mailer.php";