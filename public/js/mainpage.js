var currentText="";
var previousText="";				
var Start;
var currentValue;
var LastMove;	
var DATA;		
var SliderMaxValue=0;
var NumberOfWords=6;
var slider = new Slider("#ex6");
var ChunkId=1;
var prevChunk=0;
var currentChunk=1;



function loadChunk(i)
{    
    prevChunk=currentChunk;
    currentChunk=i;   
    currentValue=0;
    
    // Coloring the sidebar entries
    if(currentChunk!=-1)
	    $("#lbl"+prevChunk).addClass("NoClass");		// deal with previous chunk
    $("#lbl"+currentChunk).addClass("highlight");	 // deal with current chunk
 
 	ChunkId=i;
 	 //$("#title").load("getChunkPath.php?dir=<? echo $dir;?>&id="+i);
    $("#MainText").load("loadChunk?id="+i , function (data){
		currentText=data;
		console.log(""+data.split(' ').length+"/"+NumberOfWords);
		SliderMaxValue=Math.ceil(data.split(' ').length/NumberOfWords);
		console.log(SliderMaxValue);
		//$("#entities").html("");
		Entities=[];
		InterfaceGenerator(data,SliderMaxValue);
		
		// Highlight
		Start=0;
		highlightText(Start);    
		/*
		var mainText=data.split(' ').slice(0,Start).join(' ')+ "<span class='highlight'> "+
			data.split(' ').slice(Start,Start+NumberOfWords).join(' ') +" </span>"+ data.split(' ').slice(Start+NumberOfWords).join(' ');
            $("#MainText").html(mainText);	 
        
        // Highlight end    
		

		
		$("#slider_div").load("view/slider.php?max="+SliderMaxValue,function(data){
		
		slider = new Slider("#ex6");
		
		slider.on("slide", function(slideEvt) {
		    currentValue=slideEvt;
			Data=currentText;
			Start=NumberOfWords*(SliderMaxValue-slideEvt);
			//currentValue=Start;
			var mainText=Data.split(' ').slice(0,Start).join(' ')+ "<span class='highlight'> "+
			Data.split(' ').slice(Start,Start+NumberOfWords).join(' ') +" </span>"+ Data.split(' ').slice(Start+NumberOfWords).join(' ');
            $("#MainText").html(mainText);	    
		});	
		slider.on("slideStop", function(slideEvt) {
		currentValue=slideEvt;
	        InterfaceGenerator(currentText,slideEvt);      
		});	

		}); ;*/
	});
}

function highlightText(Start)
{
	data=currentText;
	var mainText=data.split(' ').slice(0,Start).join(' ')+ "<span class='highlight'> "+
	data.split(' ').slice(Start,Start+NumberOfWords).join(' ') +" </span>"+ data.split(' ').slice(Start+NumberOfWords).join(' ');
    $("#MainText").html(mainText);	 
}


function InterfaceGenerator(Data,St)
{
	currentValue=St;
	Start=SliderMaxValue-St;
	if(Start!=LastMove || Data!=previousText)
	{
	 LastMove=Start;
	 previousText=Data;

	 NumberOfWords=6;
	 Start=Start*NumberOfWords;
 
	 highlightText(Start);
 
	 // show the loading icon
	 for(i=1;i<=NumberOfWords;i++)
		 $("#w"+i).html("<img src='images/loading.gif'>");

	 // split the string
	 string=Data.split(' ').slice(Start,Start+NumberOfWords)
/*
	 // create the table
	 for(i=0;i< NumberOfWords;i++)
		if(string.length > i)  $("#w"+(NumberOfWords-i)).load('view/getmorph.php?tg=<? echo $_REQUEST["tg"]?>&block='+i+'&c='+ChunkId+'&ord='+(Start+i)+'&w='+string[i]); else  $("#w"+(NumberOfWords-i)).html("");
*/	 }

}


// TODO: don't go next if the marker at the end of sentence
function next()
{
	InterfaceGenerator(currentText,currentValue-1);
}

// TODO: don't go back if the marker at the start of sentence
function prev()
{
	InterfaceGenerator(currentText,currentValue+1);
}
