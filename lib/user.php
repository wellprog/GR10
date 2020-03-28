<?php

session_start();

function GetUser() {
    if (!isset($_SESSION["user"]))
        return null;
    
    return $_SESSION["user"];
}

function SetUser($user) {
    $_SESSION["user"] = $user;
}

function UnserUser() {
    unset($_SESSION["user"]);
}