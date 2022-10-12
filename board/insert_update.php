<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
</head>
<body>
<?php
$conn = mysql_connect("127.0.0.1","root", "123456", "abc_corp");
if(!$conn) {
    echo 'db에 연결하지 못했습니다.'.mysql_connect_error();
}else {
    echo'db에 접속했습니다.';
}

$number = $_POST['number']; //POST 방식으로 매개변수 number의값으로 넘어와서 $number에 담는다
$user_name = $_POST['name'];
$user_msg = $_POST['message']; 

$sql="UPDATE msg_board SET name = '$user_name', message = '$user_msg' WHERE number = '$number'";
//mysql_query($link, 'sql statement')
$result = mysql_query($conn , $sql) ;

if($result === false) {
    echo '수정하지 못했습니다';
    error_log(mysql_error($conn)); //에러 로그 기록
}else {
    echo '수정 성공';
}

mysql_close($conn);
print "<hr/><a href='index.html'>메인화면으로 이동하기</a>"
?> 
 
</body>
</html>
