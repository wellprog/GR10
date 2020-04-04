<?php

class baseController {

    public $controller = "";
    public $action = "";

    public function Auth() {
        return true;
    } 

    public function access_denied() {
        return $this->Page("", "access_denied", "shared");
    }

    protected function Page($MODEL = "", $action = "", $controller = "", $layout = "layout") {
        $this->HTML($this->Partial($MODEL, $action, $controller), $layout);
    }

    // Выводит всю страницу целеком
    protected function HTML($COMPONENT, $layout = "layout") {
        include PATH . "template/shared/" . $layout . ".php";
    }

    // Возвращает отрисованный компонент
    protected function Partial($MODEL, $action = "", $controller = "") {
        //Очищаем переменные
        $action = trim($action);
        $controller = trim($controller);

        if ($action == "") $action = $this->action;
        if ($controller == "") $controller = $this->controller;

        //Включаем остановку вывода на экран
        ob_start();
        //Подключаем файл для отрисовки
        include PATH . "template/" . $controller . "/" . $action . ".php";
        //Получаем содаржимое отрисованного файла
        return ob_get_clean();
    }

    protected function Redirect($action = "", $controller = "") {
        //Очищаем переменные
        $action = trim($action);
        $controller = trim($controller);

        if ($action == "") $action = $this->action;
        if ($controller == "") $controller = $this->controller;

        header("Location: /" . $controller . "/" . $action);
    }
} 