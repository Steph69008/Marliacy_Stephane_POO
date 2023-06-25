<body style="background-image: url('public/img/wall404.jpg'); background-repeat: repeat; background-size: cover; background-position: center; height: 95vh; margin: 0;">

<div class="container">
    <?php require 'view/parts/header.php'; ?>
    <h1 class="mt-5 text-dark">Oops ! Cette page n'existe pas ...</h1>

    <?php
    if ($_GET["scope"] == 'car') {
        echo ('<h2>Cette moto a probablement été supprimée</h2>');
    }
    ?>
    <button onclick="window.history.back()">Revenir en arrière</button>

    <?php require 'view/parts/footer.php'; ?>
</div>