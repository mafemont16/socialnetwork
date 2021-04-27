<?php
include_once "PDO.php";

function GetOneUserFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user WHERE id = $id");
  return $response->fetch();
}

function GetAllUsers()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user ORDER BY nickname ASC");
  return $response->fetchAll();
}

function GetUserIdFromUserAndPassword($username, $password)
{
  global $PDO;
  $response = $PDO->query("SELECT id FROM user WHERE nickname ='$username' AND password='$password' ");
  $users = $response->fetchAll();
  $nbUsersWithThisPasswordAndNickname = count($users);
  if ($nbUsersWithThisPasswordAndNickname == 1) {
    $connectedUser = $users[0];
    return $connectedUser['id'];
  } else {
    return -1;
  }
}
