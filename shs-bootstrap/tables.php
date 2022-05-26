<?php
$con = mysqli_connect("13.125.248.43", "datahive", "Mobile1!", "shs");
$sql = "SELECT * FROM shs_admin";
$result = mysqli_query($con, $sql);

$num = mysqli_num_rows($result);

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
$list = 20; //한 페이지에 보여줄 개수
$block_ct = 3; //블록당 보여줄 페이지 개수

$block_num = ceil($page / $block_ct); // 현재 페이지 블록 구하기
$block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
$block_end = $block_start + $block_ct - 1; //블록 마지막 번호

$total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
if ($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
$total_block = ceil($total_page / $block_ct); //블럭 총 개수
$start_num = ($page - 1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

$sql2 = "select @ROWNUM := @ROWNUM + 1 AS rn, E.* from shs_admin_estimate E, (SELECT @ROWNUM := 0 ) TMP where test like '%$search%' ORDER BY wr_datetime DESC limit $start_num, $list";
$result = mysqli_query($con, $sql2);

?>

<!DOCTYPE html>
<html lang="en">

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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="autdor" content="">

    <title>SHS</title>

    <!-- Custom fonts for tdis template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for tdis template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for tdis page -->
    <!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
    <script type="text/javascript">
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SHS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-otder.html">Otder</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Otder Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="padding: 100px;">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">

                        <!-- Earnings (Montdly) Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <span style="font-size: 20px;">준비</span>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Annual) Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                현장조사중(견적)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tasks Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">현장조사완료
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                현장시공중(작업)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                현장시공완료</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                최종완료</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <select class="form-control" style="width:auto;">
                                    <option selected>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">선택</div>
                                    </option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                            </div>
                            <div class="col mb-4">
                                <input type="text" class="form-control" value="">
                            </div>
                            <div class="col mb-4">
                                <button type="button" class="btn btn-success">검색</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>수급자명</th>
                                        <th>이름</th>
                                        <th>전화번호</th>
                                        <th>주소</th>
                                        <th>날짜</th>
                                        <th></th>
                                </thead>

                                <?php
                                if ($row_num == 0) {

                                ?>
                                    <td colspan="6">결과가 없습니다</td>

                                    <?php
                                } else {
                                    //$sql = "SELECT * FROM shs_admin_estimate ORDER BY wr_datetime DESC";
                                    $result = mysqli_query($con, $sql2);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $row = array(
                                            'idx' => ($row['idx']),
                                            'name' => ($row['name']),
                                            'rn' => ($row['rn']),
                                            'tel' => ($row['tel']),
                                            'test' => ($row['test']),
                                            'wr_datetime' => ($row['wr_datetime'])
                                        );
                                        $timestamp = strtotime($row['wr_datetime']);
                                        $newDate = date("Y-m-d", $timestamp);
                                    ?>
                                        <tbody>
                                            <tr>
                                                <th><?= $row['rn'] ?></th>
                                                <th><?= $row['name'] ?></th>
                                                <th><?= $row['tel'] ?></th>
                                                <th><?= $row['test'] ?></th>
                                                <th><?= $newDate ?></th>
                                                <th><button type="button" id="estimate" onClick="location.href='read.php?id=<?= $row['idx'] ?>'">견적서 보기</button></th>
                                            </tr>
                                        <?php
                                    }
                                        ?>
                                        </tbody>
                                        </tr>
                            </table>
                            <!---페이징 넘버 --->
                            <div id="page_num">
                                <ul class="page_num">
                                <?php
                                    if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                                        echo "<li class='fo_re'><<</li>"; //처음이라는 글자에 빨간색 표시 
                                    } else {
                                        echo "<li><a href='?page=1&search=$search'><<</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                                    }
                                    if ($page <= 1) { //만약 page가 1보다 크거나 같다면 빈값

                                    } else {
                                        $pre = $page - 1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                                        echo "<li><a href='?page=$pre&search=$search'><</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                                    }
                                    for ($i = $block_start; $i <= $block_end; $i++) {
                                        //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                                        if ($page == $i) { //만약 page가 $i와 같다면 
                                            echo "<li class='fo_re'>$i</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                                        } else {
                                            echo "<li><a href='?page=$i&search=$search'>$i</a></li>"; //아니라면 $i
                                        }
                                    }
                                    if ($block_num >= $total_block) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                                    } else {
                                        $next = $page + 1; //next변수에 page + 1을 해준다.
                                        echo "<li><a href='?page=$next&search=$search'>></a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                                    }
                                    if ($page >= $total_page) { //만약 page가 페이지수보다 크거나 같다면
                                        echo "<li class='fo_re'>>></li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                                    } else {
                                        echo "<li><a href='?page=$total_page&search=$search'>>></a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                                    }
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer 
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">

                        </div>
                    </div>
                </footer>
                 End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>