<?php

require_once 'app/dao/Database.php';

class TrainingDAO{


    public function save(Training $training){

       
        $con = new Database();

        $query = "insert into training (name, description, image) values (:name, :description, :image)";
        
        $stmt = $con->prepare($query);
        
        $name = $training->__get('name');
        $description = $training->__get('description');
        $image = $training->__get('image');
      

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
       
        $result = $stmt->execute();

        if (!$result){
            var_dump( $stmt->errorInfo() );
            exit;
        }
        
        return $result;

    }

    public function listAll($search,$perPage,$offset){


        $con = new Database();
       

        $query = 'SELECT * FROM training';

        if ($search) {
            $query .= " WHERE name like '%$search%'";
        }

        $query .= " LIMIT $perPage OFFSET $offset";
       
    
        $result = $con->executeQuery($query);
        $result = $result->fetchAll(PDO::FETCH_OBJ);

      

        $workouts = array();

        foreach($result as $id => $objeto){
            $training = new Training();

            $training->__set('id', $objeto->id);
            $training->__set('name', $objeto->name);
            $training->__set('description', $objeto->description);
            $training->__set('image', $objeto->image);
           


            $workouts[] = $training;

        }
        
        
        return $workouts;
    }

    public function countResults($search){

        $con = new Database();
       

        $query = 'SELECT * FROM training';

        if ($search) {
            $query .= " WHERE name like '%$search%'";
        }

    
        $result = $con->executeQuery($query);
        $result = $result->fetchAll(PDO::FETCH_OBJ);        
        
        return count($result);
    }


    public function searchById($id){

        $con = new Database();
        
        $result = $con->executeQuery('SELECT * FROM training where id = :id', array(
            'id' => $id
        ));
        
        $objeto = $result->fetch(PDO::FETCH_OBJ);
       
        $training = new Training();

        $training->__set('id', $objeto->id);
        $training->__set('name', $objeto->name);
        $training->__set('description', $objeto->description);
        $training->__set('image', $objeto->image);
        

        return $training;
    }


    public function update(Training $training){

       
        $con = new Database();

        $query = "update training set name = :name, description = :description, image = :image where id = :id";
        
        $stmt = $con->prepare($query);
        
        $id = $training->__get('id');
        $name = $training->__get('name');
        $description = $training->__get('description');
        $image = $training->__get('image');
      

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
       
        $result = $stmt->execute();

        

        if (!$result){
            var_dump($stmt->errorInfo() );
            exit;
        }
        
        return $result;

    }


    public function delete($id){
        $con = new Database();

        $query = "delete from training where id = :id";
        
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