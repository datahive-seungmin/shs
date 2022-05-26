<?php
header("Content-Type: application/json"); //json을 사용하기 위해 필요한 구문

//한글의 경우 PHP json에서 표시가 되지 않는 문제점으로 인해 한글 사용시 iconv로 변환하여 넣어주었음.
$profile = array("name" => iconv("EUC-KR", "UTF-8", "홍길동"), "age" => "37"); //이름, 나이 정보가 있는 배열
$contact = array("address" => iconv("EUC-KR", "UTF-8", "광화문 서울특별시 종로구 세종로 사직로 161"), "tel" => "010-1234-5555"); //주소와 전화번호가 정보가 있는 배열
$career = array("job" => iconv("EUC-KR", "UTF-8", "무사"), "rank" => iconv("EUC-KR", "UTF-8", "팀장")); //직업과 직급의 정보가 있는 배열

//각각의 정보를 하나의 배열 변수에 넣어준다.
$data = array(
    "profile" => $profile,
    "contact" => $contact,
    "career" => $career
);

//json 출력
echo (json_encode($data, JSON_UNESCAPED_UNICODE));

?>