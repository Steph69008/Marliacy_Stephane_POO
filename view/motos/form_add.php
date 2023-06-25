<?php $errors = [];
require 'view/parts/header.php'
?>

<body style="background-image: url('public/img/wall5.jpg'); background-repeat: repeat; background-size: cover; background-position: center; height: 100vh; margin: 0;">

<div class="container">
    <h1 class="text-center text-light">Ajouter une Moto </h1>
    <div class="d-flex justify-content-end">
        <a href="index.php?controller=motot&action=list" class="btn btn-secondary my-5">Retour</a>
    </div>
    <form method="post" >
        <div class="col-md-4">
            <label for="brand" class="form-label text-light">Constructeur</label>
            <input type="text" value="<?php if (array_key_exists("brand", $_POST)) {
                echo ($_POST["brand"]);
            }; ?>" name="brand" class="form-control
            <?php if (array_key_exists("brand", $errors)) {
                echo ('is-invalid');
            } ?>" id="brand">

            <div id="validateBrand" class="invalid-feedback"><br>
                <?php if (array_key_exists("brand", $errors)) {
                    echo ($errors["brand"]);
                } ?>
            </div>
        </div>

        <div class="col-md-4">
            <label for="model" class="form-label text-light">Modèle</label><br>
            <input type="text class=" form-control" name="model" id="model"></input>
        </div>

        <div class="col-md-4">
            <label for="type" class="form-label text-light">Type</label>
            <select class="form-select
                <?php if (array_key_exists("type", $errors)) {
                echo ('is-invalid');
            } ?>" name="type" id="type">
                <option value="">Sportive</option>
                <option value="">Enduro</option>
                <option value="">Custom</option>
                <option value="">Roadster</option>
                <!-- <?php
                // foreach (ObjetController::$allowedAttribut4 as $attribut4) {
                //     $selected = '';
                //     if (array_key_exists("type", $_POST) && $_POST["type"] == $type) {
                //         $selected = 'selected';
                //     }
                //     echo ('<option ' . $selected . ' value="' . $type . '">' . $type . '</option>');
                // }
                ?> -->
            </select>
            <div class="invalid-feedback">
                <?php if (array_key_exists("attribut4", $errors)) {
                    echo ($errors["attribut4"]);
                } ?>
            </div>
        </div>
        <div class="col-md-4">
            <label for="picture" class="form-label text-light">Photo</label>
            <input type="file" name="picture" class="form-control
            <?php if (array_key_exists("picture", $errors)) {
                echo ('is-invalid');
            } ?>" id="picture">
            <div class="invalid-feedback">
                <?php if (array_key_exists("picture", $errors)) {
                    echo ($errors["picture"]);
                } ?>
            </div>
        </div>
        <input type="submit" class="btn btn-success col-2 m-2">

    </form>
</div>







</body>
</html>