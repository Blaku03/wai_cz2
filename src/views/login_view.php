<?php
include 'includes/header.php';
include 'includes/menu.php';
$blad = isset($_SESSION['error']) ? $_SESSION['error'] : null;
?>

<main>
  <div class="form-container">
    <form action="login/request" autocomplete="off" method="post">
      <label for="login">Login:</label>
      <input type="text" name="login" id="login" required>

      <br>
      <label for="password">Hasło:</label>
      <input type="password" name="password" id="password" required>

      <br>
      <input type="submit" class="form-button" value="Zaloguj sie">

    </form>
    <?= "<p style='color:red; text-align:center' class='paragraph-text'>" . $blad . "</p >" ?>
  </div>

</main>

<?php include 'includes/footer.php'; ?>