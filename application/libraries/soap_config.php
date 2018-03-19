<?php
$username = '';
$password = '#';
$soap_location = 'https:///remote/index.php';
$soap_uri = 'https:///remote/';
$client = new SoapClient(null, array('location' => $soap_location,
                                     'uri'      => $soap_uri,
									 'trace' => 1,
									 'exceptions' => 1));


?>
