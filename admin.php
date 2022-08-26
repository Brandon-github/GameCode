<?php 

session_start();

require './controllers/UserController.php';

$_SESSION["title_page"] = "Admin";
$_SESSION["nav_state"] = true;

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
    <div class="menu">
        <a href="admin-settings.php" class="menu__option">
            <span class="menu__option-icon">
                <i class="fa-solid fa-gear"></i>
            </span>
            Settings
        </a>

    </div>

</div>

<?php include_once './layout/partials/foot.php' ?>