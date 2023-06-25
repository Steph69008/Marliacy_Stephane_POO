<?php require "view/parts/header.php"; ?>

<div class="container">

    <h1>Créer mon compte !!</h1>
    <div class="d-flex justify-content-end">
        <a href="index.php?controller=default&action=home" class="btn btn-secondary">Accueil</a>
    </div>
    <form method="post">
        <div class="col-md-12">
            <label for="username">Username *</label>
            <input id="username" type="text" name="username" class="form-control
                    <?php if (array_key_exists('username', $errors)) {
                        echo ('is-invalid');
                    } ?>" value="<?php if (array_key_exists("username", $_POST)) {
                                        echo ($_POST["username"]);
                                    } ?>">

            <div class="invalid-feedback">
                <?php if (array_key_exists("username", $errors)) {
                    echo ($errors["username"]);
                } ?>
            </div>
        </div>


        <div class="col-md-12">
            <label for="password">Mot de passe *</label>
            <input id="password" type="password" name="password" class="form-control  <?php if (array_key_exists('password', $errors)) {
                                                                                            echo ('is-invalid');
                                                                                        } ?>">
            <div class="invalid-feedback">
                <?php if (array_key_exists("password", $errors)) {
                    echo ($errors["password"]);
                } ?>
            </div>
        </div>

        <div class="col-md-12">
            <label for="password">Confirmation *</label>
            <input id="password" type="password" name="confirm_password" class="form-control  <?php if (array_key_exists('confirm_password', $errors)) {
                                                                                                    echo ('is-invalid');
                                                                                                } ?>">

            <div class="invalid-feedback">
                <?php if (array_key_exists("confirm_password", $errors)) {
                    echo ($errors["confirm_password"]);
                } ?>
            </div>
        </div>

        <input type="submit" class="btn btn-success m-2">

    </form>
</div>




<?php require "view/parts/footer.php"; ?>