<?php

class User {
    
    private $id;
    private $name;
    private $last_name;
    private $birth;
    private $login;
    private $password;
    private $type;
    private $comments;


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}