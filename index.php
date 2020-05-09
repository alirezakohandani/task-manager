<?php 

include "confg.php";
include "functions.php";
include "process.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Task manager UI</title>
  <link rel="stylesheet" href="asset/style.css?v=4">
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
          <div class="button active" id="addTaskBtn">Add New Task</div>
          <div class="button" style="background-color: green"><a href="?status=1">done</a></div>
          <div class="button" style="background-color: red"><a href="?status=2">Not Done</a></div>
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
                <a href="http://localhost/task-manager-ui/?del=<?= $task->id ?>">
                  <i class="fa fa-trash-o" style="color: red"></i>
                </a>
                <?php if ($task->status == 1): ?>
                  <div class="button green"><?= $test["$task->status"] ?></div><span><?= $task->created_at ?></span>
                <?php  endif; ?>
                <?php 
                if ($task->status == 2):?>
                  <div class="button" style="background-color: red"><?= $test["$task->status"] ?></div><span><?= $task->created_at ?></span>
                <?php endif; ?>
                
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
<div class="modal-wrapper">
    <div class="modal-inner">
      <span class="close">*</span>
        <form action="ajaxProcess.php" id="addForm">
                  <input type="text" name="title" placeholder="title">
                  <input type="text" name="desc" placeholder="description">
                  <select name="category">
                    <option value="category">category</option>
                    <option value="programming">programming</option>
                    <option value="payannameh">payannameh</option>
                    <option value="English_language">English_language</option>
                    <option value="guitar">guitar</option>
                  </select>
                  <input type="number" name="status" placeholder="status">
                <button type="submit">add task</button>

              <div class="result"></div>
        </form>
    </div>
</div>
<script src='asset/jquery.min.js'></script>
                <script>
                  // $("CSS Selector").event(ACTION);
                  $(".modal-wrapper .close").click(function(){
                      $(".modal-wrapper").fadeOut();
                  });
                  $("#addTaskBtn").click(function(){
                    $(".modal-wrapper").fadeIn();
                  });

                  $("#addForm").submit(function(e) {
                      e.preventDefault();
                      var form = $(this);
                      var resultBox = form.find('.result');
                      resultBox.html('<img src="asset/6.gif" style="width:20px; height: 20px">');
                      $.ajax({
                        type: 'POST',
                        url: form.attr('action'),
                        data: form.serialize(),
                        timeout: 20000,
                        success: function(response) {
                          resultBox.html(response)
                        },
                        error: function(){
                          resultBox.html("Error");
                        }
                        
                      })
                  });
                </script>
<script  src="./script.js"></script>
</body>
</html>
