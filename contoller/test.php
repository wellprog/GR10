<?php

class testController extends baseController {

    public function index($params) {

        SendMail("sofyavenglinskaya@gmail.com", "test", "testmessage");

        echo "test";
    }

}