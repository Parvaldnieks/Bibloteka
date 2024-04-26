<?php require "views/components/head.php" ?>

<a class="login" href="/login">Login</a>

<h1 class="big">Register!</h1>

<form method="POST" class="create-column">

    <label>Email:
        <input name="email" />
    </label>
        <?php if(isset($errors["email"])) { ?>
                <p><?= $errors["email"] ?></p>
                    <?php } ?>

    <label>Password:
        <input name="password" type="password" />
    </label>
            <span class="parole">(Jābūt 8 rakstzīmēm, vismaz 1 lielam burtam un mazam, kā arī ciparam un simbolam!)</span>
        <?php if(isset($errors["password"])) { ?>
                <p><?= $errors["password"] ?></p>
                    <?php } ?>

    <button>Register</button>

</form>

<?php require "views/components/footer.php" ?>