<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>500px OAuth in PHP</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
    <link href="../css/dark-hive/jquery-ui-1.10.2.custom.css" rel="stylesheet">
    <script src="../js/jquery-1.9.1.js"></script>
    <script src="../js/jquery-ui-1.10.2.custom.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
  </head>
  <body>
    <div>
      <h2>Welcome to a 500px OAuth PHP example.</h2>

      <p>This site is a basic showcase of 500px OAuth authentication method. If you are having issues try <a href='./clearsessions.php'>clearing your session</a>.</p>

      <hr />
      <?php if (isset($menu)) { ?>
        <?php echo $menu; ?>
      <?php } ?>
    </div>
    <?php if (isset($status_text)) { ?>
      <?php echo '<h3>'.$status_text.'</h3>'; ?>
    <?php } ?>
    <p>
      <!-- Output the JSON here son! -->
        <?php   
        if(isset($content->photos)){
        	$photos = $content->photos;
        	$count = 0;
        	foreach ($photos as $val){
        		echo '
        		<a href="#"><img class="" src="'.$val->{'image_url'}.'" height="200px" onclick="openDialogue($(this));" ></a>';
        	}
        	
        }
        ?>

    </p>
    
<!-- Load Feather code -->
<script type="text/javascript" src="http://feather.aviary.com/js/feather.js"></script>


<!-- Instantiate Feather -->
<script type='text/javascript'>

	var background_image;

   var featherEditor = new Aviary.Feather({
       apiKey: '7zWh16rYq0ebHNh-HaaEgA',
       apiVersion: 2,
       tools: 'all',
       appendTo: '',
       onSave: function(imageID, newURL) {
           var img = document.getElementById(imageID);
           img.src = newURL;
       },
       onError: function(errorObj) {
           alert(errorObj.message);
       }
   });
   function launchEditor(id, src) {
       featherEditor.launch({
           image: id,
           url: src
       });
      return false;
   }
   
   $(document).ready(function() {
     // this initializes the dialog (and uses some common options that I do)
     $("#dialog").dialog(
     {
     autoOpen : false, 
     resizable: false,
     modal: true,
     width:'auto',
     show : "fade", 
     hide : "fade"});
     });
     
     $("#aviaryEdit").hide();
   
   function openDialogue(photo){
   		console.log(photo);
   		console.log(photo.attr("src"));
   		background_image = photo.attr("src");
   	   $("#selected_image").attr("src", background_image);
       $("#dialog").dialog("open");
       return false;
   }
</script>

                  
<div id="dialog" title="Insert You">
    <div class="dialog_image">
    	<img id="selected_image" src=""/>
    	<a href="#"><img id="avatar_add" src="avatar_grey.png" onclick="openFilePicker()"/></a>
    				<div id="response"></div>	
    				<canvas id="canvas_image" height="0px" width="0px"></canvas>
    				
    				<div id="container"></div>
    				    <script src="http://d3lp1msu2r81bx.cloudfront.net/kjs/js/lib/kinetic-v4.4.0.min.js"></script>
    				    <script defer="defer">
    				    
    				    
    				    function drawCanvas(dataurl){
    				    
    				    	$("#selected_image").hide();
    				    	$("#avatar_add").hide();
    				    	$("#aviaryEdit").show();
    				    	
    				    	var background_src = $("#selected_image").attr("src");
    				    	
    				    	var background = new Image();
    				    	var person = new Image();
    				    	
    				    	
    				    	background.onload = function() {
    				    		
    				    	}
    				    	
    				    	background.src = background_src;
    				    	
    				    	var stage = new Kinetic.Stage({
    				    	      container: "container",
    				    	      width: background.width,
    				    	      height: background.height
    				    	    });
    				    	    
    				    	person.onload = function() {
    				    		    
    				    		    var background_layer = new Kinetic.Layer();
    				    		
    				    		    // darth vader
    				    		    var background_image = new Kinetic.Image({
    				    		      image: background,
    				    		      x: 0,
    				    		      y: 0,
    				    		      width: background.width,
    				    		      height: background.height,
    				    		      draggable: false
    				    		    });
    				    		
    				    		    background_layer.add(background_image);
    				    		    stage.add(background_layer);
    				          	    
    				          	    var person_layer = new Kinetic.Layer();
    				          	
    				          	    // darth vader
    				          	    var person_image = new Kinetic.Image({
    				          	      image: person,
    				          	      x: stage.getWidth() / 2 - 200 / 2,
    				          	      y: stage.getHeight() / 2 - 137 / 2,
    				          	      width: background.height*.60*(person.width/person.height),
    				          	      height: background.height*.60,
    				         	      draggable: true
    				          	    });
    				          	
    				          	    // add cursor styling
    				          	    person_image.on('mouseover', function() {
    				          	      document.body.style.cursor = 'pointer';
    				          	    });
    				          	    person_image.on('mouseout', function() {
    				          	      document.body.style.cursor = 'default';
    				          	    });
    				          	
    				          	    person_layer.add(person_image);
    				          	    stage.add(person_layer);
    				          	    
    				          	    document.getElementById('aviaryEdit').addEventListener('click', function() {
    				          	            /*
    				          	             * since the stage toDataURL() method is asynchronous, we need
    				          	             * to provide a callback
    				          	             */
    				          	            stage.toDataURL({
    				          	              callback: function(dataUrl) {
    				          	                
    				          	                aviaryEdit(dataUrl);
    				          	               }
    				          	            });
    				          	          }, false);
    				          };
    				          
    				          person.src = dataurl;
    				    }	
    				    
    				    
    				    function aviaryEdit(dataurl)
    				    {
    				      	return launchEditor(dataurl);
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
    						    //drawCanvas(FPFile['url']);
    						    $( "#response" ).html( "<strong>Creating your paradise...</strong>" );
    						    var canvas = document.getElementById('canvas_image');
    						    console.log(FPFile['url']);
    						    $.ajax({
    						      type: "GET",
    						      url: "/showboater/remove.php",
    						      data: {
    						        img_url: FPFile['url']
    						      },
    						      success: function( data ) {
    						      	$( "#response" ).html( "<strong>Done!</strong>" );
    						        drawCanvas(data);
    						      }
    						    });					    
    						  },
    						  function(FPError){
    						    console.log(FPError.toString());
    						    
    						  }
    						);
    						}
    				</script>
    			</form>	
		<p><input id="aviaryEdit" type='image' src='http://images.aviary.com/images/edit-photo.png' value='Edit photo' /></p>
    </div>
</div>

<div id='injection_site'></div>
  <script type="text/javascript" src="//api.filepicker.io/v1/filepicker.js"></script>
  </body>
</html>
