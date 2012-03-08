<?
$file = (isset($_REQUEST['f']))?$_REQUEST['f']:false;

include('functions.php');

#see if we can do a quick thumb?
if (!file_exists($file.".thumb")) {
	thumbnail($file,$file.".thumb",300,300);
}
if (file_exists($file.".thumb")) {
	$file = $file.".thumb";
} else {
	thumbnail($file,$file.".thumb",300,300);
}
$details = getimagesize($file);
//header('Cache-Control: private')
//header("Expires: Sat, 26 Jul 2050 05:00:00 GMT");
header('Content-Type: '.$details['mime'] );
echo $o = file_get_contents($file);
?>