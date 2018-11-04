<?php

$content_id = $_GET['id'];


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
      <h1><?= $name ?> <a href=<?php echo "./editContent.php?id={$content_id}" ?><i class='far fa-edit'></i></a></h1>
    </div>
    <div class="row">
      <ul class="list-group">
        <?= $text ?>
      </ul>
     </div>
   </div>
 </div>

<?php include './partials/footer.php';?>
