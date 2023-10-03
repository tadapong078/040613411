<?php include "connect.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="text" name="keyword">
        <input type="submit" value="ค้นหา">
    </form>
    <div style="display:flex">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
        if (!empty($_GET)) // ถ ้ามีค่าที่สงมาจากฟอร์ม ่
            $value = '%' . $_GET["keyword"] . '%'; // ดึงค่าที่สงมาก าหนดให ้กับตัวแปรเงื่อนไข ่
        $stmt->bindParam(1, $value); // ก าหนดชอตัวแปรเงื่อนไขที่จุดที่ก าหนด ื่ ? ไว้
        $stmt->execute(); // เริ่มค ้นหา
    ?>
    <?php while ($row = $stmt->fetch()) : ?>
    <div style="padding: 15px; text-align: center">
            ชื่อสมาชิก : <?=$row ["name"]?><br>
            ที่อยู่ : <?=$row ["address"]?><br>
            อีเมล์ : <?=$row ["email"]?><br>
            <img src='img/<?=$row ["username"]?>.jpg' width='100'>
    </div>
    <?php endwhile; ?>
</div>
</body>
</html>