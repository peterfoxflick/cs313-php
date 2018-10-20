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
  function get_all_content() {
    $db = dbConnect();
    $sql = "SELECT * FROM content WHERE course_id={$id}";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data;
  }

  $contents = get_all_content();

?>


<?php include './partials/header.php';?>

<div class="container">
  <div class="col">
    <div class="row">
      <ul class="list-group">
        <?php foreach($contents as $content): ?>
           <li class="list-group-item"><?= $content['name']; ?></li>
         <?php endforeach; ?>
      </ul>
     </div>
   </div>
 </div>

<?php include './partials/footer.php';?>
