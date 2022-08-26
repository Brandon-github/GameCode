<nav class="nav">
    <?php if(!$_SESSION["login"]) { ?>
    <a href="index.php" class="nav__brand">gamecode</a>
    <?php } ?>
    <?php if($_SESSION["login"]) { ?>
    <div class="nav__photo">
        <img src="./dist/img/photo/<?php echo $data["photo"] ?>" alt="user photo" class="photo">
    </div>
    <?php } ?>
    

    <ul class="nav__list">
        <?php if (!$_SESSION["login"]) { ?>
        <li class="nav__item">
            <a href="index.php" class="nav__link">home</a>
        </li>
        <li class="nav__item">
            <a href="register.php" class="nav__link">register</a>
        </li>
        <li class="nav__item">
            <a href="login.php" class="nav__link">login</a>
        </li>
        <?php } ?>

        <?php if ($_SESSION["login"]) { ?>
        <li class="nav__item">
            <a href="logout.php" class="nav__link">logout</a>
        </li>
        <?php } ?>
    </ul>
</nav>