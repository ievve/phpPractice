<?php
    function output($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
    function authenicate_user($email, $password) {
        if($email == USER_NAME && $password == PASSWORD) {
            return true;
        }
    }
    function redirect($url) {
        header("Location:$url");
        die();
    }
    #exit() 종료. 에러메시지 출력X
    #die() 종료. 메시지 출력

    function is_user_authenticated() {
        return isset($_SESSION['email']);
    }
    /*isset( $var );
    $var가 설정되었는지 확인하고, 설정되었으면 TRUE, 설정되지 않았으면 FALSE를 반환합니다.

    isset( $var1, $var2, ... );
    $var1, $var2, …이 설정되었는지 확인합니다. 
    모든 변수가 설정되었으면 TRUE, 그렇지 않다면 FALSE를 반환합니다.*/
    function ensure_user_is_authenticated() {
        if(!is_user_authenticated()) {
            redirect('login.php');
            die();
        }
    }
?>