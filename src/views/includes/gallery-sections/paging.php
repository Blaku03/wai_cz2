<div class="photo-navigation">
  <?php if ($num_of_pages > 0) : ?>
    <?php if ($page > 0) : ?>
      <a href="/gallery?page=<?= ($page - 1) ?>">Previous</a>
    <?php endif ?>
    <?php for ($i = 0; $i <= $num_of_pages; $i++) : ?>
      <?php if ($i == $page) : ?>
        <a href="/gallery?page=<?= ($i + 0) ?>" class="button-nav-current"><?= $i ?></a>
      <?php else : ?>
        <a href="/gallery?page=<?= ($i + 0) ?>"><?= $i ?></a>
      <?php endif ?>
    <?php endfor ?>
    <?php if ($page < $num_of_pages) : ?>
      <a href="/gallery?page=<?= ($page + 1) ?>">Next</a>
    <?php endif ?>
  <?php endif ?>
</div>