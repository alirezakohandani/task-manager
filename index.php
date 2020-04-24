<?php 

include "confg.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Task manager UI</title>
  <link rel="stylesheet" href="asset/style.css?v=2">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">Alireza Kohandani </span><img src="http://alirezakohandani.ir/img/download.png" width="40" height="40"/></div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">Navigation</div>
        <ul>
          <li> <i class="fa fa-home"></i>Home</li>
          <li><i class="fa fa-signal"></i>Activity</li>
          <li class="active"> <i class="fa fa-tasks"></i>Manage Tasks</li>
          <li> <i class="fa fa-envelope"></i>Messages</li>
        </ul>
      </div>
    </div>
    <div class="view">
      <div class="viewHeader">
        <div class="title">Manage Tasks</div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button"><a href="?status=1">done</a></div>
          <div class="button"><a href="?status=2">Not Done</a></div>
          <div class="button inverz"><i class="fa fa-trash-o"></i></div>
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>
          <ul>
            <?php foreach($tasks as $task): $task = (object) $task;?>
            <li class="checked"><i class="fa fa-check-square-o"></i><span><?= $task->title;?></span>
          
        
           
              <div class="info">
                <div class="button green"><?= $test["$task->status"] ?></div><span><?= $task->created_at ?></span>
              </div>
            </li>
            <div style="border: 1px solid black">
            <p><?= $task->description ?></p>
            </div>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="list">
          <div class="title">Tomorrow</div>
          <ul>
            <li><i class="fa fa-square-o"></i><span>Find front end developer</span>
              <div class="info"></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
