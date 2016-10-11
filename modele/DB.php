<?php
function getConnection() {
  $db = "avions";
  $host = "localhost";
  $user = "root";
  $password = "";
  return new PDO("mysql:dbname=$db;host=$host", $user, $password);
}
