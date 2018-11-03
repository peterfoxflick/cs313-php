
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


  function get_all_content($id) {
    $db = dbConnect();
    $sql = "SELECT * FROM content WHERE course_id={$id}";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data;
  }

  function get_course_data($id) {
    $db = dbConnect();
    $sql = "SELECT name FROM course WHERE id={$id} ORDER BY course_order ASC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data[0]["name"];
  }



 ?>
