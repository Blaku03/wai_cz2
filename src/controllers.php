<?php

require_once 'model.php';
require_once 'controller_functions.php';

function history()
{
  return 'history_view';
}

function form()
{
  return 'form_view';
}

function players()
{
  return 'players_view';
}

function gallery(&$model)
{
  //page photos settings
  $folder = 'static/images/';
  $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
  $images_per_page = 5;
  $start = $page * $images_per_page;

  //get thumbnails
  $pattern = 'thumbnail_*.{jpg,jpeg,png}';
  $page_thumbnails = get_images($pattern, $folder, $start, $images_per_page);

  //get watermarks
  $pattern = 'watermark_*.{jpg,jpeg,png}';
  $page_watermarks = get_images($pattern, $folder, $start, $images_per_page);

  //count pages
  $num_of_photos = count(get_images($pattern, $folder, 0, null));
  $num_of_pages = floor($num_of_photos / $images_per_page);

  //getting thumbnails data
  $thumbnails_data = [];
  get_thumnail_data($thumbnails_data, $page_thumbnails);

  $model['thumbnails_data'] = $thumbnails_data;
  $model['images_watermark'] = $page_watermarks;
  $model['num_of_pages'] = $num_of_pages;
  $model['page'] = $page;

  return 'gallery_view';
}

function login()
{
  return 'login_view';
}

function register()
{
  return 'register_view';
}

function logout()
{
  session_destroy();
  session_unset();
  return 'redirect:' . $_SERVER['HTTP_REFERER'];
}

function login_req()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login']) && isset($_POST['password']) && validate_user($_POST['login'], $_POST['password'])) {
    //sucessful login
    header("Location: /gallery");
    exit;
  }
  $_SESSION['error'] = 'problem z logowaniem';
  return 'redirect:' . $_SERVER['HTTP_REFERER'];
}

function register_req()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login']) && isset($_POST['password'])) {
    if (!findUser($_POST['login'])) {
      if ($_POST['password'] == $_POST['repeat-password']) {
        create_user($_POST['login'], $_POST['password'], $_POST['email'], 0);
        validate_user($_POST['login'], $_POST['password']);
        header("Location: /gallery");
        exit;
      } else {
        $_SESSION['error'] = 'wpisane hasła są różne';
        return 'redirect:' . $_SERVER['HTTP_REFERER'];
      }
    } else {
      $_SESSION['error'] = 'podany login jest zajęty';
      return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
  }
  $_SESSION['error'] = 'problem z rejestracja';
  return 'redirect:' . $_SERVER['HTTP_REFERER'];
}

function upload_photo()
{
  if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // error handling
    if (!is_image_valid($file['error'], $file['type'], $file['size'])) {
      return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }

    //move file to server
    if (!move_file_to_server($file['name'], $file['tmp_name'])) {
      return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }

    //make thumbnail of photo
    make_thumbnail($file['type'], $file['name']);

    //add watermark to photo
    add_watermark($file['name'], $file['type'], $_POST['watermark']);

    //add photo data to database
    if (!add_photo_data($_POST['author'], $_POST['photo-title'], ('thumbnail_' . $file['name']), false)) {
      $_SESSION['error'] = 'błąd przy dodawaniu zdjecia do bazy danych';
      return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
  }

  return 'redirect:' . $_SERVER['HTTP_REFERER'];
}

function remember_photos()
{
  if (isset($_POST['photoids'])) {
    foreach ($_POST['photoids'] as $photoid) {
      if (!update_check_photo($photoid, true)) {
        $_SESSION['error'] = 'błąd przy zmienianiu wartosci w bazie danych';
        return 'redirect:' . $_SERVER['HTTP_REFERER'];
      }
    }
  }
  header("Location: /gallery");
  exit;
}
