<?php

class revertController extends baseController {
    
    public function index($params) {
        $text = "";
        if (isset($_POST["text"])) {
            $text = trim($_POST["text"]);
        }

        if ($text != "") {
            $text = preg_replace_callback('/\w+/mu', function($matches) {
                $str = $matches[0];
                $count = mb_strlen($str);

                $out = "";
                for ($i = $count - 1; $i > -1; $i--) {
                    $out .= mb_substr($str, $i, 1);
                }
                
                return $out;
            }, $text);
        }

        return $this->Page($text);
    }

}