<?php


function name_change($sName){
    
    mb_internal_encoding('UTF-8');
    
    $aEnds = array ("as", "us", "ys", "is","ė");
    $aEndRep= array ("ai", "au", "y", "i","e" );
    
    $sName=trim(mb_strtolower($sName));    
    $sName=  str_replace("-"," ",$sName);
    $sName=  str_replace(","," ",$sName);
    $sName=  str_replace("  "," ",$sName);
    $aNames = explode (' ', $sName);
   
    $sName="";
        
    foreach($aNames as $sFName){
        
         if(mb_substr($sFName, -1, 1 )=="ė"){
             $sEnd="ė";
         }
         else{
             $sEnd=mb_substr($sFName, -2, 2 );   
         }     
              
         if(in_array($sEnd, $aEnds)){
             $sRep=str_replace( $aEnds, $aEndRep, $sEnd);
             $sName.=mb_ucfirst(mb_substr($sFName, 0, mb_strlen($sFName)-mb_strlen($sEnd)).$sRep)." ";
         }
         else{
             $sName.=mb_ucfirst($sFName)." ";
         }
    }
    
    return $sName;
}