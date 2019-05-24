<?php

$url = 'https://member.mailingboss.com/index.php/lists/xxxxxxxxx/subscribe';

$data_decoded = json_decode(file_get_contents('php://input'), true);

$data = array(
	'FNAME' => $data_decoded['first_name'],
    	'LNAME' => $data_decoded['last_name'],
	'EMAIL' => $data_decoded['custom_fields']['user_email'],
	'GDPR' => 'yes',
);

# Create a connection
$ch = curl_init($url);
# Form data string
$postString = http_build_query($data, '', '&');
# Setting our options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$response = curl_exec($ch);
if("" != trim($response))
{
	$set_field_value = 'no';
}else{
	$set_field_value = 'yes';	
}

//https://manychat.github.io/dynamic_block_docs/
echo '{
  "version": "v2",
  "content": {
    "messages": [],
    "actions": [
      {
        "action": "set_field_value",
        "field_name": "email_transmitted",
        "value": "'.$set_field_value.'"
      }
	  ],
    "quick_replies": []
  }
}';	

curl_close($ch);
?>
