<?php
    $url  = $_GET['imgurl'];
    $path = 'img/img'.time().'.png';
 
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    $data = curl_exec($ch);
 
    curl_close($ch);
    file_put_contents($path, $data);
    
    echo 'http://www.seantburke.com/showboater/'.$path;
?>
