<?php include __DIR__ . '../../template/header.php'; ?>

<?php 

require_once 'app/controllers/TrainingController.php';



$id = $_GET['id'];

$trainingC = new TrainingController();
$training = $trainingC->searchById($id);

?>
    
    <div class='container container-edit-training'>
        <h2></h2> <br>

        <form action="doEdit" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Nome do Exercício</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $training->__get('name') ?>" required>
                <input type="hidden" name='id' id='id' value="<?= $training->__get('id') ?>"> 
            </div>


            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="4" cols="50" ><?= $training->__get('description') ?></textarea>
            </div>

            <div class="form-group">
                <img alt="Imagem do exercício" class='training-img rounded mx-auto d-block' src="../app/assets/img/<?= $training->__get('image') ?>">
                <input type="hidden" name='old_image' value='<?= $training->__get('image') ?>'>
            </div>

            <div class="form-group">
                <label for="image">Imagem</label>
                <input type="file" class="form-control-file" id="image" name='image'>
            </div>

            <input type="submit" class="btn btn-primary btn-update" value="Atualizar">
        </form>
    </div>


<?php include __DIR__ . '../../template/footer.php'; ?>
