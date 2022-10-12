<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>abc 게시판</title>
</head>
<body>
    <!-- localhost/board or localhost/board/index.php -->
    <h1>게시판</h1>
    <h2>글 목록</h2>
    <ul>
    <?php
        $conn = mysql_connect("127.0.0.1","root", "123456", "abc_corp");
        if(!$conn) {
            echo 'db에 연결하지 못했습니다.'.mysql_connect_error();
        }else {
            echo'db에 접속했습니다.';
        }
        //msg_board   ntable 에서 글 조회
        $sql = "SELECT * from msg_board";
        $result = mysql_query($conn , $sql) ;
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
    ?>
    </ul>
    <hr/>
     <p><a href="write.php">글 쓰기</a></p><hr>
    <h2>글 검색</h2>
    <form action="search_result.php" method="post">
        <h3>검색할 메시지를 입력하세요.</h3>
        <p>
            <label for="search">키워드 : </label>
            <input type="text" id="search" name="skey"> 
        </p>
        <input type="submit" value="검색">
    </form>
    <hr/>
    <h2>글 삭제</h2>
    <form action="delete.php" method="post">
        <h3>삭제할 메시지를 입력하세요.</h3>
        <p>
            <label for="msgdel">삭제</label>
            <input type="text" id="msgdel" name="delnum">
        </p>
        <input type="submit" value="삭제">
    </form>
    <hr/>
     
</body>
</html>