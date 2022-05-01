<?php
include '../inc_head.php';
$con = mysqli_connect("13.125.248.43", "datahive", "Mobile1!", "shs");
$sql = "SELECT * FROM shs_admin";
$result = mysqli_query($con, $sql);

$num = mysqli_num_rows($result);
require_once(".inc_head.php");

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = '';
}
$sql = "select * from shs_admin_estimate where test like '%$search%'";
$result = mysqli_query($con, $sql);
$row_num = mysqli_num_rows($result); //게시판 총 레코드 수
$list = 3; //한 페이지에 보여줄 개수
$block_ct = 3; //블록당 보여줄 페이지 개수

$block_num = ceil($page / $block_ct); // 현재 페이지 블록 구하기
$block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
$block_end = $block_start + $block_ct - 1; //블록 마지막 번호

$total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
if ($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
$total_block = ceil($total_page / $block_ct); //블럭 총 개수
$start_num = ($page - 1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

$sql2 = "select * from shs_admin_estimate where test like '%$search%' order by idx desc limit $start_num, $list";
$result = mysqli_query($con, $sql2);

?>
<!doctype html>

<head>
    <style>
        td {
            text-align: center;
        }

        th {
            text-align: center;
        }

        nav {
            width: 15%;
            background-color: #eee;
            border-right: 1px solid #ddd;

            position: fixed;
            height: 100%;
        }

        .menu li a {
            margin-top: 30%;
            width: 100%;
            height: 5%;
            text-align: center;
            line-height: 50px;
            display: block;
            padding: 15;
            font-size: 12px;
            color: #555;
        }

        .menu li a:hover {
            background-color: yellowgreen;
            color: white;
        }

        .menu {
            background-color: #FFDAB9;
            width: 100%;
            height: 5%;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        /* li a {
        float: center;
        display: block;
        color: #000000;
        padding: 8px;
        text-decoration: none;
        font-weight: bold;
    }

    li a:hover {
        background-color: #CD853F;
        color: white;
    } */

        .shs {
            margin-left: 15%;
            padding: 1px 16px;
            height: 100%;
        }

        .search {
            position: relative;
            width: 20%;
            float: right;
        }


        #logout {
            width: 10%;
            border: 1px solid #bbb;
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 14px;
        }

        #search {
            width: 100%;
            border: 1px solid #bbb;
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 14px;
        }

        img {
            position: absolute;
            width: 5%;
            top: 35%;
            right: 8%;
            margin: 0;
            cursor: pointer;
        }

        .page_num {
            width: 100%;
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .page_num li {
            list-style-type: none;
            float: left;
            margin-left: 1%;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script type="text/javascript">
        $(document).ready(function() {
            var searchValue = getParameterByName('search');
            $('#search').val(searchValue);
            $('#searchImg').click(function() {
                $('#form').submit();
            });
        });

        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }
    </script>
</head>

<body>

    <div>
        <form action="estimate.php" id="form" method="get">
            <nav class="nav nav-list">
                <ul class="menu">
                    <li><a href="/estimate.php">견적서 보기</a></li>
                </ul>
            </nav>
            <div class="shs">
                <div class="container-fluid">

                    <input type="hidden" id="page" name="page" value="1">
                    <div class="search">
                        <input type="text" id="search" name="search" placeholder="search" value="">
                        <img id="searchImg" name="searchImg" src="https://s3.ap-northeast-2.amazonaws.com/cdn.wecode.co.kr/icon/search.png">
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <form action="read.php" method="POST">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>번 호</th>
                                            <th>제목</th>
                                            <th>댓글수</th>
                                            <th>등록자</th>
                                            <th>조회수</th>
                                            <th>등록일시</th>
                                    </thead>

                                    <?php
                                    if ($row_num == 0) {

                                    ?>
                                        <td colspan="6">결과가 없습니다</td>

                                        <?php
                                    } else {
                                        $result = mysqli_query($con, $sql2);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $row = array(
                                                'idx' => ($row['idx']),
                                                'test' => ($row['test']),
                                            );
                                        ?>
                                            <tbody>
                                                <tr style="cursor:pointer;" onClick=" location.href='read.php?id=<?= $row['idx'] ?>'">
                                                    <th><?= $row['idx'] ?></th>
                                                    <th><?= $row['test'] ?></th>
                                                </tr>
                                            <?php
                                        }
                                            ?>
                                            </tbody>
                                            </tr>
                                </table>
                                <!---페이징 넘버 --->
                                <div class="paginationWrap">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                                    <?php
                                        if ($page <= 1) { //만약 page가 1보다 크거나 같다면 빈값

                                        } else {
                                            $pre = $page - 1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                                            echo"<li class='page-item'><a class='page-link' href='?page=$pre&search=$search' aria-label='Previous'><i class='ico ico-pagination-left'></i></a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                                        }
                                        for ($i = $block_start; $i <= $block_end; $i++) {
                                            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                                            if ($page == $i) { //만약 page가 $i와 같다면 
                                                echo "<li class='page-item'>$i</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                                            } else {
                                                echo "<li class='page-item'><a href='?page=$i&search=$search'>[$i]</a></li>"; //아니라면 $i
                                            }
                                        }
                                        if ($block_num >= $total_block) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                                        } else {
                                            $next = $page + 1; //next변수에 page + 1을 해준다.
                                            echo "<li class='page-item'><a class='page-link' href='?page=$next&search=$search' aria-label='Next'><i class='ico ico-pagination-right'></i></a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                                        }
                                    }
                                    ?>
                                    </ul>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>