<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>InstaTrip</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
    <link href="../css/dark-hive/jquery-ui-1.10.2.custom.css" rel="stylesheet">
    <script src="../js/jquery-1.9.1.js"></script>
    <script src="../js/jquery-ui-1.10.2.custom.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Scada:700' rel='stylesheet' type='text/css'>
    <style>
		html,body{ margin:0; padding:0; height:100%; width:100%; font: 16px 'Helvetica Neue',Arial,sans-serif;}
    	.topmenu{
    		background: url(images/background2.png) no-repeat center top;
			background-size:200%;	
			text-align:center;
			padding: 5px;
		}
		.topmenu h1 {
			margin:0;
			padding:0;
			font-family: 'Scada', sans-serif;	
			font-size:30px;
			text-shadow: 0 0 15px rgba(255,255,255, 0.8);
			color:#fff;
		}
    </style>
  </head>
  <body>
     <div class="topmenu">
      <h1>InstaTrip</h1>

      <?php if (isset($menu)) { ?>
        <?php echo $menu; ?>
      <?php } ?>
    </div>
    <?php if (isset($status_text)) { ?>
      <?php echo '<h3>'.$status_text.'</h3>'; ?>
    <?php } ?>
    <p style="margin:0 auto; text-align:center;">
      <!-- Output the JSON here son! -->
        <?php   
        if(isset($content->photos)){
        	$photos = $content->photos;
        	$count = 0;
        	foreach ($photos as $val){
        		echo '
        		<a href="#"><img class="" src="'.$val->{'image_url'}.'" height="200px" onclick="openDialogue($(this));" ></a>';
        	}
        	
        }else {
        	print_r($content);
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
       tools: 'effects,saturation,stickers,enhance,frames,crop,focus,contrast,warmth,warmth,splash,brightness',
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
     resizable: true,
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
       
       
       console.log(photo.attr("src"));
       	   $.ajax({
       	     url: "/showboater/copy2.php",
       	     data: {
       	       imgurl: photo.attr("src"),
       	     },
       	     success: function( data ) {
       	     	$("#selected_image").attr("src", data);
       	     	console.log($("#selected_image").attr("src"));
       	     	background_image = $("#selected_image").attr("src");
       	     }
       	   });
       return false;
   }
</script>

                  
<div id="dialog" title="Insert You">
    <div class="dialog_image">
    	<img id="selected_image" src=""/ height="500px">
    	<img id="avatar_add" src="avatar_grey.png" onclick="openFilePicker()"/>
    				<div id="response"></div>
					<div id="messages"></div>
    				<div id="container"></div>
    				    <script src="http://d3lp1msu2r81bx.cloudfront.net/kjs/js/lib/kinetic-v4.4.0.min.js"></script>
    				    <script defer="defer">
    				    
    				    
    				    function drawCanvas(dataurl){
    				    
    				    	$("#selected_image").hide();
    				    	$("#aviaryEdit").show();
    				    	
    				    	var background_src = $("#selected_image").attr("src");
    				    	
    				    	var background = new Image();
    				    	var person = new Image();
    				    	
    				    	
    				    	person.onload = function() {
    				    		
    				    	}
    				    	
    				    	background.src = background_src;
    				    	
    				    	var stage = new Kinetic.Stage({
    				    	      container: "container",
    				    	      width: 800,
    				    	      height: 600
    				    	    });
    				    	    
    				    	background.onload = function() {
    				    		    
    				    		    var background_layer = new Kinetic.Layer();
    				    		
    				    		    // darth vader
    				    		    var background_image = new Kinetic.Image({
    				    		      image: background,
    				    		      x: 0,
    				    		      y: 0,
    				    		      width: 500*(background.width/background.height),
    				    		      height: 500,
    				    		      draggable: false
    				    		    });
    				    		
    				          	    
    				          	    var person_layer = new Kinetic.Layer();
    				          	
    				          	    // darth vader
    				          	    var person_image = new Kinetic.Image({
    				          	      image: person,
    				          	      x: stage.getWidth() / 2,
    				          	      y: stage.getHeight() / 2,
    				          	      width: 500*.60*(person.width/person.height),
    				          	      height: 500*.60,
    				         	      draggable: true
    				          	    });
    				          	
    				          	    // add cursor styling
    				          	    person_image.on('mouseover', function() {
    				          	      document.body.style.cursor = 'pointer';
    				          	    });
    				          	    person_image.on('mouseout', function() {
    				          	      document.body.style.cursor = 'default';
    				          	    });
    				          	    
    				          	    stage.setWidth(500*(background.width/background.height));
    				          	    stage.setHeight(500);
    				          		
    				          		background_layer.add(background_image);
    				          		stage.add(background_layer);
    				          	    person_layer.add(person_image);
    				          	    stage.add(person_layer);
    				          };
    				          
    				          document.getElementById('aviaryEdit').addEventListener('click', function() {
    				                  /*
    				                   * since the stage toDataURL() method is asynchronous, we need
    				                   * to provide a callback
    				                   */
    				                  stage.toDataURL(
    				                  {
    				                    callback: function(dataUrl) 
    				                    {
    				                    $( "#container").hide();
				                    	$( "#response" ).html( '<img id="aviary_image" src="' + dataUrl + '"/>' );
				                        	launchEditor('aviary_image', dataUrl);    						      	
    				                   	},
    				                   mimeType: 'image/jpeg'
    				               	}, false);
    				          });
    				          
    				          
    				          person.src = dataurl;
    				    }	
    				    
    				    
    				    function aviaryEdit(dataurl)
    				    {
    				    	$("aviaryEdit").hide();
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
    						    $( "#messages" ).html( "<strong>Faking your trip... <img src='../images/loading_transparent.gif'></strong>" );
    						    $( "#messages" ).show();
    						    $( "#messages" ).css("padding","10px");
    						    $("#avatar_add").fadeOut();
    						    console.log(FPFile['url']);
    						    $.ajax({
    						      type: "GET",
    						      url: "/showboater/remove.php",
    						      data: {
    						        img_url: FPFile['url']
    						      },
    						      success: function( data ) {
    						      	$( "#response" ).html( "<strong>Done!</strong>" );
    						      	$( "#messages" ).hide();
    						      	
    						        drawCanvas(data);
    						      }
    						    });
    						    
    						  },
    						  function(FPError){
    						    console.log(FPError.toString());
    						    
    						  }
    						);
    						}
    						
    					function convertAviary(){
    						$("#sincerelyEdit").show();
    						console.log($("#aviary_image").attr("src"));
    						$.ajax({
    						  type: "GET",
    						  url: "/showboater/copy.php",
    						  data: {
    						    imgurl: $("#aviary_image").attr("src")
    						  },
    						  success: function( data ) {
    						  	console.log(data);
    						  	sendSincerely(data);
    						  }
    						});
    					}
    					
    					function sendSincerely(img_url){
    					console.log(img_url);
	    					$.ajax({
	    					  type: "POST",
	    					  url: "/showboater/sincerely.php",
	    					  data: {
	    					    url: img_url
	    					  },
	    					  success: function( data ) {
	    					  	$( "#response" ).html( data );
	    					  	console.log(data);
	    					  }
	    					});
    					}
    				</script>
    			</form>	
		<p><input  id="aviaryEdit" type='image' src='http://images.aviary.com/images/edit-photo.png' value='Edit photo' /></p>
		<p><input  id="sincerelyEdit" type='image' width='75px' src='../images/sincerely_logo.png' value='Send photo' onclick='convertAviary()'/></p>
    </div>
</div>

<div id='injection_site'></div>
  <script type="text/javascript" src="//api.filepicker.io/v1/filepicker.js"></script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  
    ga('create', 'UA-39941507-1', 'seantburke.com');
    ga('send', 'pageview');
  
  </script>
  </body>
</html>
