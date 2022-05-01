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
            $('#customer').click(function() {
                location.href = "customerMain.php";
            });
            $('#back').click(function() {
                location.href = "index.php";
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
                    <button class="btn" id="back" name="back" type="button">
                        <i class="ico i-chevronLeft"></i>
                    </button>
                </div>
                <h1 class="navLogo">
                    신규견적
                </h1>
                <div class="header-btn-right">
                    <button class="btn" type="button">
                        <i class="ico"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <!-- header fin -->

    <section class="newformList">
        <div class="container">
            <div class="formWrap">
                <form action="customerMain.php" method="POST">
                    <div class="row">
                        <label for="customerName" class="col-2 col-form-label">이름</label>
                        <div class="col-10">
                            <input class="form-control" id="customerName" type="text" placeholder="" aria-label="default input">
                        </div>
                    </div>
                    <div class="row">
                        <label for="customerAdd" class="col-2 col-form-label">주소</label>
                        <div class="col-10">
                            <input class="form-control" id="customerAdd" type="text" placeholder="" aria-label="default input">
                        </div>
                    </div>
                    <div class="row">
                        <label for="customerPhone" class="col-2 col-form-label">전화</label>
                        <div class="col-10">
                            <input class="form-control" id="customerPhone" type="text" placeholder="" aria-label="default input">
                        </div>
                    </div>
                    <div class="row">
                        <label for="customerType" class="col-2 col-form-label">유형</label>
                        <select class="form-select col-10" id="customerType" aria-label="Default select">
                            <option value="" selected>주택개보수 중보수 100%</option>
                            <option value="">주택개보수 경보수 100%</option>
                            <option value="">주택개보수 경보수 90%</option>
                            <option value="">주택개보수 경보수 80%</option>
                        </select>
                    </div>
                    <div class="row">
                        <label for="customerType" class="col-2 col-form-label">옵션</label>
                        <div class="form-checkWrap col-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="optCheck1">
                                <label class="form-check-label" for="optCheck1">장애인 편의시설</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="optCheck2">
                                <label class="form-check-label" for="optCheck2">순수고령자</label>
                            </div>
                        </div>
                    </div>
                    <div class="row submitWrap">
                        <button id="customer" name="customer" type="submit" class="btn btn-primary col-12">견적 생성하기</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- newformList fin -->
</body>

</html>