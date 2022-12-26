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
  } elseif (!($filetype == 'image/jpg' || $filetype == 'image/png')) {
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
