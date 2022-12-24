<?php

require '../../vendor/autoload.php';

use MongoDB\BSON\ObjectID;

function get_db()
{
  $mongo = new MongoDB\Client(
    "mongodb://localhost:27017/wai",
    [
      'username' => 'wai_web',
      'password' => 'w@i_w3b',
    ]
  );

  $db = $mongo->wai;

  return $db;
}
