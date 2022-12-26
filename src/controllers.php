<?php

require_once 'model.php';
require_once 'functions.php';

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

function gallery()
{
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
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login']) && isset($_POST['login'])) {
    if (findUser($_POST['login'])) {
      if ($_POST['password'] == $_POST['repeat-password']) {
        create_user($_POST['login'], $_POST['password'], $_POST['email']);
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

    //error handling
    if (!is_image_valid($file, $file['type'])) {
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
  }

  return 'redirect:' . $_SERVER['HTTP_REFERER'];
}
