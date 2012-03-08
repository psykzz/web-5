<div style='width:90%;height:90%;'><?
$file = (isset($_REQUEST['f']))?$_REQUEST['f']:false;
if (!file_exists($file)) {
	exit; # Or show homepage / 404
}

$d = (isset($_REQUEST['d']))?true:false;
if ($d=='x') {
	unlink($file);
	echo 'deleted <br />';
}
$t = (isset($_REQUEST['t']))?true:false;
if ($t=='a') {
	unlink($file.".thumb");
	echo 'thumb deleted <br />';
}

echo "<img style='height:100%' src='{$file}'>";
echo "<br /> <a href='view.php?f={$file}&t=a'>delete thumb</a>";
echo "<br /> <a href='view.php?f={$file}&d=x'>delete this shit</a>";
?>
</div>