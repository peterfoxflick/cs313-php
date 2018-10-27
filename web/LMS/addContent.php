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
         <div class="form-group">
            <label for="nameIn">Title of Page</label>
            <input type="text" class="form-control" id="nameIn" placeholder="Enter title">
          </div>


          <div class="form-group">
            <label for="dataIn">Page Contents</label>
            <textarea class="form-control" id="dataIn" rows="3"></textarea>
          </div>


          <div class="form-group">
            <label for="courseIn">Course</label>
            <select id="CourseIn" class="form-control">
              <option selected>Choose...</option>
              <?php foreach($courses as $course): ?>
                 <option value="<?= $course['id'] ?>"><?= $course['name']; ?></option>
               <?php endforeach; ?>
             </select>
          </div>

          <div class="form-group">
             <label for="orderIn">Position</label>
             <input type="number" class="form-control" id="orderIn" placeholder="Enter postion in course">
           </div> 


         <input type="submit"  class="btn btn-primary" id="submit" name="submit" value="Submit">

       </form>
      </div>
    </div>
  </div>



 <?php include './partials/footer.php';?>
