<?php include __DIR__ . '../../template/header.php'; ?>
    



<div class='container container-login'>

    <h1>Bem-vindo</h1>

    <form action="doLogin" method="POST">
        <div class="form-group">
            <label for="login">Usuário</label>
            <input type="text" class="form-control" id="login" name='login' aria-describedby="login" placeholder="Login">
            
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name='password' placeholder="Senha">
        </div>
       
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>


<?php include __DIR__ . '../../template/footer.php'; ?>