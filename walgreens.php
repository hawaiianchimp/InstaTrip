<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Walgreens</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
  </head>
  <body>
    <div>
    <p>
      <!-- Output the JSON here son! -->
        <?php  
        
        /*
         * {"serviceType":"wagS3",
         * "act":"genCreden",
         * "view":"genCredenJSON",
         * "affId":"<<Enter your affID here>>",
         * "apiKey":"<<Enter your apiKey here>>"} 
         */
        
        $data = array("serviceType" => "wagS3", "act" => "genCreden", "view" => "genCredenJSON", "affId" => "hackathon", "apiKey" => "a61e8e47ca83e86a2b8c705899ae9f6d");                                                                    
		$data_string = json_encode($data);                                                                                   
 
		$ch = curl_init('https://services-qa.walgreens.com/api/util/mweb5url');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    		'Content-Type: application/json',                                                                                
    		'Content-Length: ' . strlen($data_string))                                                                       
		);      	                                                                                                             
 
		$json_result = curl_exec($ch);
		echo $json_result;
		
		/*
		{"secretKey":"Hb9SlpAPHAXR5HTHGdu4itcfkPvgJ4ZS2ABXcPf+",
		"accessKeyId":"ASIAITEACZCASSBKYT7A",
		"sessionId":"AQoDYXdzEPv//////////wEa8AFhaYX060BP3vXT/QVhQbYjzv5OEy45VXy7uhxFvVrBQsoBi0L/nSeTvH76IeddadQ5Z0IUN0nHH9aQ8XSlv4cWTjMJKLVWQlYz8emC49r8gnGafje62FOaeDdnq2uDTh5Dt0iju12qcuRC3qEp9jnQcxzFqVc91yTJmBS+rMuJSgF9WJpeCovzC4VCXVVMXWbPQzHFpptQ8aW8h6J7alvgZJo1rWWM5kdl4OP1qMch/OiJa5SeqRl5gA1nENjbhwi6Mx8UYqDmcElKl8qlNR3IGmdyY3/HoiEqg/mIcVoL/CkwzJvApOIWwmh6dDCvV/QgtZeDiwU=",
		"landingUrl":"https://m5-qa.walgreens.com/mweb5/checkout/cartPoster.jsp",
		"uploadLimit":100,
		"tokenId":"PHT-Kmj5w3ZLFCcaYgbp0PJGjbSoB6DsEgXO",
		"template":"default",
		"uploadUrl":"http://pod-qa.walgreens.com",
		"err":""}
		*/
		
		$x_amz_securitytoken = $json_result->{'sessionID'};
		$uploadUrl = $json_result->{'uploadUrl'};
				
		
		/*		
		PUT /my-image.jpg HTTP/1.1 
		Host: pod-qa.walgreens.com 
		Date: Wed, 12 Oct 2009 17:50:00 GMT 
		Authorization: AWS AKIAIOSFODNN7EXAMPLE:xQE0diMbLRepdf3YB+FIEXAMPLE= 
		Content-Type: text/plain 
		Content-Length: 11434 
		Expect: 100-continue 
		[11434 bytes of object data] 
		x-amz-securitytoken=AQoDYXdzENb//////////wEawAGtkouezNvVA75JoBgAvaVTV/tf5PTOBEW+/ 
		Gf2Zf6LyjFL1gkYMx1UfO+JAONOI3DDme3wbL5APtKaz8m3wfq5hxc8v2ixqMKGU9ZnH4vhUF
		DleNXm+1K9wHPiqsoUbIOakvNuQGqEnBU5jQVH/kYb8ikh+N2ayIbWO/omtvjNSrUtPHJZEaQl 
		GvXOfPKxbso0gRvl4myCuTvv3XnxlnThu8BBYjnLu5QOFT83Ize4SYqiMid7g29vM8VVN 
		OOph00g87vcggU=
		*/		
		
		$file_on_dir_not_url = 'http://www.seantburke.com/hack/faceshow/background4.jpg';
		$image = fopen($file_on_dir_not_url, "rb");
		fclose($image);

		$chlead = curl_init($uploadUrl); 
		curl_setopt($chlead, CURLOPT_HTTPHEADER, array('Content-Type: text/plain',
													'Content-Length: ' . strlen($file_on_dir_not_url),
													'x-amz-securitytoken='.$x_amz_securitytoken.'='));
		curl_setopt($chlead, CURLOPT_VERBOSE, 1);
		curl_setopt($chlead, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($chlead, CURLOPT_CUSTOMREQUEST, "PUT"); 
		curl_setopt($chlead, CURLOPT_POSTFIELDS, $image);
		
		$chleadresult = curl_exec($chlead);
		$chleadapierr = curl_errno($chlead);
		$chleaderrmsg = curl_error($chlead);
		curl_close($chlead);

		/*
        $context = stream_context_create(array(
	    'http' => array(
	        	'timeout' => 10
	        	)
	    	)
		); 
		
		$serviceType = 'wagS3';
		$act = 'genCreden';
		$view = 'genCredenJSON'; 
		$affId = 'hackathon';
		$apiKey = 'a61e8e47ca83e86a2b8c705899ae9f6d';
		
		//$jsonurl = 'https://services-qa.walgreens.com/api/util/mweb5url?serviceType='.$serviceType.'&act='.$act.'&view='.$view.'&affId='.$affId.'&apiKey='.$apiKey;
		//echo $jsonurl;
		//$json = file_get_contents($jsonurl,null, $context);
		//$json_output = json_decode($json);
	
        if(isset($content->photos)){
        	$photos = $content->photos;
        	$count = 0;
        	foreach ($photos as $val){
        		echo '
        		<img src="'.$val->{'image_url'}.'">
        		<p><input type="image" src="http://images.aviary.com/images/edit-photo.png" value="Edit photo" onclick="return launchEditor(\'image1\', \''.$val->{'image_url'}.'\');" /></p>';
        		
        		$count++;
        		if($count%4 == 0){
        			echo '<br>';
        		}
        	}
        	
        }
        */
        ?>
        
        <pre>
        <?php print_r($result);?>
        </pre>
    </p>
  </body>
</html>
