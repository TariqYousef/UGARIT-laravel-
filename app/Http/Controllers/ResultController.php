<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\GreekTranslation;
use DB;
class ResultController extends Controller
{
    /**
     
     */
    public function PrintParameters()
    {
        print_r(Input::all());
    }
    
    public function Results()
    {
        $in=Input::all();
		  return view("resultView",$in);	
    }
    
    
    public function GreekDiagram()
    {
        $in=Input::all();
        $in['language']="grc";
		  return view("diagramView",$in);	
    }
    
    
    public function LatinDiagram()
    {
        $in=Input::all();
        $in['language']="lat";
		  return view("diagramView",$in);	
    }
 

    public function LatinExamples()
    {
        $in=Input::all();
        $in['language']="lat";
		  return view("examplesView",$in);	
    }   
    
    public function sidebar()
    {
        $in=Input::all();
       	$q="SELECT TextGroups.id as id, title, Language, provider,typ ,TextGroups.lemma, TextGroups.pofs,TextGroups.infl,TextGroups.stem , 
       	`TextGroups`.`Entities` FROM `TextGroups`, MorphServiceProvider where TextGroups.morph=MorphServiceProvider.id and userid=".$in['uid'];
        $TG = DB::select($q);
        //print_r($TG);
        $parameters=["textgroups" => $TG];
		return view("dashboard",$parameters);	
    }   
}


?>