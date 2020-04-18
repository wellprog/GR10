<?php

/** @var PDO $DB */
$DB = null;


/**
 * Функция отдает подключение к базе данных
 * @param PDO $DB 
 * @return PDO 
 */
function GetDB() {
    global $DB;

    //Если подключение уже есть то используем его 
    if ($DB !== null)
        return $DB;

    //Создаем новое подключение
    $DB = new PDO("mysql:host=localhost;dbname=sytedb", "root", "", [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //Задаем кодировку
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC  //Задаем метод выборки
    ]);

    //Возвращаем готовое подключение
    return $DB;
}

function GetAllFromDB($sql, $params = []) {
    //Получение подключения
    $db = GetDB();

    //Подготовка запроса
    $stmt = $db->prepare($sql);
    //Выполнение запроса с параметрами
    $stmt->execute($params);

    if ($stmt->errorCode() > 0) {
        var_dump($stmt->errorInfo()); exit();
    }

    //Получение всех данных из базы
    $result = $stmt->fetchAll();
    //Закрытие соединения
    $stmt->closeCursor();

    //Возврат результата
    return $result;
}

function GetFirstFromDB($sql, $params = []) {
    //Получение подключения
    $db = GetDB();

    //Подготовка запроса
    $stmt = $db->prepare($sql);
    //Выполнение запроса с параметрами
    $stmt->execute($params);

    if ($stmt->errorCode() > 0) {
        var_dump($stmt->errorInfo()); exit();
    }

    //Получение всех данных из базы
    $result = $stmt->fetch();
    //Закрытие соединения
    $stmt->closeCursor();

    //Возврат результата
    return $result;
}


function InsertIntoDB($sql, $params = []) {
    //Получение подключения
    $db = GetDB();

    //Подготовка запроса
    $stmt = $db->prepare($sql);
    //Выполнение запроса с параметрами
    $stmt->execute($params);

    if ($stmt->errorCode() > 0) {
        var_dump($stmt->errorInfo()); exit();
    }

    $result = $db->lastInsertId();

    $stmt->closeCursor();

    //Возврат результата
    return $result;
}


function DeleteFromDB($sql, $params = []) {
    return UpdateIntoDB($sql, $params);
}


function UpdateIntoDB($sql, $params = []) {
    //Получение подключения
    $db = GetDB();

    //Подготовка запроса
    $stmt = $db->prepare($sql);
    //Выполнение запроса с параметрами
    $stmt->execute($params);

    if ($stmt->errorCode() > 0) {
        var_dump($stmt->errorInfo()); exit();
    }

    $result = $stmt->rowCount();

    $stmt->closeCursor();

    //Возврат результата
    return $result;
}
