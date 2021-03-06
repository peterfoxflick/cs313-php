<?php
  function dbConnect(){
    try {
      $url = getenv('DATABASE_URL');
      $opts = parse_url($url);
      $server = $opts["host"];
      $database = ltrim($opts["path"],'/');
      $user = $opts["user"];
      $password = $opts["pass"];
      $port = $opts["port"];
      $dsn = "pgsql:host={$server}; port={$port};dbname={$database}";
      $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      $link = new PDO($dsn, $user, $password, $options);
      return $link;
    }
    catch (PDOException $ex) {
      echo $ex;
      exit;
    }
  }
  function get_all_courses() {
    $db = dbConnect();
    $sql = "SELECT * FROM course";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data;
  }

  $courses = get_all_courses();

?>



<?php include './partials/header.php';?>

<?php include './partials/navbar.php';?>





<div class="container">
  <div class="col">


    <div class="row">
      <h1>Courses to pick from</h1>
    </div>

    <div class="row">
      <ul class="list-group">
        <?php foreach($courses as $course): ?>
          <?php echo "<a href='./course.php?id={$course['id']}' class='list-group-item list-group-item-action'>{$course['name']}</a><a href='./editCourse.php?id={$course['id']}' ><i class='far fa-edit'></i></a>" ?>
         <?php endforeach; ?>
      </ul>
     </div>
   </div>
 </div>



<?php include './partials/footer.php';?>
