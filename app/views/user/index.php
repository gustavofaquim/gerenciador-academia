<?php include __DIR__ . '../../template/header.php'; ?>

<?php

require_once 'app/controllers/UserController.php';

$userC = new UserController();
$listAll = $userC->listAll();

?>

<div class='container list-user'>
<div class="accordion" id="accordion">
  
<?php 

foreach($listAll as $id => $list){
    $id = $list->__get('id');
    //if($list->__get('type') == 'aluno'){

   
?>
 <div class="card">
    <div class="card-header" id="heading-<?= $id ?>">
        <h5 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?= $id ?>" aria-expanded="false" aria-controls="collapse-<?= $id ?>">
                <?php echo $list->__get('name'); ?>
            </button>
            <div class='actions-user'>
                <a href="edit?id=<?= $id ?>"><i class="fa-regular fa-pen-to-square" style="color: #175eee;"></i></a>
                <a href="delete?id=<?= $id ?>"><i class="fa-solid fa-trash" style="color: #d91d08;"></i></a>
            </div>
        </h5>
    </div>

    <div id="collapse-<?= $id ?>" class="collapse" aria-labelledby="heading-<?= $id ?>" data-parent="#accordion">
        <div class="card-body card-user-list">
           <p><span>Nome:</span> <?php echo $list->__get('name'); ?> </p>
           <p><span>Sobrenome:</span> <?php echo $list->__get('last_name'); ?> </p>
           <p><span>Data de Nascimento:</span> <?php echo $list->__get('birth'); ?> </p>
           <p><span>Usuário:</span> <?php echo $list->__get('login'); ?> </p>
           <p><span>Informações Adicionais:</span> <?php echo $list->__get('comments'); ?> </p>
           <p><span>Tipo:</span> <?php echo $list->__get('type'); ?></p>
        </div>
    </div>
  </div>

<?php } //} ?>

</div>
</div>

<div class='container btn-add'>
    <a href="create"><i class="fa-solid fa-circle-plus" style="color: #105ada;"></i></a>
</div>


<?php include __DIR__ . '../../template/footer.php'; ?>