<?php
require_once 'helper_functions.php';
function is_image_valid($fileerror, $filetype, $filesize)
{
  $max_file_size = 1000000;
  $file_size_bad = ($filesize > $max_file_size);
  $file_type_bad = !($filetype == 'image/jpeg' || $filetype == 'image/png');

  if ($file_size_bad && $file_type_bad) {
    $_SESSION['error'] = 'przesłany plik jest za duży oraz jest złego formatu';
    return false;
  }
  if ($file_size_bad) {
    $_SESSION['error'] = 'przesłany plik jest za duży';
    return false;
  }
  if ($file_type_bad) {
    $_SESSION['error'] = 'przesłany plik jest złego formatu';
    return false;
  }
  if ($fileerror != UPLOAD_ERR_OK) {
    //error with file
    $_SESSION['error'] = 'błąd podczas przesyłania pliku';
    return false;
  }
  return true;
  // if (($file['error'] === UPLOAD_ERR_FORM_SIZE) && !($filetype == 'image/jpeg' || $filetype == 'image/png')) {
  //   //almost everything wrong
  //   $_SESSION['error'] = 'przesłany plik jest za duży oraz jest złego formatu';
  //   return false;
  // } elseif ($file['error'] === UPLOAD_ERR_FORM_SIZE) {
  //   //file is too big
  //   $_SESSION['error'] = 'przesłany plik jest za duży';
  //   return false;
  // } elseif (!($filetype == 'image/jpeg' || $filetype == 'image/png')) {
  //   //wrong file type
  //   $_SESSION['error'] = 'przesłany plik jest złego formatu';
  //   return false;
  // } elseif ($file['error'] != UPLOAD_ERR_OK) {
  //   //error with file
  //   $_SESSION['error'] = 'błąd podczas przesyłania pliku';
  //   return false;
  // }
  // return true;
}

function move_file_to_server($filename, $tmp_name)
{
  $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/static/images/';
  $photodir = $uploaddir . $filename;

  if (!move_uploaded_file($tmp_name, $photodir)) {
    $_SESSION['error'] = 'blad podczas przenoszenia pliku na serwer';
    return false;
  }
  return true;
}

function make_thumbnail($filetype, $filename)
{
  $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/static/images/';
  $photodir = $uploaddir . $filename;

  $image = create_image($filetype, $photodir);

  $thumbnail_width = 200;
  $thumbnail_height = 125;
  $orginal_width = imagesx($image);
  $orginal_height = imagesy($image);
  $thumbnail = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
  imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $orginal_width, $orginal_height);

  $thumbnail_dir = $uploaddir . 'thumbnail_' . $filename;

  save_image($filetype, $thumbnail, $thumbnail_dir);
}

function add_watermark($filename, $filetype, $text)
{
  $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/static/images/';
  $photodir = $uploaddir . $filename;

  //watermark settings
  $font_size = 20;
  $font = 'static/font.ttf';
  $angle = 0;
  $pos_x = 50;
  $pos_y = 30;
  $color = 20;

  $image = create_image($filetype, $photodir);

  imagettftext($image, $font_size, $angle, $pos_x, $pos_y, $color, $font, $text);

  $image_dir = $uploaddir . 'watermark_' . $filename;

  save_image($filetype, $image, $image_dir);
}
