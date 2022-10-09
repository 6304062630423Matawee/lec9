<html>
<head><meta charset ="utf-8"></head>
<script>
function confirmDelete(username)
{
    var ans = confirm("ต้องการลบสินค้ารหัส"+username);
    if(ans=true)
        document.location = "delete.php?username="+username;
}

</script>
<body>
<?php include "connect.php"?>
<?php
$stmt = $pdo->prepare("SELECT * FROM member");
$stmt->execute();
while ($row = $stmt->fetch()) {
    ?>
    ชื่อสมาชิก:<?=$row ["name"]?><br>
    ที่อยู่:<?=$row ["address"]?><br>
    email:<?=$row ["email"]?><br>
    <img src='member_photo/<?=$row["username"]?>.jpg'><br>
    <?php echo "<a href='#' onclick=confirmDelete('".$row["username"]."')>ลบ</a>"?>
    <hr><br>
    <?php } ?>

</body>
</html>