<?php
include 'includes/header.php';
include 'includes/menu.php';
?>
<section class="section-gallery">
  <h3 style="text-align: center;">Zaznaczone zdjęcia</h3>
  <?php if (count($thumbnails_data)) : ?>
    <form action="uncheck/photos" method="post" class="user-photos">
      <div class="chess-photo-gallery">
        <?php for ($i = 0; $i < count($thumbnails_data); $i++) : ?>
          <div class="photo-container">
            <img src="<?= $thumbnails_data[$i]['file_name'] ?>" />
            <p>Autor: <?= $thumbnails_data[$i]['photo_author'] ?></p>
            <p>Tytuł: <?= $thumbnails_data[$i]['photo_title'] ?></p>
            <input type="checkbox" name="photoids[]" value="<?= $thumbnails_data[$i]['_id'] ?>">
          </div>
        <?php endfor ?>
      </div>
      <input class="form-button" style="font-size:1.6em; padding: 0.4em;" type="submit" value="Usuń zaznaczone z zapamiętanych">
    </form>
  <?php else : ?>
    <p class="paragraph-text" style="display: block;">Brak zdjęć</p>
  <?php endif ?>
</section>
<?php

include 'includes/footer.php';
