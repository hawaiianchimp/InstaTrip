<?php
/**
 * FlashFoto PHP API SDK - Examples - Add
 * For FlashFoto APIv2
 */

include_once('config.inc.php');
include_once('flashfoto.php');

$method = 'remove background';
$api_url = 'remove_uniform_background';
$doc_url = 'removebackground';
$version = 'UniformBackgroundMasked';

if(empty($cfg['partner_username']) || empty($cfg['partner_apikey']) || empty($cfg['base_url'])) {
	$error = 'Please configure your settings in config.inc.php';
	}

$img_url  = $_GET['img_url'];

$ch = curl_init(); 
//Dropbox uses plaintext OAuth 1.0; make the header for this request
$headers = array('Context: plain-text'); 
// set cURL options and execute
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
curl_setopt($ch, CURLOPT_URL, $img_url);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
$api_post_data = curl_exec($ch);



$post_data = array('api_post_data' => $api_post_data, 'api_params' => $api_params, 'error'=>$error);

	//if no errors proceed
	if(empty($post_data['error'])) {
		$FlashFotoAPI = new FlashFoto($cfg['partner_username'], $cfg['partner_apikey'], $cfg['base_url']);
		try{
			$result = $FlashFotoAPI->add($post_data['api_post_data'] ? $post_data['api_post_data'] : null, $post_data['api_params'] ? $post_data['api_params'] : null);
			try {
				$result2 = $FlashFotoAPI->remove_uniform_background($result['Image']['id'], array("findholes" => 0));
				/*
				try {
					$status = null;
					while(1) {
						sleep(5);
						$status = $FlashFotoAPI->mugshot_status($result['Image']['id']);
						if($status['mugshot_status'] == 'failed' || $status['mugshot_status'] == 'finished') {
							break;
						}
					}
					$result3 = $status;
					if($status['mugshot_status'] == 'finished') {
						try {
							unset($post_data['api_params']['version']);
							$result4 = $FlashFotoAPI->get($result['Image']['id'], array_merge(array('version'=>'MugshotMask'), !empty($post_data['api_params'] ) ? $post_data['api_params'] : array()));
							$result5 = $FlashFotoAPI->get($result['Image']['id'], array_merge(array('version'=>'MugshotMasked'), !empty($post_data['api_params'] ) ? $post_data['api_params'] : array()));
						} catch(Exception $e) {
							$result4 = $e;
						}
					}
				} catch(Exception $e) {
					$result3 = $e;
				}*/
			$result5 = $FlashFotoAPI->get($result['Image']['id'], array_merge(array('version'=>'UniformBackgroundMasked'), array()));
			$url = 'http://flashfotoapi.com/api/get/'.$result['Image']['id'].'?partner_username='.$cfg['partner_username'].'&partner_apikey='.$cfg['partner_apikey'].'&version='.$version;
			
			} catch(Exception $e) {
				$result2 = $e;
			}
		} catch(Exception $e) {
			$result = $e;
		}
	} else {
		$error = $post_data['error'];
	}

    $path = 'img/img'.time().'.png';
 
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    $data = curl_exec($ch);
 
    curl_close($ch);
    file_put_contents($path, $data);
    
    echo 'http://www.seantburke.com/showboater/'.$path;

?>