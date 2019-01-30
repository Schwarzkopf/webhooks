<?php
$link = "https://challenge.mybuilderall.eu/#aid=".$_POST['your_ba_id']."&name=" . base64_encode($_POST['leader_name']);
echo '{ "air_variables": [ { "leader_link": "'.$link.'" } ] }';
?>
