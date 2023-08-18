<?php include __DIR__ . '../../template/header.php'; ?>


<?php

require_once 'app/controllers/TrainingController.php';

$TrainingC = new TrainingController();


$perPage = 10;

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$search = isset($_GET['search']) ? $_GET['search'] : null;


$totalResults = $TrainingC->countResults($search);

$totalPages = ceil($totalResults / $perPage);

$listAll = $TrainingC->listAll($search, $page, $perPage);

?>



<div class="row d-flex justify-content-center">
    <div class="col-md-4">
        <div class="card card-search">          
            <div class="input-box ">
                <form action="" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Pesquisar treinos..."><i class="fa fa-search"></i>  
            </form>
            
            </div>
        </div>
    </div>
</div>


<div class='container list-training'>
    <div class='row'>
    
<?php 

foreach($listAll as $id => $list){
?>

    <div class='col-sm-5'>
        <div class='card card-training'>
            <img class='card-img-top' src="../app/assets/img/<?= $list->__get('image')  ?>" alt='Imagem de capa'>
            <div class='card-body'>
                <p class='card-text title-training'> <?= $list->__get('name') ?></p>
                <p class='card-text'><?= $list->__get('description') ?></p>
            </div>
            <div class='actions-training'>
                <a href="edit?id=<?= $list->__get('id') ?>"><i class="fa-regular fa-pen-to-square" style="color: #175eee;"></i></a>
                <a href="delete?id=<?= $list->__get('id') ?>"><i class="fa-solid fa-trash" style="color: #d91d08;"></i></a>
            </div>
        </div>
    </div>

<?php } ?>
</div>
</div>


<div class='container'>

<nav aria-label="...">
  <ul class="pagination justify-content-center">
    <?php

for ($i = 1; $i <= $totalPages; $i++) {
    $searchParam = isset($_GET['search']) ? '&search=' . $_GET['search'] : '';
    

?>
    <li class="page-item"><?php echo "<a class='page-link' href='?page=$i$searchParam'>$i</a> "; ;?></li>
<?php } ?>
  </ul>
</nav>




</div>

<div class='container btn-add'>
    <a href="create"><i class="fa-solid fa-circle-plus" style="color: #105ada;"></i></a>
</div>


<?php include __DIR__ . '../../template/footer.php'; ?>