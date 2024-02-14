<?php 
//This will get an array of all the gif, jpg and png images in a folder 
$img_array = glob("",GLOB_BRACE); 
 
//Domain Setting
$domain = 'jpg.bfeyy.cloudns.org';
 
//Pick a random image from the array 
$img = array_rand($img_array); 
 
//XML Return
function array2xml($array, $wrap='ROOT', $upper=true) {
    // set initial value for XML string
#    $xml = '';
    // wrap XML with $wrap TAG
    if ($wrap != null) {
        $xml = "<$wrap>\n";
    }
    // main loop
    foreach ($array as $key=>$value) {
        // set tags in uppercase if needed
        if ($upper == true) {
            $key = strtoupper($key);
        }
        // append to XML string
        $xml .= "<$key>" . htmlspecialchars(urldecode(trim($value))) . "</$key>";
    }
    // close wrap TAG if needed
    if ($wrap != null) {
        $xml .= "\n</$wrap>\n";
    }
    // return prepared XML string
    return $xml;
}
 
//Result Generate
$result['error']=0;
$result['result']=500;
$result['img']='//'.$domain.'/'.$img_array[$img];
 
//Type Choose
$type=$_GET['type'];
switch ($type)
{
//IMG
default:
header("Location:".$result['img']);
break;

}
?>
