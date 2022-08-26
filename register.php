<?php 

require './controllers/UserController.php';

$userController = new UserController();

if ($_POST)
{
    $data = [];
    $unique_user = true;

    if (
        (isset($_POST["firstname"]) && $_POST["firstname"] != "") &&
        (isset($_POST["lastname"]) && $_POST["lastname"] != "") &&
        (isset($_POST["username"]) && $_POST["username"] != "") &&
        (isset($_POST["password"]) && $_POST["password"] != "") &&
        (isset($_POST["password2"]) && $_POST["password2"] != "") &&
        (isset($_FILES["photo"]) && $_FILES["photo"] != "")
    )
    {
        $date = new DateTime();

        $data["firstname"] = $_POST["firstname"];
        $data["lastname"] = $_POST["lastname"];
        $data["username"] = $_POST["username"];
        $data["password"] = $_POST["password"];
        $data["password2"] = $_POST["password2"];
        $data["photo"] = $date->getTimestamp()."_".$_FILES["photo"]["name"];
        
        if ($data["password"] == $data["password2"])
        {
            $temp_image = $_FILES["photo"]["tmp_name"];
            move_uploaded_file($temp_image, "dist/img/photo/".$data["photo"]);

            foreach ($userController->getAll() as $user)
            {
                if ($data["username"] == $user["username"])
                {
                    $unique_user = false;
                    header("location: register.php");
                }
            }

            if ($unique_user)
            {
                $userController->create($data);
                header("location: login.php");
            }
        }
        else
        {
            $error = "Las contraseñas deben ser iguales";
        }

    } 
}
?>

<?php include_once './layout/partials/head.php' ?>

<div class="container">

    <div class="form__container">
        <div class="form__block form__block--image register">
        </div>
        <div class="form__block">
            <form action="register.php" method="post" id="register" class="form" enctype="multipart/form-data">
                <span class="form__icon">
                    <i class="fa-solid fa-user-plus"></i>
                </span>
                <div class="form__group">
                    <label for="firstname" class="form__label"><i class="fa-solid fa-pencil"></i></i></label>
                    <input type="text" class="form__control" id="firstname" name="firstname" placeholder="Enter firstname" required>
                </div>
                <div class="form__group">
                    <label for="lastname" class="form__label"><i class="fa-solid fa-pencil"></i></label>
                    <input type="text" class="form__control" id="lastname" name="lastname" placeholder="Enter lastname">
                </div>
                <div class="form__group">
                    <label for="username" class="form__label"><i class="fa-solid fa-user"></i></label>
                    <input type="text" class="form__control" id="username" name="username" placeholder="Enter username">
                </div>
                <div class="form__group">
                    <label for="password" class="form__label"><i class="fa-solid fa-key"></i></label>
                    <input type="password" class="form__control" id="password" name="password" placeholder="Enter password">
                </div>
                <div class="form__group">
                    <label for="password2" class="form__label"><i class="fa-solid fa-key"></i></label>
                    <input type="password" class="form__control" id="password2" name="password2" placeholder="Enter password again">
                </div>
                <div class="form__group">
                    <label for="photo" class="form__label"><i class="fa-solid fa-camera"></i></label>
                    <input type="file" class="form__control" id="photo" name="photo">
                </div>
                <?php if (isset($error)) { ?>
                    <span class="alert alert--danger"><?php echo $error ?></span>
                <?php } ?>
                <span class="form__text">you already have an account <a href="login.php" class="form__link">login</a></span>
                <button class="button button--primary" type="submit">Register</button>
            </form>
        </div>
    </div>

</div>

<?php include_once './layout/partials/foot.php' ?>