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
    $_SESSION['error'] = 'błąd podczas przesyłania pliku';
    return false;
  }
  return true;
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

function get_images($pattern, $folder, $start, $images_per_page)
{
  $images = glob($folder . $pattern, GLOB_BRACE);
  return array_slice($images, $start, $images_per_page);
}

function get_thumnail_data(&$thumbnails_data, $page_thumbnails)
{
  for ($i = 0; $i < count($page_thumbnails); $i++) {
    $file_name =  str_replace('static/images/', '', $page_thumbnails[$i]);
    $thumbnails_data[$i] = find_photo($file_name);
    $thumbnails_data[$i]['file_name'] = $page_thumbnails[$i];
  }
}

function filter_images($images)
{
  $filtered = [];
  foreach ($images as $image) {
    $data_image = find_photo(str_replace('static/images/', '', $image));
    if ($_SESSION[(string)$data_image['_id']]['checked']) {
      array_push($filtered, ('static/images/' . $data_image['file_name']));
    }
  }
  return $filtered;
}

function update_check_photo($id, $check)
{
  $_SESSION[(string)$id]['checked'] = $check;
  if ($_SESSION[(string)$id]['checked'] == $check) {
    return true;
  }
  return false;
}
