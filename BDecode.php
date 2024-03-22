<?php
/* ╔══════════════════╗
   ║ php BDecode File ║
   ╚══════════════════╝
   │ Coded by: hon
   │ Date: 22-03-2024
   │ Version: 1.0.0 (b1)
   │ hon-code.blogspot.com
   │ honcode.blogspot.com
   │ github.com/hon4
   │ sourceforge.net/u/hon
   └──────────────────>
*/ 

function BDecode($s){
	list($r,$s)=BDecode_dict($s);
	return $r;
}
function BDecode_str($s){
	$l=(int)substr($s,0,strpos($s,":"));
	return [substr($s,$z=strlen($l)+1,$l),substr($s,$z+$l)];
}
function BDecode_int($i){
	$p=strpos($i,"e");
	return [substr($i,1,$p-1),substr($i,$p+1)];//offset 1 - no need for 'i' search
}
function BDecode_dict($d){
	$r=array();
	$key="";
	$d=substr($d,1);//rm 'd'
	while(true){
		if(!$key){
			if(is_numeric(substr($d,0,1))){
				list($key,$d)=BDecode_str($d);
				if(!$key)
					break;
			}else{
				break;
			}
		}

		if(substr($d,0,1)=="i"){
			list($r[$key],$d)=BDecode_int($d);
			$key="";
		}elseif(substr($d,0,1)=="d"){
			list($r[$key],$d)=BDecode_dict($d);
			$key="";
		}elseif(substr($d,0,1)=="l"){
			list($r[$key],$d)=BDecode_list($d);
			$key="";
		}elseif(substr($d,0,1)=="e"){//end
			break;
		}else{
			list($r[$key],$d)=BDecode_str($d);
			$key="";
		}
	}
	$d=substr($d,1); //rm 'e'
	return [$r,$d];
}
function BDecode_list($d){
	$r=array();
	$d=substr($d,1);//rm 'l'
	while(true){
		if(substr($d,0,1)=="i"){
			list($r[],$d)=BDecode_int($d);
		}elseif(substr($d,0,1)=="d"){
			list($r[],$d)=BDecode_dict($d);
		}elseif(substr($d,0,1)=="l"){
			list($r[],$d)=BDecode_list($d);
		}elseif(substr($d,0,1)=="e"){//end
			break;
		}else{
			list($r[],$d)=BDecode_str($d);
		}
	}
	$d=substr($d,1); //rm 'e'
	return [$r,$d];
}

?>