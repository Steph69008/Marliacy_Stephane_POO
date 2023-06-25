<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/styles.css" rel="stylesheet">
    <title><?php echo isset($title) ? $title : "Moto-ConceSS" ?></title>
</head>

<body>
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
                <?php if ($this->connexion_status()) {
                    ?><li class="nav-item">
                      <a class="nav-link text-light" href="index.php?controller=moto&action=list">Motos</a>
                </li>                }
                <?php } ?>

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