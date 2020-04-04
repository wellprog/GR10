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

    if ($DB !== null)
        return $DB;

    $DB = new PDO("mysql:host=localhost;dbname=sytedb", "root", "", [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return $DB;
}

function GetAllFromDB($sql, $params = []) {
    //Получение подключения
    $db = GetDB();

    //Подготовка запроса
    $stmt = $db->prepare($sql);
    //Выполнение запроса с параметрами
    $stmt->execute($params);

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

    $result = $db->lastInsertId();

    $stmt->closeCursor();

    //Возврат результата
    return $result;
}
