<?php
session_start();

// * Create a sign-up page that asks for a username and password, and then inserts this into the database.
//
// * Make sure that you do not insert the password directly into the database, use the password_hash() function to generate a hash of it, and insert that into the database.
//
// * After inserting the user, redirect to the sign-in page.
if(isset($_POST['username']) && isset($_POST['password'])) {
  $username = filter_var($_POST['username'], FILTER_SANATIZE_STRING);
  $password = filter_var($_POST['password'], FILTER_SANATIZE_STRING);

  //Check if valid password and username
  $valid = false;

  if(checkPassword($password) && is_unique_username($username)){
    //create account
    $hash = password_hash($password, PASSWORD_DEFAULT);
    add_user($username, $hash);
  }
}
  //Redirect
header('Location: signin.php');
die();

function checkPassword($password){
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
  return preg_match($pattern, $password);
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

function is_unique_username($username) {
  $db = dbConnect();
  $sql = "SELECT * FROM '"user"' WHERE user_name = :user_name";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(":user_name", $username, PDO::PARAM_STR);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_NAMED);
  $stmt->closeCursor();
  if(empty($data)) {
    return TRUE;
  } else {
    return FALSE;
  }
}

function add_user($username, $hash) {
  $db = dbConnect();
  $sql = "INSERT INTO '"user"' (user_name, password) VALUES (:username, :hash)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(":username", $username, PDO::PARAM_STR);
  $stmt->bindValue(":hash", $hash, PDO::PARAM_STR);
  $stmt->execute();
  $stmt->closeCursor();
}

 ?>
