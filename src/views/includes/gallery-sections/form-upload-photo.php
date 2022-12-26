<?php
$blad = isset($_SESSION['error']) ? $_SESSION['error'] : null;
?>

<div class="form-container">
  <form action="upload/photo" method="post" enctype="multipart/form-data">
    <label for="file">Wskaz zdjecie</label>
    <input type="file" name="file" accept="image/jpeg, image/png" required>
    <br>

    <label for="watermark">Znak wodny:</label>
    <input type="text" name="watermark" id="watermark" required>
    <br>

    <label for="author">Autor:</label>
    <input type="text" name="author" required>
    <br>

    <label for="photo-title">Tytuł:</label>
    <input type="text" name="photo-title" required>
    <br>

    <input type="submit" class="form-button" value="Prześlij">
  </form>
  <?= "<p style='color:red; text-align:center' class='paragraph-text'>" . $blad . "</p >" ?>
</div>