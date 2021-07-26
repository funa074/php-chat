<?php
require_once "./init.php";

if (!isset($_SESSION['user']) || empty($_POST["message"]["message"])) {
  header('location: index.php');
} else {
$msg = $_POST["message"];
$new_chat = (object)$msg;

require_once("./chat_data.php");
array_push($messages, $new_chat);
$messages = json_encode($messages);
file_put_contents($path, $messages);

header('location: index.php');
exit();
}