<?php

if(isset($_POST['chapter']) && isset($_POST['verse']) && isset($_POST['book']) && isset($_POST['content'])) {
  $book = filter_var($_POST['book'], FILTER_SANATIZE_STRING);
  $chapter = filter_var($_POST['chapter'], FILTER_SANATIZE_STRING);
  $verse = filter_var($_POST['verse'], FILTER_SANATIZE_STRING);
  $content = filter_var($_POST['content'], FILTER_SANATIZE_STRING);
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

function get_all_topics_from_scripture($scripture_id) {
  $db = dbConnect();
  $sql = "SELECT * FROM topic_scripture WHERE scripture_id = {$scripture_id}";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_NAMED);
  $stmt->closeCursor();
  return $data;
}

function get_topic_name($topic_id) {
  $db = dbConnect();
  $sql = "SELECT name FROM topic WHERE id = {$topic_id}";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_NAMED);
  $stmt->closeCursor();
  return $data[0];
}

$scriptures = get_all_scriptures();
$topics = get_all_topics();

$scripture_topics = get_all_scripture_topics();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h1 class="display-3">Scripture Resources</h1>
            <?php foreach($scriptures as $scripture): ?>
                <p>
                    <strong><a href="<?= '/scripture?id=$scripture["id"]'; ?>"><?= $scripture['book']; ?> <?= $scripture['chapter']; ?> : <?= $scripture['verse']; ?></strong></a> - "
                    <?= $scripture['content']; ?>"
                    <?php
                      $scripture_topics = get_all_topics_from_scripture($scripture["id"]);
                      foreach($scripture_topics as $item) {
                        echo get_topic_name($item["topic_id"]);
                      }
                    ?>

                </p>
            <?php endforeach; ?>
        </div>
    </div>
</div>






<form action="addScripture.php" method="POST">
  <input type="text" id="book" name="book">
  <input type="text" id="chapter" name="chapter">
  <input type="text" id="verse" name="verse">
  <input type="textarea" id="content" name="content">
  <input type="submit" id="submit" name="submit" value="Submit">



    <?php foreach($topics as $topic): ?>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="topics[]" value="<?= $topic['id'] ?>" id="<?= checkbox-$topic['id'] ?>">
        <label class="custom-control-label" for="<?= checkbox-$topic['id'] ?>"><?= $topic['name']; ?></label>
      </div>
    <?php endforeach; ?>


</form>
</body>

</html>
