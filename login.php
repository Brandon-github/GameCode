<?php

session_start();

require './controllers/UserController.php';

$_SESSION["title_page"] = "Login";
$_SESSION["nav_state"] = false;

if ($_POST) {
    if (
        (isset($_POST["username"]) && $_POST["username"] != "") && 
        (isset($_POST["password"]) && $_POST["password"] != "")
    ) 
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $userController = new UserController();

        foreach ($userController->getAll() as $user)
        {
            if ($user["username"] == $username && $user["password"] == $password)
            {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $user["id"];
                header("location: admin.php");
            }
        }

        $error = "No se encontro usuario registrado";
    }
}

?>

<?php include_once './layout/partials/head.php' ?>

<div class="container">

    <div class="form__container">
        <div class="form__block form__block--image login">
        </div>
        <div class="form__block">
            <form action="login.php" method="post" class="form">
                <span class="form__icon">
                    <i class="fa-solid fa-user-astronaut"></i>
                </span>
                <div class="form__group">
                    <label for="username" class="form__label"><i class="fa-solid fa-user"></i></label>
                    <input type="text" class="form__control" id="username" name="username" placeholder="Enter username" required>
                </div>
                <div class="form__group">
                    <label for="password" class="form__label"><i class="fa-solid fa-key"></i></label>
                    <input type="password" class="form__control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <?php if (isset($error)) { ?>
                    <span class="alert alert--danger"><?php echo $error ?></span>
                <?php } ?>
                <span class="form__text">you are not registered <a href="register.php" class="form__link">register</a></span>
                <button class="button button--primary" type="submit">Login</button>
            </form>
        </div>
    </div>

</div>

<?php include_once './layout/partials/foot.php' ?>