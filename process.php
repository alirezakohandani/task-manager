<?php

if (isset($_GET["del"])) {
    delete_task($_GET["del"]);
}

$tasks = get_tasks();