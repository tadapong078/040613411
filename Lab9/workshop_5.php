<?php include "connect.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="display:flex">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
    ?>
    <?php while ($row = $stmt->fetch()) : ?>
        <div style="padding: 15px; text-align: center">
            <a href="workshop_5_detail.php?username=<?=$row["username"]?>">
                <img src='img/<?=$row["username"]?>.jpg' width='100'>
            </a><br>
            ชื่อสมาชิก : <?=$row ["name"]?><br>
            ที่อยู่ : <?=$row ["address"]?><br>
            อีเมล์ : <?=$row ["email"]?><br>
        </div>
    <?php endwhile; ?>
    </div>
</body>
</html>