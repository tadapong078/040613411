<?php include "connect.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script>
    function confirmDelete(username) { // ฟังก์ชนจะถูกเรียกถ้าผู้ใช ั คลิกที่ ้ link ลบ
        let ans = confirm("ต้องการลบสมาชิก " + username); // แสดงกล่องถามผู้ใช ้
        if (ans==true) // ถ้าผู้ใชกด ้ OK จะเข ้าเงื่อนไขนี้
            document.location = "workshop_6_delete.php?username=" + username; // สงรหัสส ่ นค ้าไปให ้ไฟล์ ิ delete.php
    }
</script>

</head>
<body>

    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo "username : " . $row ["username"] . "<br>";
            echo "password : " . $row ["password"] . "<br>";
            echo "ชื่อสมาชิก : " . $row ["name"] . "<br>";
            echo "ที่อยู่ : " . $row ["address"] . "<br>";
            echo "โทรศัพท์ : " . $row ["mobile"] . "<br>";
            echo "อีเมล์ : " . $row ["email"] . "<br>";
            echo "<a href='workshop_6_edit.php?username=" . $row ["username"] . "'>แกไข</a> | ";
            echo "<a href='#' onclick='confirmDelete(\"" . $row ["username"] . "\")'>ลบ</a>";
            echo "<hr>\n";
        }
    ?>
</body>
</html>
