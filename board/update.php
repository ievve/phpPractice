<?php
        $conn = mysql_connect("127.0.0.1","root", "123456", "abc_corp");
        if(!$conn) {
            echo 'db에 연결하지 못했습니다.'.mysql_connect_error();
        }else {
            echo'db에 접속했습니다.';
        } 
        $view_num = $_GET['number'];
        $sql = "SELECT * FROM msg_board WHERE number = $view_num";
        $result = mysql_query($conn, $sql);
        ?>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 수정</title>
</head>
<body>
    <!-- localhost/board/update.php -->
    <h1>수정 하기</h1>
    <hr>
    <?php
    if($row = mysql_fetch_array($result)) {
    
   ?>
    <form action="insert_update.php" method="post">  
        <input type="hidden" name="number" value='<?= $view_num ?>'>
        <p>
            <label for="name">이름 : </label>  <!--for=id  -->
            <input type="text" id="name" name="name" value="<?= $row['name']?>"> <!--name>>insert.php -->       
        </p>
        <p>
            <label for="message"> 메세지 : </label>  <!--for=id  -->
            <textarea name="message" id="message" cols="30" rows="10"><?= $row['message']?></textarea>
            <!--message>>insert.php -->       
        </p>
        <input type="submit" value="쓰기"> 
    </form>
    <?php }
        mysql_close($conn); ?>
</body>
</html>