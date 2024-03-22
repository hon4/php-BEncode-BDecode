How to use:

-BEncode:
```
require_once("BEncode.php");
$array["str"]="I am a string"; //String
$array["int"]=4; //Integer
$array["dict"]=array("FRST"=>"F1","SCND"="F2");
$array["list"]=array("L1","L2");
$BEncoded = BEncode($array);
echo $BEncoded;
```
