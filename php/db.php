<?php
$db = array(
	"host" => "localhost",
	"user" => "root",
	"pass" => "",
	"name" => ""
);

$connect = mysqli_connect($db["host"], $db["user"], $db["pass"], $db["name"]);

if (!$connect) {
  die("connection to db failed");
  exit();
} else {
  // connection is successfull
}
