<?php

class Training {
    
    private $id;
    private $name;
    private $description;
    private $image;
    
    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}