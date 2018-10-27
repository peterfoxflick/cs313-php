<?php include './partials/db.php';?>


<?php

$course_id = $_GET['id'];


$contents = get_all_content($course_id);
$name = get_course_data($course_id);


 ?>


 <?php include './partials/header.php';?>
 <?php include './partials/navbar.php';?>


 <div class="container">
   <div class="col">
     <div class="row">
       <h1><?php echo $name ?></h1>
     </div>
     <div class="row">
       <ul class="list-group">
         <?php foreach($contents as $content): ?>
           <?php echo "<a href='./content.php?id={$content['id']}' class='list-group-item list-group-item-action'>{$content['name']}</a> POS: {$content['course_order']}" ?>
          <?php endforeach; ?>
       </ul>
      </div>
    </div>
  </div>

 <?php include './partials/footer.php';?>
