<?php include __DIR__ . '../../template/header.php'; ?>

<div class='container user-container'>
    <h2>Novo Usuário</h2> <br>

    <form action="doCreate" method="post">

        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="name">Primeiro Nome:</label>
                    <input type="text"  class="form-control" name="name" required><br>
                </div>
                <div class="col">
                    <label for="name">Sobrenome:</label>
                    <input type="text"  class="form-control" name="last_name" required><br>
                </div>
            </div>     
        </div>

        
        <div class="form-group">
            <label for="birth">Data de Nascimento</label>
            <input type="date" id='birth'  class="form-control" name="birth" required><br>
        </div>

        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="login">Usuário</label>
                    <input type="text" id='login'  class="form-control" name="login" required><br>
                </div>
                <div class="col">
                    <label for="password">Senha:</label>
                    <input type="text" id='password'  class="form-control" name="password" required><br>
                </div>

                <div class="col">
                    <label for="type">Tipo:</label>
                    <select class="form-control" name='type' id='type'>
                        <option value='adm'>Administrador</option>
                        <option value='aluno'>Aluno</option>
                    </select>
                </div>
            </div>     
        </div>

        <div class="form-group">
            <label for="comments">Informações Adicionais</label>
            <textarea class="form-control" id="comments" name='comments' rows="3"></textarea>
        </div>

    
        <input type="submit" class="btn btn-primary" value="Criar Usuário">
    </form>
</div>



<?php include __DIR__ . '../../template/footer.php'; ?>