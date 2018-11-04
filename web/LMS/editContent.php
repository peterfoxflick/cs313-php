<?php include './partials/db.php';?>


<?php


$content_id = $_GET['id'];

  function get_data($id) {
    $db = dbConnect();
    $sql = "SELECT * FROM content WHERE id={$id}";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data[0];
  }

  $data = get_data($content_id);
  $text = $data["data"];
  $name = $data["name"];

 ?>



 <?php include './partials/header.php';?>

 <?php include './partials/navbar.php';?>





 <div class="container">
   <div class="col">


     <div class="row">
       <h1>Build A Page</h1>
     </div>

     <div class="row">

       <form action="controller/editContent.php" method="POST">
         <div class="form-group">
            <label for="nameIn">Title of Page</label>
            <input type="text" class="form-control" id="nameIn" name="nameIn" placeholder="Enter title" value="<?php echo $name; ?>">
          </div>

          <div class="form-group">
            <label for="dataIn">Page Contents</label>
            <textarea class="form-control" id="dataIn" name="dataIn" rows="3" value="<?php echo $text; ?>"></textarea>
          </div>

          <div class="form-group">
            <label for="courseIn">Course</label>
            <select id="courseIn" name="courseIn" class="form-control">
              <option selected value="<?= $data['course_id']; ?>">Current</option>
              <?php foreach($courses as $course): ?>
                 <option value="<?= $course['id'] ?>"><?= $course['name']; ?></option>
               <?php endforeach; ?>
             </select>
          </div>

          <div class="form-group">
             <label for="orderIn">Position</label>
             <input type="number" value="<?= $data['course_order']; ?>"> class="form-control" id="orderIn" name="orderIn" placeholder="Enter postion in course">
           </div>

         <input type="submit"  class="btn btn-primary" id="submit" name="submit" value="Submit">

       </form>
      </div>
    </div>
  </div>



 <?php include './partials/footer.php';?>
