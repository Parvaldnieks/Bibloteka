<?php require "views/components/head.php" ?>

<a class="register" href="/register">Register</a>

<h1 class="big">Login!</h1>

<form method="POST">

    <label>Email:
            <input name="email" type="email" />
    </label>

        <?php if(isset($errors["email"])) { ?>
            <p> <?= $errors["email"] ?> </p>
                <?php } ?>
                
    <label>Password:
            <input name="password" type="password" />
    </label>

        <?php if(isset($errors["password"])) { ?>
            <p> <?= $errors["password"] ?> </p>
                <?php } ?>

    <button>Login</button>

</form>

<?php if(isset($_SESSION["flash"])) { ?>
    <p class="flash"> <?= $_SESSION["flash"] ?> </p>
<?php } ?>

<?php require "views/components/footer.php" ?>