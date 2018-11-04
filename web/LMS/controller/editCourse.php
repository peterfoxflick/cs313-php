<?php
include '../partials/db.php';


if(isset($_POST['id'])) {

  $savedData = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
  $data = json_decode($savedData, true);

  for ($i = 0; $i < count($data); $i++) {
    edit_course($data[$i], $i);
  }

}



  function edit_course($id, $order) {
    $db = dbConnect();
    $sql = "UPDATE content SET course_order = :order WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":order", $order, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();

    $stmt->closeCursor();
  }

  echo "<script type='text/javascript'>location.href = '../index.php';</script>";

 ?>
