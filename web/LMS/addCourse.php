
 <?php include './partials/header.php';?>

 <?php include './partials/navbar.php';?>


 <div class="container">
   <div class="col">


     <div class="row">
       <h1>Make a course</h1>
     </div>

     <div class="row">

       <form action="controller/addCourse.php" method="POST">
         <div class="form-group">
            <label for="nameIn">Name of Course</label>
            <input type="text" class="form-control" id="nameIn" name="nameIn" placeholder="Enter title">
          </div>

         <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Submit">

       </form>
      </div>
    </div>
  </div>



 <?php include './partials/footer.php';?>
