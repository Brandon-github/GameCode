<?php 
require './layout/partials/session.php'; 
$_SESSION["title_page"] = "Home"; 
$_SESSION["nav_state"] = true;

if ($_SESSION["login"])
{
    header("location: admin.php");
}
?>
<?php include_once './layout/partials/head.php' ?>

<div class="container">

</div>

<?php include_once './layout/partials/foot.php' ?>
