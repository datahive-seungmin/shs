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
            $('#back').click(function() {
                location.href = "newEstimate.php";
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
                <h1 class="navLogo customerName">
                    홍길동
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

    <section class="customerInfo">
        <div class="container">
            <div class="listWrap">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-2 sub">
                                이름
                            </div>
                            <div class="col-10 cont list-name">
                                홍길동
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-2 sub">
                                주소
                            </div>
                            <div class="col-10 cont list-add">
                                인천시 부평구 부평대로 293 부평테크시티 913호
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-2 sub">
                                전화
                            </div>
                            <div class="col-10 cont list-Phone">
                                <a href="tel:+821055555555">010-5555-5555</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-2 sub">
                                유형
                            </div>
                            <div class="col-10 cont list-opt">
                                <div>주택개보수 중보수 100%</div>
                                <div>장애인편의시설</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- customerInfo fin -->

    <div class="customerCard">
        <div class="container">
            <div class="row">
                <div class="cardWrap col">
                    <div>
                        <div class="card-sub">최대지원금액</div>
                        <div class="card-value">8,800,000</div>
                    </div>
                </div>
                <div class="cardWrap col">
                    <div>
                        <div class="card-sub">사전견적사용금액</div>
                        <div class="card-value">3,800,000</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- customerCard fin -->

    <section class="customerCont">
        <div class="container">
            <div class="listWrap">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="titleWrap d-flex justify-content-between align-items-center">
                            <h5 class="list-title">건축</h5>
                            <div class="list-btn-right">
                                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#architectureModal">
                                    <i class="ico i-add"></i>
                                </button>
                            </div>
                        </div>
                        <div class="contWrap">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">품목</th>
                                        <th scope="col">수량</th>
                                        <th scope="col">가격</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row" class="list-product-name">(보수)콘크리트벽돌쌓기 표준형0.5B, 1층인력</th>
                                        <td class="list-product-numb">(90x124)+(70x100)</td>
                                        <td class="list-product-price">1,158,358</td>
                                        <td class="list-btn"><i class="ico i-delete"></i></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="list-product-name">(보수)콘크리트벽돌쌓기 표준형0.5B, 1층인력</th>
                                        <td class="list-product-numb">1</td>
                                        <td class="list-product-price">58,358</td>
                                        <td class="list-btn"><i class="ico i-delete"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="titleWrap d-flex justify-content-between align-items-center">
                            <h5 class="list-title">주방가구</h5>
                            <div class="list-btn-right">
                                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#kitchenModal">
                                    <i class="ico i-add"></i>
                                </button>
                            </div>
                        </div>
                        <div class="contWrap">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">품목</th>
                                        <th scope="col">수량</th>
                                        <th scope="col">가격</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row" class="list-product-name">상부장 개폐장(편개) / 300 이하</th>
                                        <td class="list-product-numb">(90x124)+(70x100)</td>
                                        <td class="list-product-price">1,158,358</td>
                                        <td class="list-btn"><i class="ico i-delete"></i></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="list-product-name">상판 스테인레스 조리대 / 330x550x0.6t</th>
                                        <td class="list-product-numb">1</td>
                                        <td class="list-product-price">58,358</td>
                                        <td class="list-btn"><i class="ico i-delete"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="titleWrap d-flex justify-content-between align-items-center">
                            <h5 class="list-title">창호</h5>
                            <div class="list-btn-right">
                                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#windowModal">
                                    <i class="ico i-add"></i>
                                </button>
                            </div>
                        </div>
                        <div class="contWrap">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">품목</th>
                                        <th scope="col">수량</th>
                                        <th scope="col">가격</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row" class="list-product-name">창호 미서기창_이중창W 창2짝 백색사출마감 판유리(투명,3T) 판유리(투명,5T)</th>
                                        <td class="list-product-numb">1</td>
                                        <td class="list-product-price">1,158,358</td>
                                        <td class="list-btn"><i class="ico i-delete"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="titleWrap d-flex justify-content-between align-items-center">
                            <h5 class="list-title">방범창</h5>
                            <div class="list-btn-right">
                                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#securitywindowModal">
                                    <i class="ico i-add"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- customerCont fin -->


    <!-- architectureModal -->
    <div class="modal fade customerModal" id="architectureModal" tabindex="-1" aria-labelledby="architectureModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="architectureModalLabel">
                        <b>건축</b>
                        <div>품목추가</div>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="formWrap">
                        <form>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>명칭</option>
                                    <option value="">단순보수비</option>
                                    <option value="">콘크리트벽돌 쌓기</option>
                                    <option value="">바닥석재타일 붙이기</option>
                                    <option value="">석고보드 붙이기</option>
                                </select>
                            </div>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>규격</option>
                                    <option value="">표준형 0.5B</option>
                                    <option value="">표준형 0.5B, 1층, 인력</option>
                                    <option value="">표준형 0.5B, 2층, 인력</option>
                                    <option value="">표준형 1.0B</option>
                                    <option value="">표준형 1.0B, 1층, 인력</option>
                                    <option value="">표준형 1.0B, 2층, 인력</option>
                                </select>
                            </div>
                            <div class="inputWrap">
                                <input class="form-control" type="text" placeholder="수량입력" aria-label="default input">
                            </div>
                        </form>
                    </div>
                    <div class="priceWrap">
                        <div class="row align-items-center">
                            <div class="col-2 sub">단가</div>
                            <div class="col-10 modal-product-price">00,000<span>원</span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">추가</button>
                </div>
            </div>
        </div>
    </div>
    <!-- architectureModal fin -->

    <!-- kitchenModal -->
    <div class="modal fade customerModal" id="kitchenModal" tabindex="-1" aria-labelledby="kitchenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kitchenModalLabel">
                        <b>주방가구</b>
                        <div>품목추가</div>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="formWrap">
                        <form>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>구분</option>
                                    <option value="">상부장</option>
                                    <option value="">하부장</option>
                                    <option value="">상판</option>
                                    <option value="">후드</option>
                                    <option value="">악세사리</option>
                                    <option value="">키큰장</option>
                                </select>
                            </div>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>항목</option>
                                    <option value="">조리대(개폐장, 편개)</option>
                                    <option value="">조리대(개폐장, 양개)</option>
                                    <option value="">조리대(서랍장)</option>
                                    <option value="">가스대(개폐장)</option>
                                </select>
                            </div>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>규격</option>
                                    <option value="">300~400</option>
                                    <option value="">400~500</option>
                                    <option value="">500~600</option>
                                </select>
                            </div>
                            <div class="inputWrap">
                                <input class="form-control" type="text" placeholder="수량입력" aria-label="default input">
                            </div>
                        </form>
                    </div>
                    <div class="priceWrap">
                        <div class="row align-items-center">
                            <div class="col-2 sub">단가</div>
                            <div class="col-10 modal-product-price">00,000<span>원</span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">추가</button>
                </div>
            </div>
        </div>
    </div>
    <!-- kitchenModal fin -->

    <!-- windowModal -->
    <div class="modal fade customerModal" id="windowModal" tabindex="-1" aria-labelledby="windowModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="windowModalLabel">
                        <b>창호</b>
                        <div>품목추가</div>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="formWrap">
                        <form>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>대분류</option>
                                    <option value="">창호</option>
                                    <option value="">도어</option>
                                    <option value="">방충망</option>
                                    <option value="">잠금장치</option>
                                </select>
                            </div>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>중분류</option>
                                    <option value="">미서기창W</option>
                                    <option value="">미서기창_이중창W</option>
                                    <option value="">미거시창_발코니BP</option>
                                </select>
                            </div>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>형태</option>
                                    <option value="">창2짝</option>
                                    <option value="">창3짝</option>
                                    <option value="">창4짝</option>
                                </select>
                            </div>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>마감</option>
                                    <option value="">백색사출마감</option>
                                    <option value="">비닐시트랩핑마감_내부창_내면</option>
                                    <option value="">비닐시트랩핑마감_내외부창_내면</option>
                                </select>
                            </div>
                            <div class="row">
                                <label for="window-width" class="col-3 col-form-label">너비(w)</label>
                                <div class="col-8">
                                    <input class="form-control" id="window-width" type="text" placeholder="" aria-label="default input">
                                </div>
                                <div class="col-1">m</div>
                            </div>
                            <div class="row">
                                <label for="window-height" class="col-3 col-form-label">높이(h)</label>
                                <div class="col-8">
                                    <input class="form-control" id="window-height" type="text" placeholder="" aria-label="default input">
                                </div>
                                <div class="col-1">m</div>
                            </div>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>유리선택-단창,이중창(내창)</option>
                                    <option value="">판유리(투명,3T)</option>
                                    <option value="">판유리(투명,5T)</option>
                                    <option value="">판유리(칼라,5T)</option>
                                </select>
                            </div>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>유리선택-이중창(외창))</option>
                                    <option value="">판유리(투명,3T)</option>
                                    <option value="">판유리(투명,5T)</option>
                                    <option value="">판유리(칼라,5T)</option>
                                </select>
                            </div>
                            <div class="inputWrap">
                                <input class="form-control" type="text" placeholder="수량입력" aria-label="default input">
                            </div>
                        </form>
                    </div>
                    <div class="priceWrap">
                        <div class="row align-items-center">
                            <div class="col-2 sub">단가</div>
                            <div class="col-10 modal-product-price">00,000<span>원</span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">추가</button>
                </div>
            </div>
        </div>
    </div>
    <!-- windowModal fin -->

    <!-- securitywindowModal -->
    <div class="modal fade customerModal" id="securitywindowModal" tabindex="-1" aria-labelledby="securitywindowModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="securitywindowModalLabel">
                        <b>방범창</b>
                        <div>품목추가</div>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="formWrap">
                        <form>
                            <div class="selectWrap">
                                <select class="form-select" id="" aria-label="Default select">
                                    <option value="" selected>일위대가명</option>
                                    <option value="">(보수)방범창 설치</option>
                                    <option value="">(보수)방범창 철거 및 설치</option>
                                    <option value="">(보수)방범창 철거 및 설치 (자재 재사용)</option>
                                </select>
                            </div>
                            <div class="row">
                                <label for="securitywindow-standard" class="col-3 col-form-label">규격</label>
                                <div class="col-9">
                                    <input class="form-control" id="securitywindow-standard" type="text" placeholder="" aria-label="default input">
                                </div>
                            </div>
                            <div class="row">
                                <label for="securitywindow-surface" class="col-3 col-form-label">면접</label>
                                <div class="col-9">
                                    <input class="form-control" id="securitywindow-surface" type="text" placeholder="" aria-label="default input">
                                </div>
                            </div>
                            <div class="inputWrap">
                                <input class="form-control" type="text" placeholder="수량입력" aria-label="default input">
                            </div>
                        </form>
                    </div>
                    <div class="priceWrap">
                        <div class="row align-items-center">
                            <div class="col-2 sub">단가</div>
                            <div class="col-10 modal-product-price">00,000<span>원</span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">추가</button>
                </div>
            </div>
        </div>
    </div>
    <!-- securitywindowModal fin -->
</body>

</html>