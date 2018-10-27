<?php


if(isset($_POST['nameIn']) && isset($_POST['dataIn']) && isset($_POST['courseIn']) && isset($_POST['orderIn'])) {
  $name = filter_var($_POST['nameIn'], FILTER_SANITIZE_STRING);
  $data = filter_var($_POST['dataIn'], FILTER_SANITIZE_STRING);
  $courseId = filter_var($_POST['courseIn'], FILTER_SANITIZE_NUMBER_INT);
  $orderId = filter_var($_POST['orderIn'], FILTER_SANITIZE_NUMBER_INT);


  add_content($name, $data, $courseId, $orderId);



  function add_content($name, $data, $courseId, $orderId) {
    $db = dbConnect();
    $sql = "INSERT INTO content ( name , data , course_id , course_order ) VALUES (:name, :data, :courseId, :order)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
    $stmt->bindValue(":data", $data, PDO::PARAM_STR);
    $stmt->bindValue(":courseId", $courseId, PDO::PARAM_INT);
    $stmt->bindValue(":order", $orderId, PDO::PARAM_INT);
    $stmt->execute();

    $stmt->closeCursor();
  }

 ?>

 <script type="text/javascript">location.href = '../index.php';</script>
