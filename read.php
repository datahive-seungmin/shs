<?php
$con = mysqli_connect("13.125.248.43", "datahive", "Mobile1!", "shs");
$idx = $_GET['id'];

$sql = "SELECT * FROM shs_admin_estimate WHERE idx = $idx";

$ex_query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($ex_query);
require_once("inc_head.php");
?>
<style>
    nav {
        width: 15%;
        background-color: #eee;
        border-right: 1px solid #ddd;
        position: fixed;
        height: 100%;
    }

    .menu li a {
        margin-top: 30%;
        height: 5%;
        text-align: center;
        display: block;
        padding: 0;
        font-size: 12px;
        color: #555;
    }

    .menu li a:hover {
        background-color: yellowgreen;
        color: white;
    }

    ul {
        background-color: #FFDAB9;
        width: 100%;
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    li a {
        padding-top: 50%;
        display: block;
        color: #000000;
        padding: 8px;
        text-decoration: none;
        font-weight: bold;
    }

    li a:hover {
        background-color: #CD853F;
        color: white;
    }

    .shs {
        margin-left: 15%;
        padding: 1px 16px;
        height: 100%;
    }
</style>

<!doctype html>
<html>

<head>
    <!-- Sheet JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.3/xlsx.full.min.js"></script>
    <!--FileSaver savaAs 이용 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script text="text/javascript">
        // var wb = XLSX.utils.table_to_book(document.getElementById('mytable'), {
        //     sheet: "shh",
        //     raw: true
        // });
        // XLSX.writeFile(wb, ('shs.xlsx'));
        $(document).ready(function() {
            $(document).on("click", "button[name='excelDownload']", function() {
                exportExcel();               
            });
        });

        function exportExcel() {
            // step 1. workbook 생성
            var wb = XLSX.utils.book_new();

            // step 2. 시트 만들기 
            var newWorksheet = excelHandler.getWorksheet();

            // step 3. workbook에 새로만든 워크시트에 이름을 주고 붙인다.  
            XLSX.utils.book_append_sheet(wb, newWorksheet, excelHandler.getSheetName());

            // step 4. 엑셀 파일 만들기 
            var wbout = XLSX.write(wb, {
                bookType: 'xlsx',
                type: 'binary'
            });

            console.log(XLSX)

            // step 5. 엑셀 파일 내보내기 
            saveAs(new Blob([s2ab(wbout)], {
                type: "application/octet-stream"
            }), excelHandler.getExcelFileName());
        }

        var excelHandler = {
            getExcelFileName: function() {
                return 'table-test.xlsx'; //파일명
            },
            getSheetName: function() {
                return 'Table Test Sheet'; //시트명
            },
            getExcelData: function() {
                return document.getElementById('shs'); //TABLE id
            },
            getWorksheet: function() {
                return XLSX.utils.table_to_sheet(this.getExcelData());
            }
        }

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length); //convert s to arrayBuffer
            var view = new Uint8Array(buf); //create uint8array as viewer
            for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF; //convert to octet
            return buf;
        }
    </script>

</head>

<body>

    <nav class="nav nav-list">
        <ul class="menu">
            <li><a href="/estimate.php">견적서 보기</a></li>
        </ul>
    </nav>

    <div class="shs" id="shs">
        <table id="tableData" name="mytable" class="table table-bordered">
            <tr>

                <th scope="row">이름</th>

                <td><?= $result['name'] ?></td>

                <th scope="row">주소</td>

                <td><?= $result['test'] ?></td>

                <th scope="row">전화번호</td>

                <td><?= $result['tel'] ?></td>

            </tr>

            <tr>

                <th scope="row">유형</th>
                <td></td>
                <th scope="row">방문조사자</td>

                <td></td>

                <td>123</td>
                <td>12345</td>

            </tr>

        </table>
        <div class="container-fluid">
            <div class="shsTable">
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <td>건축</td>
                                </tr>

                                <tr>
                                    <th>번 호</th>
                                    <th>제목</th>
                                    <th>댓글수</th>
                                    <th>등록자</th>
                                    <th>조회수</th>
                                    <th>등록일시</th>
                            </thead>

                            <?php

                            //$sql = "SELECT * FROM shs_admin";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $row = array(
                                    'idx' => ($row['idx']),
                                    'tel' => ($row['tel']),
                                    'test' => ($row['test'])
                                );
                            ?>
                                <tbody>

                                    <tr style="cursor:pointer;" onClick=" location.href='http://www.naver.com' " onMouseOver="window.status = 'http://ihouse.so.vc' " onMouseOut="window.status = '' ">
                                        <th><?= $row['idx'] ?></th>
                                        <th><?= $row['test'] ?></th>
                                        <th><?= $row['tel'] ?></th>
                                    </tr>

                                <?php
                            }
                                ?>
                                </tbody>
                                </tr>
                        </table>
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <td>건축</td>
                                </tr>

                                <tr>
                                    <th>번 호</th>
                                    <th>제목</th>
                                    <th>댓글수</th>
                                    <th>등록자</th>
                                    <th>조회수</th>
                                    <th>등록일시</th>
                            </thead>

                            <?php

                            $sql = "SELECT * FROM shs_admin";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $row = array(
                                    'idx' => ($row['idx']),
                                    'admin_id' => ($row['admin_id']),
                                    'admin_password' => ($row['admin_password'])
                                );
                            ?>
                                <tbody>

                                    <tr style="cursor:pointer;" onClick=" location.href='http://www.naver.com' " onMouseOver="window.status = 'http://ihouse.so.vc' " onMouseOut="window.status = '' ">
                                        <th><?= $row['idx'] ?></th>
                                        <th><?= $row['admin_id'] ?></th>
                                        <th><?= $row['admin_password'] ?></th>
                                    </tr>

                                <?php
                            }
                                ?>
                                </tbody>
                                </tr>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-outline-light pull-right" id="excelDownload" name="excelDownload" class="download" onclick="click()">엑셀저장</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>