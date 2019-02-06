<?php
//https://use-shortcuts.de/webhooks/ba_1m_challenge_manychat.php?your_ba_id=493152&leader_name=Full Name
$link = "https://challenge.mybuilderall.eu/#aid=".$_GET['your_ba_id']."&name=" . base64_encode($_GET['leader_name']);
echo '{ "leader_link": "'.$link.'"  }';
?>
