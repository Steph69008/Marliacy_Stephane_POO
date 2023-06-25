<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/styles.css" rel="stylesheet">
    <title><?php echo isset($title) ? $title : "Moto-ConceSS" ?></title>
    <style>
        .opaque-table {
            background-color: rgba(0, 0, 0, 0.5); /* Black background with 50% opacity */
        }

        .opaque-table td,
        .opaque-table th,
        .opaque-table tr {
            background-color: rgba(0, 0, 0, 0.2); /* Black background with 100% opacity */
            color: white; /* White text */
        }
    </style>
</head>

<body style="background-image: url('public/img/wall2.jpg'); background-repeat: repeat; background-size: cover; background-position: center; height: 200vh; margin: 0;">
<nav class="navbar navbar-expand-xl navbar-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="public/img/logo.png" alt="logo" height="50px" ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse show" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="index.php?controller=default&action=home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?controller=moto&action=list">Moto</a>
                </li>
            </ul>
            <span class="navbar-text fw-bold fs-4 text-primary pe-5">
                    <?php
                    if ($this->currentUser) {
                        echo ('Bonjour ' . $this->currentUser->getUsername());
                    } ?>
                </span>
            <?php if (!$this->connexion_status()) {
                echo '<a class=" btn btn-dark nav-link fw-semibold text-light p-2" href="index.php?controller=security&action=login">Connexion</a>';
            } else if ($this->connexion_status()) {
                echo '<a class=" btn btn-danger nav-link fw-semibold text-light p-2" href="index.php?controller=security&action=logout">Déconnexion</a>';
            }
            ?>
        </div>
    </div>
</nav>


<div class="container">
    <h1 class="text-center text-primary mb-2">La liste des Motos</h1>
    <?php
    if(isset($_SESSION['user'])){
    ?>
        <div class="d-flex justify-content-center">
            <a href="index.php?controller=moto&action=add" class="btn btn-outline-primary my-4 fw-semibold">Ajouter une Moto</a>
        </div>
    <?php
}
?>

    <table class="table table-dark opaque-table rounded">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fabriquant</th>
                <th scope="col">Modèle</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col">Détail</th>
                <?php
                if(isset($_SESSION['user'])){
                    ?>
                    <th scope="col">Suppression</th>
                    <?php
                }
                ?>


            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($motos as $moto) {
            ?>
                <tr>
                    <th scope="row" class="align-middle"><?php echo ($moto->getId()) ?></th>
                    <td class="align-middle"><?php echo ($moto->getBrand()) ?></td>
                    <td class="align-middle"><?php echo ($moto->getModel()) ?></td>
                    <td class="align-middle"><?php echo ($moto->getType()) ?></td>
                    <td class="align-middle"><img class="rounded" style="max-height: 50px" src="public/img/<?php echo ($moto->getPicture()) ?>" alt="image_moto"></td>
                    <td class="align-middle">
                        <a href="index.php?controller=moto&action=detail&id=<?php echo ($moto->getId()); ?>" class="fw-semibold btn btn-outline-info">
                            Voir <?php echo ($moto->getModel()); ?></a>

                    </td>
                    <?php
                    if(isset($_SESSION['user'])){
                        ?>
                        <td class="align-middle">
                            <a href="index.php?controller=moto&action=delete&id=<?php echo ($moto->getId()); ?>" class="fw-semibold btn btn-outline-danger">Supprimer la moto</a>
                        </td>
                        <?php
                    }
                    ?>


                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    <a href="index.php?controller=default&action=home" class="btn btn-outline-success mb-4">Accueil</a>
</div>
<?php require "view/parts/footer.php" ?>