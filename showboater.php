<?php
/**
 * FlashFoto PHP API SDK - Examples - Add
 * For FlashFoto APIv2
 */

include_once('config.inc.php');
include_once('flashfoto.php');

?>

<html>				
<head>
</head>
<body>
<input type="button" value="select image" onClick="openFilePicker();">
			<div id="response"></div>	
			<canvas id="image" height="600px" width="400px"></canvas>
			
			<script>
				function loadCanvas(dataURL) {
				
				        var canvas = document.getElementById('image');
				        canvas.width = canvas.width;
				        var context = canvas.getContext('2d');
				        // load image from data url
				        var imageObj = new Image();
				        imageObj.onload = function() {
				          context.drawImage(this, 0, 0, imageObj.width/imageObj.height*300, 300);
				        };
				
				        imageObj.src = dataURL;
				      }
			</script>
			
			<script>
				function openFilePicker(){
					filepicker.setKey('AIuTObNfQ4ObNiyswkIpAz');
					filepicker.pick({
					    mimetypes: ['image/*', 'text/plain'],
					    container: 'window',
					    services:['COMPUTER', 'FACEBOOK', 'GMAIL','DROPBOX','INSTAGRAM'],
					  },
					  function(FPFile){
					    console.log(JSON.stringify(FPFile));
					    var theFile = FPFile;
					    loadCanvas(FPFile['url']);
					    $( "#response" ).html( "<strong>Creating your paradise...</strong>" );
					    var canvas = document.getElementById('image');
					    console.log(FPFile['url']);
					    $.ajax({
					      type: "GET",
					      url: "/showboater/remove.php",
					      data: {
					        img_url: FPFile['url']
					      },
					      success: function( data ) {
					      	$( "#response" ).html( "<strong>Done!</strong>" );
					        loadCanvas(data);
					      }
					    });					    
					  },
					  function(FPError){
					    console.log(FPError.toString());
					    
					  }
					);
					}
			</script>
			<input type="submit" />
		</form>
		
		<script src="http://code.jquery.com/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="//api.filepicker.io/v1/filepicker.js"></script></body>

	</body>
</html>