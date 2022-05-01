        <p style='text-align:right'>
            <?php
            if (isset($_SESSION) === false) {
                session_start();
            }

            if (isset($_SESSION['member_id']) === false) {
            ?>
                <a href="/regist.php">회원가입</a>
                <a href="/login.php">로그인</a>
            <?php
            } else {
            ?>
                <a href="/logout.php">로그아웃</a>
            <?php
            }
            ?>
        </p>