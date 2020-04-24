<?php

define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'task_manager');
define("DB_USER", "root");
define("DB_PASSWORD", "");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$test = ["1" => "done", "2" =>"not done"];

if ($db->connect_error) {
    die("Connection failed" . $db->connect_error);
}
// 
$where = "";

if (isset($_GET["status"])) {
    $num = $_GET['status'];
    $where = "where status" .  "=" .  "$num";
}



$sql = "SELECT * FROM task $where";


$result = $db->query($sql);

$tasks = $result->fetch_all(MYSQLI_ASSOC);





