<?php
    session_start(); #반드시 해당 PHP 파일에 가장처음, 코딩의시작
     
    $title = 'login';
    require("config.php");
    include('config.php');
    include('header.php');
    #include()의 경우 다른 파일.. 전혀 다른 페이지에 코딩 된 것을 불러다 사용할 수 있게 해준다
    /*include() 절대경로만을 지원한다
     Include와 Require 차이점(php 파일 로드)
    현재까지 사용한 바로는 기능상의 차이는 없었습니다
    그러나 존재하지 않는 파일 등등의 경우 에러 표시가 다르게 출력됩니다*/
    require_once('functions.php');

    if(is_user_authenticated()) {
        redirect('admin.php');
        die();
    }
    if(isset($_POST['login'])) { //isset으로 변수가 설정되었는지 확인할 수 있습니다.
        $email = filter_input(INPUT_POST , 'email',FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];

        if($email == false) {
            $status='EMAIL 형식에 맞게 입력해주세요.';
    /*filter_input () 함수 (예 양식 입력과 같은) 입력을 얻고, 스크립트의 외부로부터 여과(필터링)한다.
    성공하면, 필터링 된 데이터가 반환됩니다. 실패하면 FALSE를 반환합니다. 은 "가변"파라미터가 설정되지 않은 경우, 
    NULL 반환한다.필터는 반복노가다 filter는 이런 데이터 필터링을 좀 더 쉽게 하자는 의도*/
        }
        if(authenicate_user($email, $password)) {
            $_SESSION['email'] = $email;
            /*세션(Session)은 모든 정보가 사용자 측의 컴퓨터에 저장되는 쿠키와는 달리 
            웹 서버에 정보를 저장하고 사용자 측에는 접근할 수 있는 키 값을 저장한다.*/
            redirect('admin.php'); //관리자 email 이면 관리자페이지로 die()는 function에 있음
        } else {
            $status = '비번이 맞지 않습니다.';
        }
    }
?>

<form action=" method="post">
    <p>
        <label for="email">Email : </label>
        <input type="text" name="email" id="email">
    </p>
    <p>
        <label for="password">Password : </label>
        <input type="text" name="password" id="password">
    </p>
    <p>
        <input type="submit" name="login" value="login">
    </p>
</form>
<div class="error">
    <p>
    <?php
        if(isset($status))
    
    ?>
    </p>
</div>
<!-- TO DO : post 방식 값확인, 함수이용값 확인, 멀티폼값 확인 -->
<!-- 이메일 형식 유효성검사, 관리자인증,세션이용 로그아웃기능 -->