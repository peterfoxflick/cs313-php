<?php
session_start();

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

function getDB() {
    $db = dbConnect();
    $sql = "SELECT * FROM \"user\""; //Will this work?
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $data;
  }

$users = getDB();
$username = $_POST["user_name"];
$password = $_POST["password"];

foreach($users as $user)
{
    if ($username == $user['user_name'])
    {
        $hash = $user['password'];

        if (password_verify($password, $hash))
        {
            $_SESSION['verified'] = true;
            header("Location: welcome.php");
        }
        else
        {
            echo "FAILED TO AUTHENTICATE";
        }
    }
    else
    {
        echo "NO USER FOUND";
    }
}


?>
