<?php

$course_id = $_GET['id'];


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

  function get_all_content($id) {
    $db = dbConnect();
    $sql = "SELECT * FROM content WHERE course_id={$id} ORDER BY course_order ASC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data;
  }

  function get_course_data($id) {
    $db = dbConnect();
    $sql = "SELECT name FROM course WHERE id={$id}";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data[0]["name"];
  }

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
          <?php echo "<a href='./content.php?id={$content['id']}' class='list-group-item list-group-item-action'>{$content['name']}</a>" ?>
         <?php endforeach; ?>
      </ul>
     </div>
   </div>
 </div>

<?php include './partials/footer.php';?>
