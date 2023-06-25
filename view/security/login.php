<?php require "view/parts/header.php";
$errors = [];
var_dump($_POST);




?>
<body style="background-image: url('public/img/wall3.jpg'); background-repeat: repeat; background-size: cover; background-position: center; height: 100vh; margin: 0;">
<div class="container">

    <h1 class="text-light">Connection</h1>

    <form method="post">
        <div class="col-md-12">
            <label for="username" class="text-light">Login</label>
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
            <label for="password" class="text-light">Mot de passe *</label>
            <input id="password" type="password" name="password" class="form-control  <?php if (array_key_exists('password', $errors)) {
                                                                                            echo ('is-invalid');
                                                                                        } ?>">
            <div class="invalid-feedback">
                <?php if (array_key_exists("password", $errors)) {
                    echo ($errors["password"]);
                } ?>
            </div>
        </div>
        <input type="submit" class="btn btn-success m-2">
    </form>

<?php require "view/parts/footer.php"; ?>