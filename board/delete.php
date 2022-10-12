<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>abc 게시판</title>
</head>
<body>
    <!-- http://localhost/board/delete.php -->
    <h1>게시판</h1>
    <h2>검색 결과</h2>
    <ul>
    <?php
        $conn = mysql_connect("127.0.0.1","root", "123456", "abc_corp");
        if(!$conn) {
            echo 'db에 연결하지 못했습니다.'.mysql_connect_error();
        }else {
            echo'db에 접속했습니다.';
        }
        //msg_board   ntable 에서 글 조회
        $user_delnum=$_POST['delnum']; //user_delnum : 변수이름 delnum : 전달값
        $sqlDEL = "DELETE * from msg_board WHERE number = $user_delnum";
        #delnum ->user_delnum ->sqlDEL ->result ->list
        $result = mysql_query($conn , $sqlDEL) ;
        $list = '';
        //echo , print 값을 그대로 출력
        //print_r 배열,객체 모양을 그대로 출력
        //var_dump  상세하게
        //printf %포맷형태

        /* list
        var i=0;
        while (i < list.length) {반복할일}
        $row 배열  */
        while($row = mysql_fetch_array($result)) {
            $list = $list."<li>{$row['number']}: <a href=\"view.php?number=
            {$row['number']}\">{$row['name']}</a></li>";
            //DB 에는 number, name, massage 컬럼 있음
        }
        echo $list;
        mysql_close($conn);
    ?>
    </ul>
    <p>
    <?php
      echo $user_delnum .'번 째 데이터가 삭제되었습니다.';  #.은 문자열 붙이기(+)
    ?>
    </p>
    <hr/>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>
     
</body>
</html>