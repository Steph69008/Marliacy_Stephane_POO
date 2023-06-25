<?php require "view/parts/header.php"; ?>
<body style="background-image: url('public/img/wall.jpg'); background-repeat: repeat; background-size: cover; background-position: center; height: 95vh; margin: 0;">

<div class="container">
    <h1 class="text-light text-decoration-underline mb-1 " style="margin-top: 150px; text-align: right">Bienvenue chez ConceSS Moto</h1>
    <?php
    if(isset($_SESSION['user'])){
    ?>
    <div style="margin-top: 150px; text-align: right class="col-4">
        <a href="index.php?controller=moto&action=list" class="d-flex justify-content-center text-light text-decoration-none fs-3 fw-semibold border border-2 border-dark rounded">Voir toutes les motos</a>
    </div>
    <?php
}
?>



</div>
<?php require "view/parts/footer.php";?>