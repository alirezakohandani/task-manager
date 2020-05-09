<?php

function delete_task(int $task_id)
{
    global $db;
    $sql = "delete from task where id={$task_id}";

    $result = $db->query($sql);

    return $result;
    
}

function add_task($title, $desc, $category, $status){
global $db;
$sql = "INSERT INTO `task` (`title`, `description`, `category`, `status`) VALUES ('$title', '$desc', '$category', '$status');";
$db->query($sql);
return $db->affected_rows;
}


function get_tasks() {
    global $db;
    $where = "";

if (isset($_GET["status"])) {
    $num = $_GET['status'];
    $where = "where status" .  "=" .  "$num";
}

$sql = "SELECT * FROM task $where";
$result = $db->query($sql);
return $result->fetch_all(MYSQLI_ASSOC);
}