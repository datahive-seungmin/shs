<?php
$con = mysqli_connect("13.125.248.43", "datahive", "Mobile1!", "shs");
$sql = "SELECT * FROM shs_admin";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">


<head>

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
    <script>
        function fnExcelReport(id, title) {
            var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
            tab_text = tab_text + '<head><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">';
            tab_text = tab_text + '<xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>'
            tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';
            tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
            tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';
            tab_text = tab_text + "<table border='1px'>";
            var exportTable = $('#' + id).clone();
            console.log(exportTable)
            exportTable.find('input').each(function(index, elem) {
                $(elem).remove();
            });
            tab_text = tab_text + exportTable.html();
            tab_text = tab_text + '</table></body></html>';
            var data_type = 'data:application/vnd.ms-excel';
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");
            var fileName = title + '.xls';
            //Explorer 환경에서 다운로드
            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                if (window.navigator.msSaveBlob) {
                    var blob = new Blob([tab_text], {
                        type: "application/csv;charset=utf-8;"
                    });
                    navigator.msSaveBlob(blob, fileName);
                }
            } else {
                var blob2 = new Blob([tab_text], {
                    type: "application/csv;charset=utf-8;"
                });
                var filename = fileName;
                var elem = window.document.createElement('a');
                elem.href = window.URL.createObjectURL(blob2);
                elem.download = filename;
                document.body.appendChild(elem);
                elem.click();
                document.body.removeChild(elem);
            }
        }
    </script>
</head>

<body>
    <button type="button" id="excelDownload" name="excelDownload" class="download" onclick="click()">엑셀파일 다운로드</button>
    <nav class="nav nav-list">
        <ul class="menu">
            <li><a href="#estimate">견적서 보기</a></li>
        </ul>
    </nav>

    <div class="shs" id="shs">
        <table id="tableData" name="mytable" class="table table-bordered">
            <caption>건축</caption>
            <tr>

                <th scope="row">이름</th>

                <td></td>

                <th scope="row">주소</td>

                <td></td>

                <th scope="row">전화번호</td>

                <td></td>

            </tr>

            <tr>

                <th scope="row">유형</th>
                <td></td>
                <th scope="row">방문조사자</td>

                <td>김영희</td>

                <td>123</td>
                <td>12345</td>

            </tr>

            <table id="123" name="123" class="table table-bordered">
                <caption>건축1233</caption>
                <tr>

                    <th scope="row">이름</th>

                    <td></td>

                    <th scope="row">주소</td>

                    <td></td>

                    <th scope="row">전화번호</td>

                    <td></td>

                </tr>

                <tr>

                    <th scope="row">유형</th>
                    <td></td>
                    <th scope="row">방문조사자</td>

                    <td>김영희</td>

                    <td>123</td>
                    <td>12345</td>

                </tr>

            </table>

        </table>


        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <form action="read.php" method="POST">
                        <table class="table table-hover">
                            <caption>건축</caption>

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
                                <a href="write.php" class="btn btn-primary pull-right">글쓰기</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <button type="button" onclick="fnExcelReport('tableData','title');">Excel Download</button>
    </div>




</body>
<style>
    table {
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid;
    }
</style>

</html>