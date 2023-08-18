<?php include __DIR__ . '../../template/header.php'; ?>

<?php 

require_once 'app/controllers/TrainingController.php';



$id = $_GET['id'];

$userC = new UserController();
$user = $userC->searchById($id);

?>
    
    <div class='container container-edit-training'>
        <h2></h2> <br>

        <form action="doEdit" method="post">

            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="name">Primeiro Nome:</label>
                        <input type="text"  class="form-control" name="name" value="<?= $user->__get('name') ?>" required><br>
                    </div>
                    <div class="col">
                        <label for="name">Sobrenome:</label>
                        <input type="text"  class="form-control" name="last_name" value="<?= $user->__get('last_name') ?>" required><br>
                    </div>
                </div>     
            </div>


            <div class="form-group">
                <label for="birth">Data de Nascimento</label>
                <input type="date" id='birth'  class="form-control" name="birth" value="<?= $user->__get('birth') ?>" required><br>
                <input type="hidden" name='id' id='id' value="<?= $user->__get('id') ?>"> 
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="login">Usuário</label>
                        <input type="text" id='login'  class="form-control" name="login" value="<?= $user->__get('login') ?>" required><br>
                    </div>
                    <div class="col">
                        <label for="password">Senha:</label>
                        <input type="text" id='password'  class="form-control" name="password"  required><br>
                    </div>

                    <div class="col">
                        <label for="type">Tipo:</label>
                        <select class="form-control" name='type' id='type'>
                            <option value='adm' <?php if($user->__get('type') == 'adm'){ echo 'selected';} ?>  >Administrador</option>
                            <option value='aluno' <?php if($user->__get('type') == 'aluno'){ echo 'selected';} ?> >Aluno</option>
                        </select>
                    </div>
                </div>     
            </div>

            <div class="form-group">
                <label for="comments">Informações Adicionais</label>
                <textarea class="form-control" id="comments" name='comments' rows="3">
                <?= $user->__get('comments') ?>
                </textarea>
            </div>


            <input type="submit" class="btn btn-primary" value="Atualizar">
        </form>
    </div>


<?php include __DIR__ . '../../template/footer.php'; ?>
