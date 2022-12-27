<?php

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
function create_user($login, $pass, $email, $rule)
{
  $db = get_db();
  $hash = password_hash($pass, PASSWORD_DEFAULT);
  return $db->users->insertOne(['login' => $login, 'password' => $hash, 'email' => $email, 'rule' => $rule]);
}
function validate_user($login, $pass)
{
  try {
    $db = get_db();
    $user = $db->users->findOne(['login' => $login]);
    if ($user !== null && password_verify($pass, $user['password'])) {
      session_regenerate_id();
      $_SESSION['user_id'] = $user['_id'];
      $_SESSION['login'] = $login;
      $_SESSION['rule'] = $user['rule'];
      return true;
    } else {
      return false;
    }
  } catch (Exception $e) {
    return false;
  }
}

function findUser($login)
{
  $db = get_db();
  return $db->users->findOne(['login' => $login]);
}

function add_photo_data($photo_author, $photo_title, $file_name)
{
  $db = get_db();
  return $db->photos->insertOne(['file_name' => $file_name, 'photo_author' => $photo_author, 'photo_title' => $photo_title]);
}

function get_photos()
{
}

function find_photo($file_name)
{
  $db = get_db();
  return $db->photos->findOne(['file_name' => $file_name]);
}

function delete_photo($file_name)
{
  $db = get_db();
  return $db->photos->deleteOne(['file_name' => $file_name]);
}
