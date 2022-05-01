<?php
include '../inc_head.php';
$con = mysqli_connect("13.125.248.43", "datahive", "Mobile1!", "shs");
$sql = "SELECT * FROM shs_admin";
$result = mysqli_query($con, $sql);

$num = mysqli_num_rows($result);
require_once("../inc_head.php");

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
$list = 10; //한 페이지에 보여줄 개수
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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHS</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#add').click(function() {
                location.href = "newEstimate.html";
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
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="header-btn-left hidden">
                    <button class="btn" type="button">
                        <i class="ico"></i>
                    </button>
                </div>
                <h1 class="navLogo">
                    <img src="images/logo/logo-header.svg" alt="logo">
                </h1>
                <div class="header-btn-right">
                    <button id="add" name="add" class="btn" type="button">
                        <i class="ico i-plus"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <!-- header fin -->

    <section class="mainList">
        <div class="container">
            <div class="listWrap">
                <ul class="list-group list-group-flush">
                    <?php
                    $result = mysqli_query($con, $sql2);
                    while ($row = mysqli_fetch_array($result)) {
                        $row = array(
                            'idx' => ($row['idx']),
                            'test' => ($row['test']),
                            'name' => ($row['name']),
                            'date' => ($row['date'])
                        );
                        $dateVal = substr($row['date'], 0, 10);

                    ?>
                        <li class="list-group-item">
                            <table class="table table-borderless">

                                <tbody>
                                    <tr style="cursor:pointer;" onClick=" location.href='read.php?id=<?= $row['idx'] ?>'">
                                        <td class="list-add"><?= $row['name'] ?></td>
                                        <td class="list-add"><?= $row['test'] ?></td>
                                        <td class="list-date"><?= $dateVal ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </li>
                    <?php
                    }
                    ?>                    
                </ul>
            </div>
            <div class="paginationWrap">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php
                        if ($page <= 1) { //만약 page가 1보다 크거나 같다면 빈값

                        } else {
                            $pre = $page - 1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                            echo "<li class='page-item'><a class='page-link' href='?page=$pre' aria-label='Previous'><i class='ico ico-pagination-left'></i></a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                        }
                        for ($i = $block_start; $i <= $block_end; $i++) {
                            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면 
                                echo "<li class='page-item'><a class='page-link active'>$i</a></li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>"; //아니라면 $i
                            }
                        }

                        if ($block_num >= $total_block) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                            
                        } else {
                            $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<li class='page-item'><a class='page-link' href='?page=$next' aria-label='Next'><i class='ico ico-pagination-right'></i></a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                        }

                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- mainList fin -->
</body>

</html>