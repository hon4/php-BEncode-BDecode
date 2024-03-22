How to use:

-BEncode:
Code
```
<?php
require_once("BEncode.php");
$array["str"]="I am a string"; //String
$array["int"]=4; //Integer
$array["dict"]=array("FRST"=>"F1","SCND"=>"F2");
$array["list"]=array("L1","L2");
$BEncoded = BEncode($array);
echo $BEncoded;
?>
```
Output:
```
d3:str13:I am a string3:inti4e4:dictd4:FRST2:F14:SCND2:F2e4:listl2:L12:L2ee
```
