<?php

$scriptureID = $_POST["id"];

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

function get_scripture($scriptureID) {
  $db = dbConnect();
  $sql = "SELECT 1 FROM scriptures WHERE id={$scriptureID}";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_NAMED);
  $stmt->closeCursor();
  return $data;
}

$scripture = get_scripture($scriptureID);
var_dump($scripture);
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Scripture Details</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <h1 class="display-3"><?= $scripture['book']; ?> <?= $scripture['chapter']; ?> : <?= $scripture['verse']; ?></h1>
          <p>
            <?= $scripture['content']; ?>
          </p>
      </div>
    </div>
  </div>
</body>
</html>
