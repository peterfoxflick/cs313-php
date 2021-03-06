<?php

$term = $_GET['term'];


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

  function search_all_courses($term) {
    $db = dbConnect();
    $sql = "SELECT * FROM course WHERE name LIKE '%{$term}%'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data;
  }


  $courses = search_all_courses($term);

?>


<?php include './partials/header.php';?>

<?php include './partials/navbar.php';?>


<div class="container">
  <div class="col">


    <div class="row">
      <h1>Courses matching "<?php echo $term ?>"</h1>
    </div>

    <div class="row">
      <ul class="list-group">
        <?php foreach($courses as $course): ?>
          <?php echo "<a href='./course.php?id={$course['id']}' class='list-group-item list-group-item-action'>{$course['name']}</a>" ?>
         <?php endforeach; ?>
      </ul>
     </div>
   </div>
 </div>

 <script>
 function searchBtn() {
   var url = "./search.php?term=" + document.getElementById("searchTerm").value;
   location.href = url;
 }
 </script>

<?php include './partials/footer.php';?>
