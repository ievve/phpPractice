<?php
    session_start();
    
    require_once("config.php"); //한번만 로드
    require_once('functions.php');//한번만 로드
    
    ensure_user_is_authenticated();
    
    echo $_SESSION["email"]; //관리자 email로 로그인시 admin@admin.com 출력
    include('header.php');
    ?>

    <a href = "logout.php">LOGOUT</a>
    <?php include('footer.php');?>