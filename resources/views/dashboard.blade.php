<?
$active="<i class='glyphicon glyphicon-ok' style='color:green'></i>";
$notactive="<i class='glyphicon glyphicon-remove' style='color:red'></i>";
?>
<!doctype html>
<html>
<head>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<link href="css/style.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>    <!-- FA-Icons -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

	<link rel="icon" type="image/png" href="images/Logo.png">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="css/bootstrap-slider.css" rel="stylesheet">	
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">    
    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">  
	<link class="cssdeck" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
	<link class="cssdeck" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css">
</head>
<body style="font-family: 'Roboto Condensed', sans-serif;background-color:#515151;height:100%">

<div style="background-color:#FFFFFF;width:95%; margin:auto;border-radius: 15px;">      
        <!-- Wrapper Class for Responsive Footer -->
<div class="wrapper left" style=" margin:auto">
<!-- navbar -->
        @include('includes.nav')
<!-- END NAVBAR -->
<div style=" margin:auto;width:95%;">
<div class="row">
  <div class="col-md-7">
  <div style="margin: auto;padding:10px;">
 
<div class="btn-group" role="group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="glyphicon glyphicon-plus"></i> Add new text 
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="addText.php?op=upload" ><i class="glyphicon glyphicon-upload"></i>  Upload your own text</a></li>
      <li><a href="addText.php?op=import" ><i class="glyphicon glyphicon-import"></i> Import from CTS Repository</a></li>
    </ul>

  </div>
  
   <table class="table table-hover table-condensed"> 
  		<thead> <tr><th>Delete</th> <th>#</th> <th>Textgroup</th> <th>Laguage</th><th># Passages</th><th># Words</th><th>Lemma</th><th>POS</th><th>Inflections</th><th>NE</th><th>Browse</th> </tr> </thead>
  		<tbody> <?
  		foreach($textgroups as $k=>$v){
  		$url="main?typ=".$v->typ."&tg=".$v->id; ?>
  		<tr>
  			<th>Delete</th> <th>#</th> <th><a href="{{$url}}">{{$v->title}}</a></th> 
  			<th>{{$v->Language}}({{$v->provider}})</th>
  			<th># Passages</th>
  			<th># Words</th>
  			<th><? if($v->lemma==1) echo $active; else echo $notactive; ?></th>
  			<th><? if($v->pofs==1) echo $active; else echo $notactive; ?></th>
  			<th><? if($v->stem==1) echo $active; else echo $notactive; ?></th>
  			<th><? if($v->Entities!="") echo $active; else echo $notactive; ?></th>
  			<th><a href="{{$url}}">Browse</a></th> 
  		</tr>
  		<? } ?>	
  		</tbody>
  	</table>
  </div>
  </div>

  <div class="col-md-3"><div style="margin: auto;padding:10px;"><h3>Most frequent Entities</h3>
    <table class="table table-hover table-condensed"> 
  		<thead> <tr> <th>#</th> <th>Entity</th> <th>Type</th> <th>Freq</th> </tr> </thead> 
  		<tbody> 

  		</tbody> 
  	</table>
  </div></div>
  <div class="col-md-2"><div style="margin: auto;padding:10px;"><h3>Most frequent words</h3>
      <table class="table table-hover table-condensed"> 
  		<thead> <tr> <th>#</th> <th>Word</th> <th>Frequency</th>  </tr> </thead> 
  		<tbody> 

  		</tbody> 
  	</table>
  	</div>

</div>
</div>

</div>

<div>
<!-- End -->
   <div class="push"> </div>
</div>

  
   <div id="footer" style="border-radius: 5px;">
   		<font size="2" color="#888">Alexander von Humboldt-Lehrstuhl f&uuml;r Digital Humanities - Creative Commons Attribution-ShareAlike 4.0 International License &#169;	2015 </font>            
   	</div>
    


</div>
</div>
</body>
</html>