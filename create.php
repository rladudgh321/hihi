<?php
$conn = mysqli_connect("localhost", "root", "111111", "equipment");
//list
$sql = "SELECT * FROM aid";
$result = mysqli_query($conn, $sql);
$list = "<ol>";
while($row = mysqli_fetch_array($result)){
  $list .= '<li><a href="index.php?id='.htmlspecialchars($row['id']).'">'.htmlspecialchars($row['name']).'</a></li>';
}
$list .= "</ol>";
?>


<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>펌뷸장비</title>
  </head>
  <body>
    <h1><a href="index.php">펌뷸</a></h1>
    <?=$list?>
    <form action="process_create.php" method="post">
      <p><input type="number" name="num" placeholder="순번"></p>
      <p><input type="text" name="name" placeholder="장비이름"></p>
      <p><input type="number" name="standard" placeholder="장비기준갯수"></p>
      <p><input type="number" name="current" placeholder="장비보유갯수"></p>
      <input type="checkbox" name="equ_label" placeholder="라벨지 유무" value="o">
      <label for="label">라벨지 유무</label>
      <p><textarea name="note" placeholder="비고"></textarea></p>
      <p><input type="submit" value="장비목록생성"></p>
    </form>
  </body>
</html>
