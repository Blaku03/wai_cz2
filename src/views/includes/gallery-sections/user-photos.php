<section class="section-gallery">
  <h3 style="text-align: center;">Twoje zdjecia</h3>
  <form action="remember/photos" method="post" class="user-photos">
    <div class="chess-photo-gallery">
      <?php if (count($images_watermark)) : ?>
        <?php for ($i = 0; $i < count($images_watermark); $i++) : ?>
          <div class="photo-container">
            <a href="<?= $images_watermark[$i] ?>">
              <img src="<?= $thumbnails_data[$i]['file_name'] ?>" />
            </a>
            <p>Autor: <?= $thumbnails_data[$i]['photo_author'] ?></p>
            <p>Tytuł: <?= $thumbnails_data[$i]['photo_title'] ?></p>
            <input type="checkbox" name="photoid">
          </div>
        <?php endfor ?>
    </div>
    <input class="form-button" style="font-size:1.6em; padding: 0.4em;" type="submit" value="Zapamiętaj wybrane">
  <?php else : ?>
    <p class="paragraph-text" style="display: block;">Brak zdjęć</p>
  <?php endif ?>
  </form>
  <?php include 'paging.php'; ?>
</section>