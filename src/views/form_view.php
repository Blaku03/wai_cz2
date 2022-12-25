<?php
include 'includes/header.php';
include 'includes/menu.php';
?>
<main>
  <div class="form-container">
    <form action="form-action.php" autocomplete="off" method="post">
      <label for="imie">Imie</label>
      <br />

      <input type="text" name="imie" id="imie" />
      <br />

      <label for="play-amount">Ile godzin tygodniowo grasz w szachy</label>
      <br />

      <input type="number" name="play-amount" id="play-amount" />
      <br />

      <label for="tournament-answer">Brałeś udział w turnieju szachowym?</label>

      <input type="checkbox" value="tournament-yes" id="tournament-answer" name="tournament-answer" />
      <br />

      <label>Preferowana strona do gry w szachy</label>
      <br />

      <label for="lichess">Lichess</label>
      <input name="chess-website" id="lichess" value="lichess" type="radio" />

      <label for="chesscom">Chess.com</label>
      <input name="chess-website" id="chesscom" value="chesscom" type="radio" />
      <br />

      <select name="trening-type" id="trening-typ">
        <option value="0">Wybierz ulubioną forme treningu</option>
        <option value="puzzles">Puzzle</option>
        <option value="books">Ksiąki</option>
        <option value="courses">Kursy online</option>
        <option value="long-games">Gry wolnym tempem</option>
      </select>
      <br />

      <p>
        <label for="contact-mail">Twój e-mail do kontaktu</label>
        <br />

        <input type="email" name="contact-mail" id="contact-mail" title="Tylko w celu ewentualnego konatku. Nie będziemy wysyłać tam żadnego spamu." />
        <br />
      </p>

      <textarea name="user-text" id="user-text" cols="30" rows="6" placeholder="Uwagi dotyczące strony:"></textarea>
      <br />

      <input type="submit" class="form-button" onclick="
            $(function () {
              $('#dialog').dialog();
            });" />
      <input type="reset" class="form-button" />
    </form>
    <div id="dialog" title="Form submitted">
      <p>Thanks for sharing your chess infromation with us!</p>
    </div>
  </div>
</main>



<?php include 'includes/footer.php'; ?>