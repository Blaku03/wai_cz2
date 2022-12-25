<?php

include 'includes/header.php';
include 'includes/menu.php';
?>
<main>
  <article class="main-container">
    <div class="image-container">
      <img src="static/img/Krishna-i-Radha-grajacy-w-czaturange.jpg" alt="gra w czartuge" />
    </div>
    <div class="main-text-container">
      <h1>Moje hobby Szachy</h1>
      <p class="paragraph-text big-first-letter">
        W historii szachów przyjmuje się, że powstały w północno-zachodnich
        Indiach w okresie Imperium Guptów (ok.
        <span class="counter">280</span>-<span class="counter">550</span>).
        Wówczas grano w czaturangę. Od XIII wieku natomiast rozpoczęła się w
        Europie reforma szachów, najsłabszą jednostkę w czaturandze -
        hetmana - awansowano na najsilniejszą (<a class="a-link-text" href="#table-value-chess-pieces">Wartości figur szachowych</a>), wprowadzono prawo promocji pionka po osiągnięciu przez niego
        ostatniej linii, wreszcie w XVI wieku wprowadzono roszadę, o którą
        walka toczyła się najdłużej, a w tej formie jaką znamy dzisiaj
        została zaakceptowana w całej Europie dopiero w XIX stuleciu.<a class="a-link-text" href="http://hetmanplock.pl/historia-szachow/" target="_blank">Bardziej szczegółowa historia szachów</a>
      </p>
    </div>
  </article>

  <section id="table-value-chess-pieces">
    <div class="chess-table-container">
      <h3>Wartości figur w szachach</h3>
      <table>
        <tr>
          <th>Król</th>
          <th>Hetman</th>
          <th>Wieża</th>
          <th>Skoczek</th>
          <th>Goniec</th>
          <th>Pionek</th>
        </tr>
        <tr>
          <td>Bezcenny</td>
          <td class="counter">9</td>
          <td class="counter">5</td>
          <td class="counter">3</td>
          <td class="counter">3</td>
          <td class="counter">1</td>
        </tr>
      </table>
    </div>
  </section>
</main>
<?php include 'includes/footer.php'; ?>