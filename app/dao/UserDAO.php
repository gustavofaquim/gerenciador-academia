<?php

require_once 'app/dao/Database.php';

class UserDAO{


    public function save(User $user){

       
        $con = new Database();

        $query = "insert into user (name, login, password, type, last_name, birth, comments) values (:name, :login, :password, :type,:last_name, :birth, :comments)";
        
        $stmt = $con->prepare($query);
        
        $name = $user->__get('name');
        $login = $user->__get('login');
        $password = $user->__get('password');
        $type = $user->__get('type');
        $last_name = $user->__get('last_name');
        $birth = $user->__get('birth');
        $comments = $user->__get('comments');

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':comments', $comments);
        
        $result = $stmt->execute();

        if (!$result){
            var_dump( $stmt->errorInfo() );
            exit;
        }
        
        return $result;

    }


    public function authentication($login, $password){
        $con = new Database();

        echo $login;
        echo $password;

        $result = $con->executeQuery('SELECT * FROM user WHERE login = :login', array(
            'login' => $login
        ));

        $objeto = $result->fetch(PDO::FETCH_OBJ);
       
        if(password_verify($password, $objeto->password)){

            $user = new User();

            $user->__set('name', $objeto->name);
            $user->__set('login', $objeto->login);
            $user->__set('password', $objeto->password);
            $user->__set('type', $objeto->type);
            $user->__set('last_name', $objeto->last_name);
            $user->__set('birth', $objeto->birth);
            $user->__set('comments', $objeto->comments);

            return $user;
        }else{
           
            return null;
        }

    }


    public function listAll(){

        $con = new Database();
        
        $result = $con->executeQuery('SELECT * FROM user');
        
        $result = $result->fetchAll(PDO::FETCH_OBJ);


        $users = array();

        foreach($result as $id => $objeto){
            $user = new User();

            $user->__set('id', $objeto->id);
            $user->__set('name', $objeto->name);
            $user->__set('login', $objeto->login);
            $user->__set('password', $objeto->password);
            $user->__set('type', $objeto->type);
            $user->__set('last_name', $objeto->last_name);
            $user->__set('birth', $objeto->birth);
            $user->__set('comments', $objeto->comments);

            $users[] = $user;

        }
        
        return $users;
    }



    public function searchById($id){

        $con = new Database();
        
        $result = $con->executeQuery('SELECT * FROM user where id = :id', array(
            'id' => $id
        ));
        
        $objeto = $result->fetch(PDO::FETCH_OBJ);
       
        $user = new User();


        $user->__set('id', $objeto->id);
        $user->__set('name', $objeto->name);
        $user->__set('login', $objeto->login);
        $user->__set('password', $objeto->password);
        $user->__set('type', $objeto->type);
        $user->__set('last_name', $objeto->last_name);
        $user->__set('birth', $objeto->birth);
        $user->__set('comments', $objeto->comments);
        

        return $user;
    }


    public function update(User $user){

       
        $con = new Database();

        $query = "update user set name = :name, login = :login, type = :type, password = :password, last_name = :last_name, birth = :birth, comments = :comments where id = :id";

        $stmt = $con->prepare($query);
        
        $id = $user->__get('id');
        $name = $user->__get('name');
        $login = $user->__get('login');
        $password = $user->__get('password');
        $type = $user->__get('type');
        $last_name = $user->__get('last_name');
        $birth = $user->__get('birth');
        $comments = $user->__get('comments');

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':comments', $comments);
       
        $result = $stmt->execute();

        

        if (!$result){
            var_dump($stmt->errorInfo() );
            exit;
        }
        
        return $result;

    }


    public function delete($id){
        $con = new Database();

        $query = "delete from user where id = :id";
        
        $stmt = $con->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();


        if (!$result){
            var_dump($stmt->errorInfo() );
            exit;
        }

        return $result;

    }

 }