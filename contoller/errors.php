<?php

class errorsController extends baseController {

    public function e404($params) {
        return $this->Page();
    }

}