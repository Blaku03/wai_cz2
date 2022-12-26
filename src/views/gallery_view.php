<?php
include 'includes/header.php';
include 'includes/menu.php';
$blad = isset($_SESSION['error']) ? $_SESSION['error'] : null;
?>
<section>
  <h2 class="secondary-title">Galeria zdjęć szachowych</h2>
  <div id="chess-photo-gallery">
    <a href="static/img/Leonardo-di-Bona-pokonuje-Lopeza-na-dworze-krola-Hiszpanii-Filipa-II.jpg">
      <img src="static/img/Leonardo-di-Bona-pokonuje-Lopeza-na-dworze-krola-Hiszpanii-Filipa-II.jpg" width="200" height="200" alt="leonardoo di bona pokonuje lopeza na dworze krola hiszpanii filipa 2" />
    </a>
    <a href="static/img/Partia-szachow-768x1028.jpg">
      <img src="static/img/Partia-szachow-768x1028.jpg" width="200" height="200" alt="partia szachow w dawnych indiach" />
    </a>
    <a href="static/img/Ulozenie-figur-na-szachownicy-fot.-CC-BY-SA-4.0.png">
      <img src="static/img/Ulozenie-figur-na-szachownicy-fot.-CC-BY-SA-4.0.png" width="200" height="200" alt="podstawowe ulozenie figur na szachownicy" />
    </a>
    <a href="static/img/zdjecie_partia_szachowa.jpg">
      <img src="static/img/zdjecie_partia_szachowa.jpg" width="200" height="200" alt="stare zdjecie parti szachowej" />
    </a>
    <a href="static/img/bobby-fischer-world-championship.jpg">
      <img src="static/img/bobby-fischer-world-championship.jpg" width="200" height="200" alt="partia bobby fischer przeciwko boris spasky" />
    </a>
  </div>
</section>
<section>
  <h3 style="text-align: center;">Twoje zdjecia</h3>
</section>
<section>
  <h3 style="text-align: center;">Zdjecia uzytkownikow</h3>
</section>
<div class="form-container">
  <form action="upload/photo" method="post" enctype="multipart/form-data">
    <label for="file">Wskaz zdjecie</label>
    <input type="file" name="file" accept="image/jpeg, image/png" required>
    <br>
    <label for="watermark">Znak wodny:</label>
    <input type="text" name="watermark" id="watermark" required>
    <br>
    <input type="submit" class="form-button" value="Prześlij">
  </form>
  <?= "<p style='color:red; text-align:center' class='paragraph-text'>" . $blad . "</p >" ?>
</div>

<?php include 'includes/footer.php'; ?>