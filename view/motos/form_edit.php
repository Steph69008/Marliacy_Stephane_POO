<?php require 'view/parts/header.php'; ?>
<div class="container">
    <h1>Modifier l'objet <?php echo ($moto->getName()); ?>!</h1>
    <div class="d-flex justify-content-end">
    <a href="index.php?controller=objet&action=list" class="btn btn-outline-secondary">Retour</a>
</div>

    <form method="post" class="row">
        <div class="col-md-12">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" value="<?php echo ($moto->getName()); ?>" name="nom" class="form-control
            <?php if (array_key_exists("nom", $errors)) {
                echo ('is-invalid');
            } ?>" id="nom">

            <div id="validateNom" class="invalid-feedback">
                <?php if (array_key_exists("nom", $errors)) {
                    echo ($errors["nom"]);
                } ?>
            </div>
        </div>

        <div class="col-md-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description"><?php echo ($moto->getAttribut3()); ?>
            </textarea>
        </div>

        <div class="col-md-12">
            <label for="validationCustom04" class="form-label"></label>
            <select class="form-select
                <?php if (array_key_exists("attribut44", $errors)) {
                        echo ('is-invalid');
                    } ?>" name="attribut4" id="validationCustom04">
                <option value="">Pas d'infos</option>
                <?php
                foreach (ObjetController::$allowedAttribut4 as $attribut4) {
                    $selected = '';
                    if ($moto->getAttribut4() == $attribut4) {
                        $selected = 'selected';
                    }
                    echo ('<option ' . $selected . ' value="' . $attribut4 . '">' . $attribut4 . '</option>');
                }
                ?>
            </select>
            <div class="invalid-feedback">
                <?php if (array_key_exists("attribut4", $errors)) {
                    echo ($errors["attribut4"]);
                } ?>
            </div>
        </div>
        <div class="col-md-12">
            <label for="attribut5" class="form-label">Attribut5</label>
            <textarea class="form-control" name="attribut5" id="attribut5"><?php echo ($moto->getAttribut5()); ?>
            </textarea>
        </div>

        <div class="col-md-12">
            <label for="picture" class="form-label">Photo</label>
            <input value="<?php echo ($moto->getPicture()); ?>" type="text" name="picture" class="form-control
            <?php if (array_key_exists("picture", $errors)) {
                echo ('is-invalid');
            } ?>" id="picture">
            <div class="invalid-feedback">
                <?php if (array_key_exists("picture", $errors)) {
                    echo ($errors["picture"]);
                } ?>
            </div>
        </div>


        <input type="submit" class="btn btn-success m-2">

    </form>
    <?php require 'view/parts/footer.php'; ?>