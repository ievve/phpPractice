<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
</head>
<body>
    <!-- localhost/board/insert.php -->
<?php
$conn = mysql_connect("127.0.0.1","root", "123456", "abc_corp");
if(!$conn) {
    echo 'db에 연결하지 못했습니다.'.mysql_connect_error();
}else {
    echo'db에 접속했습니다.';
}

$user_name = $_POST['name'];
$user_msg = $_POST['message']; 

$sql="INSERT INTO msg_board(name , message) values ('$user_name','$user_msg')";
//mysql_query($link, 'sql statement')
$result = mysql_query($conn , $sql) ;

if($result === false) {
    echo '저장하지 못했습니다';
    error_log(mysql_error($conn));
}else {
    echo '저장 성공';
}

mysql_close($conn);
print "<hr/><a href='index.html'>메인화면으로 이동하기</a>"
?> 
 
</body>
</html>
