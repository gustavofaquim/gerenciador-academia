<?php

require_once 'app/models/Training.php';
require_once 'app/dao/TrainingDAO.php';

class TrainingController {
    public function index() {
        // Página inicial do TrainingController, por exemplo, redirecionar para listagem
        require_once 'app/views/training/index.php';
    }

    public function create() {
        require_once 'app/views/training/create.php';
    }

    public function doCreate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $name = $_POST['name'];
            $description = $_POST['description'];
            
            $image = NULL;
            

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                
                $nomeTemporario = $_FILES['image']['tmp_name'];
                
                $extensao = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                $novoNome = uniqid() . '.' . $extensao;

                $caminhoCompleto = 'app/assets/img/' . $novoNome;

                move_uploaded_file($nomeTemporario, $caminhoCompleto);

                $image = $novoNome;
            }
            
            
            $trainingModel = new Training();

           
            $trainingModel->name = $name;
            $trainingModel->description = $description;
            $trainingModel->image = $image;
           

           
            $trainingDAO = new TrainingDAO();

            if($trainingDAO->save($trainingModel)){
                echo 'Dados gravados com sucesso';
                header('Location: /gerenciador-academia/training/', true, 302);
            }else{
                header('Lacation: /gerenciador-academia/training/');
            }

        }
    }

    public function listAll($search = null, $page = 1, $perPage = 10){
        $trainingDAO = new TrainingDAO();

        $offset = ($page - 1) * $perPage;

        $list = $trainingDAO->listAll($search,$perPage,$offset);

        return $list;
    }

    public function countResults($search){
        
        $trainingDAO = new TrainingDAO();

        $count = $trainingDAO->countResults($search);

        return $count;
    }


    public function searchById($id){
        $trainingDAO = new TrainingDAO();

        $training = $trainingDAO->searchById($id);

        return $training;
    }


    public function edit(){
        require_once 'app/views/training/edit.php';
    }

    public function doEdit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $oldImagem = $_POST['old_image'];
            
            $image = $oldImagem;
            

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                
                $nomeTemporario = $_FILES['image']['tmp_name'];
                
                
                if($oldImagem != null){
                    $nomeDoArquivoAntigo = $oldImagem;

                    $caminhoCompletoArquivoAntigo = 'app/assets/img/' . $nomeDoArquivoAntigo;
    
                    // Excluindo arquivo antigo do servidor.
                    unlink($caminhoCompletoArquivoAntigo);
    
                }

                $extensao = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                $novoNome = uniqid() . '.' . $extensao;

                $caminhoCompleto = 'app/assets/img/' . $novoNome;

                move_uploaded_file($nomeTemporario, $caminhoCompleto);

                $image = $novoNome;

                
            }
            
            
            $trainingModel = new Training();

            $trainingModel->id = $id;
            $trainingModel->name = $name;
            $trainingModel->description = $description;
            $trainingModel->image = $image;
           

           
            $trainingDAO = new TrainingDAO();

            if($trainingDAO->update($trainingModel)){
                header('Location: /gerenciador-academia/training/', true, 302);
            }else{
                header('Lacation: /gerenciador-academia/training/');
            }

        }
    }


    public function delete(){

        $id = $_GET['id'];
        
        $trainingDAO = new TrainingDAO();

        if($trainingDAO->delete($id)){
            header('Location: /gerenciador-academia/training/', true, 302);
        }
    }
}
