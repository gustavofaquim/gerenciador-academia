<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuário</title>
</head>
<body>
    <h2>Registro de Usuário</h2>
    <form action="/user/doRegister" method="post">
        <label for="name">Nome:</label>
        <input type="text" name="name" required><br>
        
        <label for="login">Login:</label>
        <input type="text" name="login" required><br>
        
        <label for="password">Senha:</label>
        <input type="password" name="password" required><br>
        
        <label for="type">Tipo:</label>
        <select name="type">
            <option value="adm">Administrador</option>
            <option value="aluno">Aluno</option>
        </select><br>
        
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
