<?php require "view/parts/header.php";?>
    <body style="background-image: url('public/img/wall4.jpg'); background-repeat: repeat; background-size: cover; background-position: center; height: 90vh; margin: 0;">


<div class="container m-5 d-flex justify-content-center">

    <div class="col-lg-3 my-4 border border-3 border-warning rounded p-2 d-flex flex-column align-items-center justify-content-center">
        <h2 class="text-light">La moto en détail</h2>
        <h2 class="text-light"><?php echo ($moto->getModel()); ?></h2></h2>

        <img src="public/img/<?php echo ($moto->getPicture());?>" height=300 />

        <br>
        <div class="text-center text-light fw-semibold ">
            <?php echo ($moto->getBrand()); ?>
        </div>
        <h3 class="text-light">Les infos : </h3>
        <ul>
            <li class="text-light"><?php echo ($moto->getType()); ?></li>
        </ul>

    </div>
</div>

<div class="d-flex justify-content-center">
    <a href="index.php?controller=planet&action=list" class="btn btn-success mb-4">Retour</a>
</div>


<?php require "view/parts/footer.php";?>