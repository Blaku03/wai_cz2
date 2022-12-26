<?php
function validImage($file, $filetype)
{
  if (($file['error'] === UPLOAD_ERR_INI_SIZE || $file['error'] === UPLOAD_ERR_FORM_SIZE) && !($filetype === 'image/jpeg' || $filetype === 'image/png')) {
    //almost everything wrong
    $_SESSION['error'] = 'przesłany plik jest za duży oraz jest złego formatu';
    return false;
  } elseif ($file['error'] === UPLOAD_ERR_INI_SIZE || $file['error'] === UPLOAD_ERR_FORM_SIZE) {
    //file is too big
    $_SESSION['error'] = 'przesłany plik jest za duży';
    return false;
  } elseif (!($filetype == 'image/jpeg' || $filetype == 'image/png')) {
    //wrong file type
    $_SESSION['error'] = 'przesłany plik jest złego formatu';
    return false;
  } elseif ($file['error'] != UPLOAD_ERR_OK) {
    //error with file
    $_SESSION['error'] = 'błąd podczas przesyłania pliku';
    return false;
  }
  return true;
}

function moveFileServer($filename, $tmp_name)
{
  $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/static/images/';
  $photodir = $uploaddir . $filename;

  if (!move_uploaded_file($tmp_name, $photodir)) {
    $_SESSION['error'] = 'blad podczas przenoszenia pliku na serwer';
    return false;
  }
  return true;
}

function makeThumbnail($filetype, $filename)
{
  $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/static/images/';
  $photodir = $uploaddir . $filename;

  switch ($filetype) {
    case 'image/jpeg':
      $image = imagecreatefromjpeg($photodir);
      break;
    case 'image/png':
      $image = imagecreatefrompng($photodir);
      break;
  }

  $thumbnail_width = 200;
  $thumbnail_height = 125;
  $orginal_width = imagesx($image);
  $orginal_height = imagesy($image);
  $thumbnail = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
  imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $orginal_width, $orginal_height);

  $thumbnaildir = $uploaddir . 'thumbnail_' . $filename;

  switch ($filetype) {
    case 'image/jpeg':
      imagejpeg($thumbnail, $thumbnaildir);
      break;
    case 'image/png':
      imagepng($thumbnail, $thumbnaildir);
      break;
  }
}
