<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<?php
session_start();
// 세션을 사용하기 위해 초기화

/* email, password가 post로 안넘어오면 exit*/
if (!isset($_POST['login_id']) || !isset($_POST['login_pw'])) exit;

$id = $_POST['login_id'];
$pw = $_POST['login_pw'];

/* email, password가 공백이면 exit*/
if (($id == '') || ($pw == '')) {
    echo "<script>alert('아이디 또는 패스워드를 입력하여 주세요.');history.back();</script>";
    exit;
}

/* db연결 */
include('dbcon.php');

/* db 조회, post로 받은 id, pw 일치하면 로그인 성공*/
$query = "select admin_id, admin_password from shs_admin where admin_id = '$id' and admin_password = '$pw' ";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);

$recordcount = mysqli_num_rows($result);

/* id, pw 일치하면 board.php호출 */
if ($recordcount == 1) {
    $_SESSION['id'] = $id;
    // 세션에 nickname을 저장
    // 이 세션은 웹브라우저가 종료될때까지 가지고 있는 값이다. 
    // board.php등 다른 php파일에서 사용할거다.
    // session_destroy (); 함수를 사용해도 세션이 없어진다. 보통 logout시 사용하는듯.
    //      echo "<script>alert('성공');</script>";

    echo "<script>location.href='estimate.php';</script>";
} else /* id, pw 실패하면 이전화면 */
    echo "<script>alert('로그인 실패'); history.back(); </script>";

mysqli_free_result($result);
mysqli_close($con);

?>

</html>

