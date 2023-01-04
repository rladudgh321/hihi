<?php
// mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect("localhost", "root", "111111", "equipment");
//list server
// var_dump($_POST);
$filtered = array(
  'num' => mysqli_real_escape_string($conn, $_POST['num']),
  'name' => mysqli_real_escape_string($conn, $_POST['name']),
  'standard' => mysqli_real_escape_string($conn, $_POST['standard']),
  'current' => mysqli_real_escape_string($conn, $_POST['current']),
  'equ_label' => mysqli_real_escape_string($conn, $_POST['equ_label']),
  'note' => mysqli_real_escape_string($conn, $_POST['note']),
  'id' => mysqli_real_escape_string($conn, $_POST['id'])
);
$sql = "UPDATE aid SET
  num = {$filtered['num']},
  name = '{$filtered['name']}',
  standard = {$filtered['standard']},
  current = {$filtered['current']},
  equ_label = '{$filtered['equ_label']}',
  note = '{$filtered['note']}'
  WHERE id = {$filtered['id']}   ";
$result = mysqli_query($conn, $sql);
if($result == false){
  echo '저장하는 과정에서 문제가 생겼습니다 김영호에게 문의주세요';
  mysqli_error($conn);
}else{
  header('Location:index.php?id='.$filtered['id']);
}


 ?>
