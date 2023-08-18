<?php include __DIR__ . '../../template/header.php'; ?>
    
    <div class='container'>
        <h2>Criar Treino</h2> <br>

        <form action="doCreate" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Nome do Exercício</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>


            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="4" cols="50" ></textarea>
            </div>

            <div class="form-group">
                <label for="image">Imagem</label>
                <input type="file" class="form-control-file" id="image" name='image'>
            </div>

            <input type="submit" class="btn btn-primary" value="Criar Treino">
        </form>
    </div>


<?php include __DIR__ . '../../template/footer.php'; ?>
