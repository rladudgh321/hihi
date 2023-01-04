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

//장비이름 및 설명
$article = array(
  'num' => '',
  'name' => '',
  'standard' => '',
  'current' => '',
  'equ_label' => '',
  'note' => ''
);
$update_form = '';



if(isset($_GET['id'])){
$filtered_GET = mysqli_real_escape_string($conn, $_GET['id']);
settype($filtered_GET, 'integer');
$sql = "SELECT * FROM aid WHERE id ={$filtered_GET}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$article = array(
  'id' => htmlspecialchars($row['id']),
  'num' => htmlspecialchars($row['num']),
  'name' => htmlspecialchars($row['name']),
  'standard' => htmlspecialchars($row['standard']),
  'current' => htmlspecialchars($row['current']),
  'equ_label' => htmlspecialchars($row['equ_label']),
  'note' => htmlspecialchars($row['note'])
);
  $update_form = '
  <form action="process_update.php" method="post">
    <input type="hidden" name="id" value="'.$article['id'].'">
    <p><input type="number" name="num" placeholder="순번" value="'.$article['num'].'"></p>
    <p><input type="text" name="name" placeholder="장비이름" value="'.$article['name'].'"></p>
    <p><input type="number" name="standard" placeholder="장비기준갯수" value="'.$article['standard'].'"></p>
    <p><input type="number" name="current" placeholder="장비보유갯수" value="'.$article['current'].'"></p>
    <input type="checkbox" name="equ_label" placeholder="라벨지 유무" value="o">
    <label for="label">라벨지 유무</label>
    <p><textarea name="note" placeholder="비고">'.$article['note'].'</textarea></p>
    <p><input type="submit" value="장비목록수정"></p>
  </form>
  ';
}

?>
<style>
@media print {
  #top{
    display: none;
  }
}



</style>




<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>펌뷸장비</title>
  </head>
  <body>
  <div id="top">
    <h1><a href="index.php">펌뷸</a></h1>
    <?=$list?>
    <h2><?=htmlspecialchars($article['name'])?></h2>

    <?=$update_form?>


    <a href="create.php">create</a>
  </div>
  <div class="table">
    <table border="1">
      <tr>
        <td>번호</td>
        <td>장비 이름</td>
        <td>장비 기준 갯수(세트)</td>
        <td>장비 보유 갯수(세트)</td>
        <td>라벨지 사용 유무</td>
        <td>비고</td>
      </tr>
      <?php
      $sql1 = "SELECT * FROM aid";
      $result1= mysqli_query($conn, $sql1);
      while($row1 = mysqli_fetch_array($result1)){
        $escaped = array(
          'num' => htmlspecialchars($row1['num']),
          'name' => htmlspecialchars($row1['name']),
          'standard' => htmlspecialchars($row1['standard']),
          'current' => htmlspecialchars($row1['current']),
          'equ_label' => htmlspecialchars($row1['equ_label']),
          'note' => htmlspecialchars($row1['note'])
        );
      ?>
      <tr>
        <td><?=$escaped['num']?></td>
        <td><?=$escaped['name']?></td>
        <td><?=$escaped['standard']?></td>
        <td><?=$escaped['current']?></td>
        <td><?=$escaped['equ_label']?></td>
        <td><?=$escaped['note']?></td>
      </tr>
      <?php
      }
       ?>
    </table>
  </div>
  </body>
</html>
