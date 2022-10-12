<?php
    session_start();
    session_unset();
    session_destroy();

    require_once('function.php');
    redirect('login.php');
    /*session_destroy(); 전체 세션을 삭제합니다.
    session_unset();세션에서 변수 만 삭제합니다. 세션이 여전히 존재합니다. 데이터 만 잘립니다.
    둘 다 세션에 등록 된 모든 변수를 삭제하는 것 같습니다. */
    die();
?>