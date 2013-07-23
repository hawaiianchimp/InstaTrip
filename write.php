<?php
    $data = $_POST['imgdata'];
    $path = 'img/img'.time().'.png';
    
    $data = preg_replace("/^data:image\/(png|jpg);base64,/", $data, "");
    
    file_put_contents($path, base64_decode($data));
    
    echo 'http://www.seantburke.com/showboater/'.$path;
?>
