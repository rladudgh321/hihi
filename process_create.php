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
  'note' => mysqli_real_escape_string($conn, $_POST['note'])
);
$sql = "INSERT INTO aid
  (num, name, standard, current, equ_label, note)
  VALUES(
    {$filtered['num']}, '{$filtered['name']}', {$filtered['standard']},
    {$filtered['current']}, '{$filtered['equ_label']}', '{$filtered['note']}'
  )";
var_dump($sql);
$result = mysqli_query($conn, $sql);
if($result == false){
  echo '저장하는 과정에서 문제가 생겼습니다 김영호에게 문의주세요';
  mysqli_error($conn);
}else{
  header('Location:index.php');
}


 ?>
