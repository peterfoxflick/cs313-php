<?php

if(isset($_POST['chapter']) && isset($_POST['verse']) && isset($_POST['book']) && isset($_POST['content'])) {
  $book = filter_var($_POST['book'], FILTER_SANATIZE_STRING);
  $chapter = filter_var($_POST['chapter'], FILTER_SANATIZE_STRING);
  $verse = filter_var($_POST['verse'], FILTER_SANATIZE_STRING);
  $contnet = filter_var($_POST['contnet'], FILTER_SANATIZE_STRING);
  $added = add_scripture($book, $chapter, $verse, $content);
  if($added == 1) {
    echo "<script>window.alert('did add to db')</script>";
  } else {
    echo "<script>window.alert('did not add to db')</script>";
  }
}

function dbConnect(){
    try {
        $url = getenv('DATABASE_URL');
        $opts = parse_url($url);
        $server = $opts["host"];
        $database = ltrim($opts["path"],'/');
        $user = $opts["user"];
        $password = $opts["pass"];
        $port = $opts["port"];
        $dsn = "pgsql:host=$server; port=$port;dbname=$database";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $link = new PDO($dsn, $user, $password, $options);
        return $link;
    }
    catch (PDOException $ex) {
        echo $ex;
        exit;
    }
}

function get_all_scriptures() {
    $db = dbConnect();
    $sql = "SELECT * FROM scriptures";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data;
}

function get_all_topics() {
    $db = dbConnect();
    $sql = "SELECT * FROM topic";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data;
}

$scriptures = get_all_scriptures();
$topics = get_all_topics();

function get_most_recent_scriptureId(){
  $db = dbConnect();
  $sql = "SELECT id FROM scripture ORDER BY DESC LIMIT 1";
}

function add_scripture($book, $chapter, $verse, $contnet) {
  $db = dbConnect();
  $sql = "INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content) RETURNING id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(":book", $book, PDO::PARAM_STR);
  $stmt->bindValue(":chapter", $book, PDO::PARAM_STR);
  $stmt->bindValue(":verse", $book, PDO::PARAM_STR);
  $stmt->bindValue(":content", $book, PDO::PARAM_STR);
  $returnItem = $stmt->execute();
  var_dump($stmt);
  exit;
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}




?>
