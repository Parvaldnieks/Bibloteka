<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>

<form class="logout" action="/logout" method="POST">
  <button>Logout</button>
</form>

  <h1 class="BOOKS">Books</h1>

  <ul class="big-text">
    <?php foreach($posts as $post) { ?>

    
      <div class="text">
        <a class="name" href="/show?id=<?= $post["id"]?>"> <?= htmlspecialchars($post["name"]) ?></a>
        <?= htmlspecialchars($post["author"]) ?> /
        <?= htmlspecialchars($post["released"]) ?> /
        <?= htmlspecialchars($post["availability"]) ?>
      </div>
        <form method="POST" action="/delete">
        <button name="id" value="<?= $post["id"] ?>">Delete</button> </form>
    

    <?php } ?>
  </ul>
<?php require "views/components/footer.php" ?>