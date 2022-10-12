<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 쓰기</title>
</head>
<body>
    <!-- localhost/board/write.php -->
    <h1>글 쓰기</h1>
    <hr>
    <form action="insert.php" method="post">
        <p>
            <label for="name">이름 : </label>  <!--for=id  -->
            <input type="text" id="name" name="name"> <!--name>>insert.php -->       
        </p>
        <p>
            <label for="message"> 메세지 : </label>  <!--for=id  -->
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <!--message>>insert.php -->       
        </p>
        <input type="submit" value="쓰기">
    </form>
    
</body>
</html>