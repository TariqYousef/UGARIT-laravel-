<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\GreekTranslation;
use DB;
class MainController extends Controller
{

    public function TableOfContents()
    {
        $in=Input::all();
        $output="";
        if($in['typ']=="txt"){
	        $q="select *  from passage where textgroupid='".$in['tg']."'";
    	    $passages = DB::select($q);
    	    $output="<ul class='nav nav-list '>";
    	    foreach($passages as $key=>$p)
    	      $output.= "<li><label id='lbl".$p->id."' onclick='loadChunk(".$p->id.")'> <i class='icon-chevron-right'></i>  ".implode(" ",array_slice(explode(" ",$p->txt),0,5))." . . .</label></li>";
			$output.="</ul>";			
        }else{
        
        }
		echo $output;
    } 
    
    public function main()
    {
	    $in=Input::all();
    	return view("main",$in);
    }  
    
    public function LoadChunk()
    {
      $in=Input::all();
      $output="";
      $q="select * from passage where id=".$in['id'];
      $chunk=DB::select($q);
      $tokens=$this->tokenizeSentence($chunk[0]->txt);
      echo implode(" ",$tokens);      
    }
    
    private  function tokenizeSentence($txt)
	{
 		$txt=str_replace('،',',',$txt);
		$txt=str_replace('؛',';',$txt);
		$words = preg_split('/[\\s,:;.\[\]]+/',$txt,-1, PREG_SPLIT_NO_EMPTY);
 		preg_match_all('/[\\s,:;.\[\]]+/',$txt, $matches, PREG_PATTERN_ORDER);

 		$counter=0;
 		$return=array();
 		for($i=0;$i<sizeof($words);$i++)
		{
  			$return[$counter]=$words[$i];
  			$counter++;
  			if(isset($matches[0][$i]) && $matches[0][$i]!=" ") 
  			{
   				$return[$counter]=$matches[0][$i];
   				$counter++;
  			}
 		}
 		return $return;
	 }
}


?>