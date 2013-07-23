<?php
//$image_path = (isset($_GET['url'])) ? $_GET['url'] : '@/home/seantbur/public_html/hack/faceshow/background4.jpg';


$image_path = (isset($_POST['url'])) ? $_POST['url'] : '@/home/seantbur/public_html/showboater/images/test.png';

$local_path = '@/home/seantbur/public_html/showboater/img/'.basename($_POST['url']);

// Upload image from the filesystem
$ch = curl_init();
$request = array('appkey' => '54SUKQBTQBA87JCEHSJX5Y7UVZBSS5RXFRZ6VB83', 'photo' => $local_path);
curl_setopt($ch, CURLOPT_URL, 'https://snapi.sincerely.com/shiplib/upload');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);

// parse json response to ensure we have a valid upload
if($output){
	$response = json_decode($output);
	
	if($response->id > 0){
		$frontPhotoId = $response->id;
	}else{
		echo "An error occurred on upload";
		echo $local_path;
	}
}else{
	echo 'No output';
}

// set up recipient array with two recipients
$recipients[] = array('name' => 'Bear Douglas', 'street1' => '1 Hacker Way', 'city' => 'Menlo Park', 'state' => 'CA', 'postalcode' => '94025', 'country' => 'United States');
//$recipients[] = array('name'=>'Jane Doe','street1'=>'123 Mission St','city'=>'San Francisco','state'=>'CA','postalcode'=>'94105','country'=>'United States');


// set up sender array
$sender = array('name' => 'Pepper Gram', 'email' => 'amigosteradmin@gmail.com', 'street1' => '800 Market Street', 'city' => 'San Francisco', 'state' => 'CA', 'postalcode' => '94102', 'country' => 'United States');

$url = 'https://snapi.sincerely.com/shiplib/create';
$request = array('appkey' => '54SUKQBTQBA87JCEHSJX5Y7UVZBSS5RXFRZ6VB83', 'message' => 'Hi Mark Zuckerberg,\n\nGreatings from my Vacation! Wish you were here with me exploring the world instead of at PhotoHackDay :p', 'frontPhotoId' => $frontPhotoId, 'testMode' => true, 'recipients' => json_encode($recipients), 'sender' => json_encode($sender));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// send request
$output = curl_exec($ch);
curl_close($ch);

if($output){
	$response = json_decode($output);
	
	if($response->success == true){
		/// success!
		//print_r($response);
		$sent_to = $response->sent_to;
		echo '<img src="' . $sent_to[0]->previewUrl . '"><br>';
		echo '<img src="' . $sent_to[0]->previewBackUrl . '">';
	}else{
		echo "An error occurred on message";
	}
}
?>
