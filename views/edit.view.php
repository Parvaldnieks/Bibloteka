<?php require "views/components/head.php" ?>

<a class="books" href="/show?id=<?= $post["id"] ?>">Back to show</a>

<h1 class="edit">Edit a book</h1>

<form class="create-column" method="POST">

<input name="id" value="<?= $post["id"] ?>" type="hidden" />

    <label>Name:
        <input name="name" value="<?= $_POST["name"] ?? $post["name"] ?>"/>
            <?php if(isset($errors["name"])) { ?>
                <p class="invalid-data"><?= $errors["name"] ?></p>
            <?php } ?>
    </label>

    <label>Author:
        <input name="author" value="<?= $_POST["author"] ?? $post["author"] ?>"/>
            <?php if(isset($errors["author"])) { ?>
                <p class="invalid-data"><?= $errors["author"] ?></p>
            <?php } ?>
    </label>

    <label>Released:
        <input type="date" name="released" value="<?= $_POST["released"] ?? $post["released"] ?>"/>
            <?php if(isset($errors["released"])) { ?>
                <p class="invalid-data"><?= $errors["released"] ?></p>
            <?php } ?>
    </label>

    <label>Availability (yes or no):
        <input name="availability" value="<?= $_POST["availability"] ?? $post["availability"] ?>"/>
            <?php if(isset($errors["availability"])) { ?>
                <p class="invalid-data"><?= $errors["availability"] ?></p>
            <?php } ?>
    </label>

    <button>Save</button>
</form>

<?php require "views/components/footer.php" ?>