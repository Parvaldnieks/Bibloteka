<?php require "views/components/head.php" ?>

<a class="books" href="/">Back to home</a>

<h1 class="create-book">Create a book</h1>

<form class="create-column" method="POST">

    <label>Name:
        <input name="name" value="<?= $_GET["name"] ?? "" ?>"/>
            <?php if(isset($errors["name"])) { ?>
                <p><?= $errors["name"] ?></p>
                    <?php } ?>
    </label>

    <label>Author:
        <input name="author" value="<?= $_GET["author"] ?? "" ?>"/>
            <?php if(isset($errors["author"])) { ?>
                <p><?= $errors["author"] ?></p>
                    <?php } ?>
    </label>

    <label>Released:
        <input type="date" name="released" value="<?= $_GET["released"] ?? "" ?>"/>
            <?php if(isset($errors["released"])) { ?>
                <p><?= $errors["released"] ?></p>
                    <?php } ?>
    </label>

    <label>Availability:
        <input name="availability" value="<?= $_GET["availability"] ?? "" ?>"/>
            <?php if(isset($errors["availability"])) { ?>
                <p><?= $errors["availability"] ?></p>
                    <?php } ?>
    </label>

    <button>Create</button>
</form>
                
<?php require "views/components/footer.php" ?>