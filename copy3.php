<?php
    $url  = $_GET['imgurl'];
    $path = 'img/img'.time().'.png';
    
    //http://featherfiles.aviary.com/2013-04-07/7zWh16rYq0ebHNh-HaaEgA/0fecf20741e44f2b821415557e1e5b84.png
    
 
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    $data = curl_exec($ch);
 
    curl_close($ch);
    file_put_contents($path, $data);
    echo '<img src="http://www.seantburke.com/showboater/'.$path.'"/>';
	echo 'http://www.seantburke.com/showboater/'.$path;
	
?>
