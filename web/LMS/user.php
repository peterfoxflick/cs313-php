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
  function get_user_progress($id) {
    $db = dbConnect();
    $sql = "SELECT content_id FROM complete WHERE user_id={$id}";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data;
  }

  function get_content_title($id) {
    $db = dbConnect();
    $sql = "SELECT name FROM content WHERE id={$id}";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data[0]["name"];
  }

  $progress = get_user_progress();

?>



<?php include './partials/header.php';?>

<div class="container">
  <div class="col">
    <div class="row">
      <h1>You have completed</h1>
    </div>
    <div class="row">
      <ul class="list-group">
        <?php foreach($progress as $item): ?>
          <?php echo "<a href='./content.php?id={$item['content_id']}' class='list-group-item list-group-item-action'>" . get_content_title($item['content_id']) . "</a>" ?>
         <?php endforeach; ?>
      </ul>
     </div>
   </div>
 </div>

<?php include './partials/footer.php';?>
