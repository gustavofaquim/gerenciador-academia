<?php

require_once 'app/models/User.php';
require_once 'app/dao/UserDAO.php';

class UserController {
    
    public function index() {
        // Página inicial do UserController, por exemplo, redirecionar para login
        require_once 'app/views/user/index.php';
    }

    public function showLoginForm() {
        require_once 'app/views/user/login.php';
    }


    public function create() {
        require_once 'app/views/user/create.php';
    }

    public function register() {
        require_once 'app/views/user/register.php';
    }

    public function doCreate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $type = $_POST['type'];
            $comments = $_POST['comments'];
            $birth = $_POST['birth'];
            $last_name = $_POST['last_name'];
            
            $userModel = new User();

            // Definir os dados do novo usuário
            $userModel->name = $name;
            $userModel->login = $login;
            $userModel->password = password_hash($password, PASSWORD_DEFAULT); // Criptografar a senha
            $userModel->type = $type;
            $userModel->last_name = $last_name;
            $userModel->birth = $birth;
            $userModel->comments = $comments;

           
            $userDAO = new UserDAO();

            if($userDAO->save($userModel)){
                echo 'Dados gravados com sucesso';
                header('Location: ../index.php', true, 302);
            }else{
                header('Lacation: /0');
            }

        }
    }


    public function listAll(){
        $userDAO = new UserDAO();

        $list = $userDAO->listAll();

        return $list;
    }

    public function login() {
        require_once 'app/views/user/login.php';
    }


    public function checkAuthentication() {
        // Verifique se o usuário está logado
        // Se não estiver logado, redirecione para a página de login
        if (!isset($_SESSION['user'])) {
            header('Location: app/views/user/login.php');
            exit;
        }
    }

    public function doLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $userDAO = new UserDAO();

            $return = $userDAO->authentication($login, $password);
           
            if(is_object($return)){
                $_SESSION['logado'] = true;
                $_SESSION['user'] = $return;
                echo 'Usuário logado';
                ob_end_clean(); 
                $redirect_url = "../";
                

            }else{
                echo 'Erro no login';
                ob_end_clean(); 
                $redirect_url = "login";
            }

            header("Location: " . $redirect_url);
           
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        session_destroy();

        ob_end_clean(); 
        $redirect_url = "login";
        header("Location: " . $redirect_url);
    }


    public function searchById($id){
        $userDAO = new userDAO();

        $user = $userDAO->searchById($id);

        return $user;
    }


    public function edit(){
        require_once 'app/views/user/edit.php';
    }




    public function doEdit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $type = $_POST['type'];
            $comments = $_POST['comments'];
            $birth = $_POST['birth'];
            $last_name = $_POST['last_name'];
            
            $userModel = new User();

            $userModel->id = $id;
            $userModel->name = $name;
            $userModel->login = $login;
            $userModel->password = password_hash($password, PASSWORD_DEFAULT); // Criptografar a senha
            $userModel->type = $type;
            $userModel->last_name = $last_name;
            $userModel->birth = $birth;
            $userModel->comments = $comments;

           
            $userDAO = new UserDAO();
           

            if($userDAO->update($userModel)){
                header('Location: /gerenciador-academia/user/', true, 302);
            }else{
                header('Lacation: /gerenciador-academia/user/');
            }

        }
    }


    public function delete(){

        $id = $_GET['id'];
        
        $userDAO = new userDAO();

        if($userDAO->delete($id)){
            header('Location: /gerenciador-academia/user/', true, 302);
        }
    }
    
}
