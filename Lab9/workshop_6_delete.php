<?php include "connect.php" ?>
<?php
// เตรียมคำาสั่ง SQL สำหรับลบข้อมูล

$stmt = $pdo->prepare("DELETE FROM member WHERE username=?");
$stmt->bindParam(1, $_GET["username"]); // กำหนดค่าลงในตำแหน่ง ?
if ($stmt->execute()) // เริ่มลบข้อมูล
header("location: workshop_5.php"); // กลับไปแสดงผลหน้าข้อมูล

?>