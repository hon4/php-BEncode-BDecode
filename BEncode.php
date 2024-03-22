<?php
/* ╔══════════════════╗
   ║ php BEncode File ║
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

function BEncode($a){
	return BEncode_dict($a);
}
function BEncode_str($s){
	return strlen($s).":".$s;
}
function BEncode_int($i){
	return "i".$i."e";
}
function BEncode_dict($d){
	$keys=array_keys($d);
	$r="";
	foreach($keys as $key){
		$r.=BEncode_str($key);
		$r.=BEncode_core($d[$key]);
	}
	return "d".$r."e";
}
function BEncode_list($l){
	$keys=array_keys($l);
	$r="";
	foreach($keys as $key){
		$r.=BEncode_core($l[$key]);
	}
	return "l".$r."e";
}
function BEncode_core($x){
	$r="";
	if(is_int($x)){
		$r.=BEncode_int($x);
	}elseif(is_array($x)){
		$zk=array_keys($x);
		if(array_values($x) === $x){
			$r.=BEncode_list($x);
		}else{
			$r.=BEncode_dict($x);
		}
	}else{
		$r.=BEncode_str($x);
	}
	return $r;
}
?>