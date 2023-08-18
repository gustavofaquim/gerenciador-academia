<?php

require_once 'app/models/Training.php';

class Worksheet{

    private $id;
    private $training;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}