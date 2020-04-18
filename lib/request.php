<?php
//$_SERVER хранис специфичные для запроса параметры
//1 - Серверное окружение (Откуда был запущен скрипт)
//2 - Параметры запроса (URL, и так далее)
//3 - Предпочтения пользователя (язык, что умеет смотреть)
//4 - Окружение пользователя (Его браузер, операционная система)
$req = $_SERVER["REQUEST_URI"];

//Избавляюсь от строки запроса
//Поиск знака вопроса в строке
$qPosition = strpos($req, '?');
//Если нашли то мы обрезаем строку
if ($qPosition !== false) {
    $req = substr($req, 0, $qPosition);
}

//Разбиваю строку по разделителю
$parts = explode("/", $req);
//Очистка от пустых значений
$tmp = [];
foreach($parts as $value) {
    //Очистка строки от ненужных символов 
    $value = trim($value);
    if ($value != "")
        $tmp[] = $value;
}

$parts = $tmp;

//Какой файл загрузить
$CONTROLLER = "home";
//Какую функцию использовать
$ACTION = "index";
$PARAMS = [];

//Получение контроллера из URL
if (isset($parts[0])) {
    $CONTROLLER = strtolower($parts[0]);
}

//Получение акшена из URL
if (isset($parts[1])) {
    $ACTION = strtolower($parts[1]);
}

//Получение остального из URL
for ($i = 2; $i < count($parts); $i++) {
    $PARAMS[] = $parts[$i];
}

//Выполнить контроллер с акшеном
function ExecPath($controller = "", $action = "", $params = []) {
    //Подключение глобальных переменных
    global $CONTROLLER, $ACTION, $PARAMS;

    //Очищаем переменные
    $controller = trim($controller);
    $action = trim($action);

    //Проверка переменных на пустоту
    if ($controller == "")
        $controller = $CONTROLLER;
    if ($action == "")
        $action = $ACTION;
    if (count($params) == 0)
        $params = $PARAMS;

    //Подключаем базовый файл
    require_once PATH . "contoller/base.php";

    //Проверяем файл
    $filename = PATH . "contoller/" . $controller . ".php"; 
    if (!file_exists($filename))
        return ExecPath("errors", "e404");

    require_once $filename;

    //проверяем объект файла
    $tmp =  $controller . "Controller";
    if (!class_exists($tmp))
        return ExecPath("errors", "e404");

    //Создаем элемент файла
    $c = new $tmp();
    $c->controller = $controller;
    $c->action = $action;
    
    //Проверяем функцию
    if (!method_exists($c, $action))
        return ExecPath("errors", "e404");

    if (!$c->Auth()) {
        return $c->access_denied();    
    }

    //Вызываем функцию из файла
    return $c->$action($params);    
}