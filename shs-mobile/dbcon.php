<?php
$con = mysqli_connect("13.125.248.43", "datahive", "Mobile1!", "shs");
$sql = "SELECT * FROM shs_admin_estimate";
$result = mysqli_query($con, $sql);

?>