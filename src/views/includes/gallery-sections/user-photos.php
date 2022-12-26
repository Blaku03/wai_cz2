<section class="section-gallery">
  <h3 style="text-align: center;">Twoje zdjecia</h3>
  <form action="" method="post">
    <div class="chess-photo-gallery">
      <?php if (count($images_thumbnail)) : ?>
        <?php for ($i = 0; $i < count($images_thumbnail); $i++) : ?>
          <div class="photo-container">
            <a href="<?= $images_watermark[$i] ?>">
              <img src="<?= $images_thumbnail[$i] ?>" />
            </a>
            <p>Autor: ktos</p>
            <p>Tytuł : tak</p>
            <input type="checkbox" name="photoid">
          </div>
        <?php endfor ?>
    </div>
    <input class="form-button" style="font-size:1.6em; padding: 0.4em;" type="submit" value="Zapamiętaj wybrane">
  </form>
<?php else : ?>
  <p class=" paragraph-text">Brak zdjęć</p>
<?php endif ?>

<?php include 'paging.php'; ?>
</section>