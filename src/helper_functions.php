<?php

function create_image($filetype, $photodir)
{
  return $filetype === 'image/jpeg' ? imagecreatefromjpeg($photodir) : imagecreatefrompng($photodir);
}

function save_image($filetype, $image, $imagedir)
{
  switch ($filetype) {
    case 'image/jpeg':
      imagejpeg($image, $imagedir);
      break;
    case 'image/png':
      imagepng($image, $imagedir);
      break;
  }
}
