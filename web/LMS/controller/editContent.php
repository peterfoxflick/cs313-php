
<?php
include '../partials/db.php';

if(isset($_POST['id']) && isset($_POST['nameIn']) && isset($_POST['dataIn']) && isset($_POST['courseIn']) && isset($_POST['orderIn'])) {
  $name = filter_var($_POST['nameIn'], FILTER_SANITIZE_STRING);
  $data = filter_var($_POST['dataIn'], FILTER_SANITIZE_STRING);
  $courseId = filter_var($_POST['courseIn'], FILTER_SANITIZE_NUMBER_INT);
  $orderId = filter_var($_POST['orderIn'], FILTER_SANITIZE_NUMBER_INT);
  $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);


  edit_content($id, $name, $data, $courseId, $orderId);

  echo "<script type='text/javascript'>location.href = '../index.php';</script>";
} else {
  echo "<script type='text/javascript'>location.href = '../index.php';</script>";
}



  function edit_content($id, $name, $data, $courseId, $orderId) {
    $db = dbConnect();
    $sql = "UPDATE content SET name = :name, data = :data, course_id = :course_id, course_order = :course_order WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
    $stmt->bindValue(":data", $data, PDO::PARAM_STR);
    $stmt->bindValue(":course_id", $courseId, PDO::PARAM_INT);
    $stmt->bindValue(":course_order", $orderId, PDO::PARAM_INT);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $stmt->closeCursor();
  }

 ?>
