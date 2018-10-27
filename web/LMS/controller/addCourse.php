<?php include '../partials/db.php';?>

<?php


if(isset($_POST['nameIn'])) {
  $name = filter_var($_POST['nameIn'], FILTER_SANITIZE_STRING);

  add_course($name);
}



  function add_course($name) {
    $db = dbConnect();
    $sql = "INSERT INTO course ( name ) VALUES (:name)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
    $stmt->execute();

    $stmt->closeCursor();
  }

  echo "<script type='text/javascript'>location.href = '../index.php';</script>";

 ?>
