<?php







 ?>



 <?php include './partials/header.php';?>

 <?php include './partials/navbar.php';?>





 <div class="container">
   <div class="col">


     <div class="row">
       <h1>Build A Page</h1>
     </div>

     <div class="row">

       <form action="controller/addContent.php" method="POST">
         <input type="text" id="book" name="book">
         <input type="text" id="chapter" name="chapter">
         <input type="text" id="verse" name="verse">
         <input type="textarea" id="content" name="content">
         <input type="submit" id="submit" name="submit" value="Submit">



           <?php foreach($topics as $topic): ?>
             <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" name="topics[]" value="<?= $topic['id'] ?>" id="<?= checkbox-$topic['id'] ?>">
               <label class="custom-control-label" for="<?= checkbox-$topic['id'] ?>"><?= $topic['name']; ?></label>
             </div>
           <?php endforeach; ?>


       </form>
      </div>
    </div>
  </div>



 <?php include './partials/footer.php';?>
