<?php
$link = "https://challenge.mybuilderall.eu/#aid=".$_GET['your_ba_id']."&name=" . base64_encode($_GET['leader_name']);
echo '{ "leader_link": "'.$link.'"  }';
?>
