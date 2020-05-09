<?php
include "confg.php";
include "functions.php";
sleep(2);

add_task($_POST["title"], $_POST["desc"], $_POST["category"], $_POST["status"]);

