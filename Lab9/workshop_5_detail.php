<?php include "connect.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $stmt->bindParam(1, $_GET["username"]); // 2. น าค่า pid ที่สงมากับ ่ URL ก าหนดเป็นเงื่อนไข
        $stmt->execute(); // 3. เริ่มค ้นหา
        $row = $stmt->fetch(); // 4. ดึงผลลัพธ์ (เนื่องจากมีข ้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
        ?>
        <div style="display:flex">
        <div>
        <img src='img/<?=$row["username"]?>.jpg' width='100'>
        </div>
        <div style="padding: 15px">
            Username : <?=$row ["username"]?><br>
            ชื่อสมาชิก : <?=$row ["name"]?><br>
            ที่อยู่ : <?=$row ["address"]?><br>
            โทรศัพท์ : <?=$row ["mobile"]?><br>
            อีเมล์ : <?=$row ["email"]?><br>
        </div>
        </div>
</body>
</html>