<body>
  <header>
    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#d1d5db" viewbox="0 0 256 256">
      <rect width="256" height="256" fill="none"></rect>
      <path d="M176,120a48,48,0,0,1-48,48" fill="none" stroke="#d1d5db" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
      <path d="M64,199.6A95.6,95.6,0,0,0,129.9,224c51.5-1,93.4-43.1,94.1-94.6A96,96,0,0,0,128,32h-8V64L16,128l13.8,19.1a23.9,23.9,0,0,0,23.5,9.6c17.5-2.9,48.1-4.7,74.7,11.3h0L92.8,217.3" fill="none" stroke="#d1d5db" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
      <circle cx="124" cy="100" r="12"></circle>
    </svg>
    <?php if (isset($_SESSION['login'])) : ?>
      <p style="color:white" class="paragraph-text">Witaj <?= $_SESSION['login'] ?> !</p>
    <?php endif ?>
    <nav>
      <ul class="menu-container">
        <li>
          <a class="menu-text-content" href="history">Historia szachów
          </a>
        </li>
        <li>
          <a href="gallery" class="menu-text-content">
            Galeria zdjęć
          </a>
        </li>
        <li>
          <a class="menu-text-content" href="players">Najlepsi szachiści
          </a>
        </li>
        <li>
          <a class="menu-text-content" href="form">Formularz szachowy
          </a>
        </li>
        <?php if (!isset($_SESSION['user_id'])) : ?>
          <li>
            <a href="login" class="menu-text-content"> Logowanie </a>
          </li>
          <li>
            <a href="register" class="menu-text-content"> Rejestracja </a>
          </li>
        <?php else : ?>
          <li>
            <a href="logout" class="menu-text-content">Wyloguj sie</a>
          </li>
        <?php endif ?>
      </ul>
    </nav>
  </header>