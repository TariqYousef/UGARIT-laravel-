<? 
$dir="ltr";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.head')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.js"></script>
  </head>
<body style="font-family: 'Roboto Condensed', sans-serif;background-color:#515151;height:100%">

<ul class='custom-menu'>
  <li data-action = "first">Person</li>
  <li data-action = "second">Book</li>
  <li data-action = "third">Place</li>
</ul>
  
<div style="background-color:#FFFFFF;width:95%; margin:auto;border-radius: 15px;">      
        <!-- Wrapper Class for Responsive Footer -->
<div class="wrapper left" style=" margin:auto">
<!-- navbar -->
        @include('includes.nav')
<!-- END NAVBAR -->
<div class="row"  style="height:500px; padding:5px;width:100%;margin:auto">
<!-- Start of The narrow div -->  
  <div class="col-xs-5 col-md-3">
    <!-- Start Fragments -->   
 <div class="panel panel-default">
      <div class="panel-heading" style="background-color:#c83025;color:#FFF">
        <div class="panel-title">Table Of Contents </div>
        
      </div>
      <div class="panel-body" id="sidenav" style="overflow-y: scroll; overflow-x: hidden; height: 800px">      
      <? //include('view/side_nav.php');
      ?><div style="margin:auto"><img src='images/loading.gif' width="200">
      
      </div>
      </div>
</div>

</div>
<!-- End of The narrow div -->  

<!-- The wide div -->
  <div class="col-xs-13 col-md-9">

	    <div ">	
         <div class="panel panel-default">
      <div class="panel-heading" style="background-color:#515151;color:#FFF">
        <div class="panel-title" id="title" style="text-align: right;" > </div>        
      </div>
      <div class="panel-body" id="nav" style="overflow-y: scroll; overflow-x: hidden;">      
		<div id="MainText" class="mainText" style="direction:<? echo $dir;?>"> </div>
		</div>
		</div>	
	</div>	

	  <!-- Silder -->
	<div id="slider_div">
		<center>
			<input id="ex6" type="text" data-slider-min="0" data-slider-max="1" data-slider-step="1" tooltip="hide" data-slider-value="6" dir="<? echo $dir;?>"> 	
		</center>	
	</div>
	<!-- End silder -->

         <div class="panel panel-default">
      <div class="panel-heading" >
        <div class="panel-title" style="padding:0;">
 <button type="button" class="btn btn-success" onclick="save()"> <span class="glyphicon glyphicon-floppy-disk"></span> Save </button>
 <button type="button" class="btn btn-info" onclick="editall()"> <i class='fa fa-pencil-square-o' ></i> Edit All </button>
 
  <button type="button" class="btn btn-default" onclick="next()" >  <i class='glyphicon glyphicon-chevron-left' ></i> Next </button>
  <button type="button" class="btn btn-default" onclick="prev()" > Previous <i class='glyphicon glyphicon-chevron-right' ></i>  </button>
  
</div>        
      </div>
            <div class="panel-body" id="nav" style="overflow-y: scroll; overflow-x: hidden;">  
<!-- Zoom Text -->
<div id="ZoomText" class="zoomText"> 
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-4 col-md-2" id="w1" dir="<? echo $dir;?>"></div>
		<div class="col-xs-4 col-md-2" id="w2" dir="<? echo $dir;?>"></div>
		<div class="col-xs-4 col-md-2" id="w3" dir="<? echo $dir;?>"></div>
		<div class="col-xs-4 col-md-2" id="w4" dir="<? echo $dir;?>"></div>
		<div class="col-xs-4 col-md-2" id="w5" dir="<? echo $dir;?>"></div>
		<div class="col-xs-4 col-md-2" id="w6" dir="<? echo $dir;?>"></div>
	</div>
</div>
</div>
<!--End Zoom Text-->
</div>

  
  </div>
<!-- End of The wide div -->  


      </div>



</div>

<div>



<!-- End -->

   <div class="push"> </div>
</div>
  
  
   <div id="footer" style="border-radius: 5px;">
   		<font size="2" color="#888">Alexander von Humboldt-Lehrstuhl f&uuml;r Digital Humanities - Creative Commons Attribution-ShareAlike 4.0 International License &#169;	2015 </font>            
   	</div>
    
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

				<script type='text/javascript' src="js/jquery.min.js"></script>
				<script type='text/javascript' src="js/bootstrap-slider.js"></script>
				<script type='text/javascript' src="js/mainpage.js"></script>
                <script language="javascript">
		// Without JQuery
	$(document).ready(function() {
		loadSideNav();
		var NumberOfWords=6;
		//loadChunk(1);
	});	

function loadSideNav() {
	var url="sidebar?typ=<? echo $_REQUEST['typ'];?>&tg=<? echo $_REQUEST['tg'];?>";
	console.log(url);
	$("#sidenav").load(url,function () {
		$('label.tree-toggler').click(function () {
		$(this).parent().children('ul.tree').toggle(300);
	});	
	});
}
				
			    </script>
  </body>
</html>