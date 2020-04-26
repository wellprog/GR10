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
    protected function Partial($MODEL = "", $action = "", $controller = "") {
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

    protected function RedirectBack() {
        $url = trim($_SERVER["HTTP_REFERER"]);
        if ($url == "")
            $url = "/";
        
        $this->RedirectRaw($url);
    }

    protected function RedirectRaw($url) {
        header("Location: " . $url);
    }


    protected function InsertOrUpdate($tableName, $model, $idName = "Id") {
        //Проверка на то что делать
        if ($model[$idName] == 0) {
            $model[$idName] = $this->Insert($tableName, $model, $idName);
            return $model;
        } else {
            $this->Update($tableName, $model, $idName);
            return $model;
        }
    }

    protected function Insert($tableName, $model, $idName = "Id") {
        $fields = [];
        $values = [];
        $params = [];

        foreach($model as $k => $v) {
            if ($k == $idName) continue;

            $fields[] = "`$k`";
            $values[] = ":$k";

            $params[$k] = $v;
        }

        $sqlFields = implode(",", $fields);
        $sqlValues = implode(",", $values);

        $sql = "INSERT INTO `$tableName`($sqlFields) VALUES ($sqlValues)";
        InsertIntoDB($sql, $params);
    } 

    protected function Update($tableName, $model, $idName = "Id") {
        $fields = [];
        $params = [];

        foreach($model as $k => $v) {
            if ($k != $idName) {
                $fields[] = "`$k` = :$k";
            }
            
            $params[$k] = $v;
        }

        $sqlFields = implode(",", $fields);

        $sql = "UPDATE `$tableName` SET $sqlFields WHERE `$idName` = :$idName";
        UpdateIntoDB($sql, $params);
    }
} 