<?php 

require_once 'app/dao/Database.php';

class WorksheetDAO{


    public function save(Worksheet $worksheet){

        $con = new Database();

        $query = "insert into worksheet () values (:name, :login, :password, :type)";
        
        $stmt = $con->prepare($query);
    }
}