<?php require "views/components/head.php" ?>

<a class="books" href="/">Back to home</a>

<h1 class="show-name"> <?= htmlspecialchars($post["name"]) ?>! </h1>

<h1> <a class="show-edit" href="/edit?id=<?= $post["id"] ?>">Edit?</a> </h1>

<?php require "views/components/footer.php" ?>