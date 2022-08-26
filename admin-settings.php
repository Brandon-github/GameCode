<?php 

session_start();

require './controllers/UserController.php';

$_SESSION["title_page"] = "Admin Settings";
$_SESSION["nav_state"] = false;

if (!$_SESSION["login"])
{
    header("location: login.php");
}

$userController = new UserController();

$id = $_SESSION["id"];
$data = $userController->getById($id);

?>
<?php include_once './layout/partials/head.php' ?>

<div class="container">

    <div class="form__container">
        <div class="form__block">
            <img src="dist/img/photo/<?php echo $data["photo"] ?>" alt="profile image" class="profile__image">
        </div>
        <div class="form__block">
            <form action="register.php" method="post" id="register" class="form" enctype="multipart/form-data">
                <span class="form__icon">
                    <i class="fa-solid fa-users-gear"></i>
                </span>
                <div class="form__group">
                    <label for="firstname" class="form__label"><i class="fa-solid fa-pencil"></i></i></label>
                    <input type="text" value="<?php echo $data["firstname"] ?>" class="form__control" id="firstname" name="firstname" placeholder="Enter firstname" required>
                </div>
                <div class="form__group">
                    <label for="lastname" class="form__label"><i class="fa-solid fa-pencil"></i></label>
                    <input type="text" value="<?php echo $data["lastname"] ?>" class="form__control" id="lastname" name="lastname" placeholder="Enter lastname">
                </div>
                <div class="form__group">
                    <label for="username" class="form__label"><i class="fa-solid fa-user"></i></label>
                    <input type="text"  value="<?php echo $data["username"] ?>" class="form__control" id="username" name="username" placeholder="Enter username">
                </div>
                <div class="form__group">
                    <label for="photo" class="form__label"><i class="fa-solid fa-camera"></i></label>
                    <input type="file" class="form__control" id="photo" name="photo">
                </div>
                <?php if (isset($error)) { ?>
                    <span class="alert alert--danger"><?php echo $error ?></span>
                <?php } ?>
                <button class="button button--primary" type="submit">Save</button>
            </form>
        </div>
    </div>

</div>

<?php include_once './layout/partials/foot.php' ?>