<html>
<head>
	<title>Stuff</title>
	<link rel="stylesheet" href="http://jquery.com/demo/thickbox/thickbox-code/thickbox.css" type="text/css" media="screen" />
</head>
<? flush(); ?>
<body>
<?
	# Configuration
	$image_directory = "./_images";
	
	#Get Categories via folders
	$directories = array();
	$dirResult = scandir($image_directory);
	foreach ($dirResult as $directory) {
		 if ($directory === '.' or $directory === '..') continue;
		 if (is_dir($image_directory . '/' . $directory)) $directories[] = $directory;
	}
	
	#Get images from each directory.
	$images = array();
	foreach ($directories as $dir) {
		$imgResult = scandir($image_directory."/".$dir);
		foreach ($imgResult as $image) {
			if ($image === '.' or $image === '..') continue;
			if (is_dir($image_directory . '/' . $dir . '/' . $image)) continue;
			$ext = pathinfo($image_directory . '/' . $dir . '/' . $image, PATHINFO_EXTENSION);
			if ($ext == 'thumb') continue;
			if ( $ext != 'png' && $ext != 'jpg' && $ext != 'jpeg' && $ext != 'gif') continue;
			$images[$dir][] = $dir."/".$image;
		}
	}
	
	foreach ($images as $dir) {
		foreach ($dir as $img) {
			$a = explode (".",$img );
			if (in_array($a[1],array('gif','png'))) {
				echo "<a class='' href='view.php?f={$image_directory}/{$img}'><img class='lazy' width='150' height='150' src='grey.gif' data-original='{$image_directory}/{$img}' /></a>\n";
			} else {
				echo "<a class='' href='view.php?f={$image_directory}/{$img}'><img class='lazy' width='150' height='150' src='grey.gif' data-original='thumb.php?f={$image_directory}/{$img}' /></a>\n";
			}
		}		
	}
	
	/*
	echo "<pre style='display:block;'>";
	print_r($directories);
	print_r($images);
	echo "</pre>"; 
	*/
	
?>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://jquery.com/demo/thickbox/thickbox-code/thickbox-compressed.js"></script>
	<script type="text/javascript" src="js/jquery.lazyload.min.js" ></script>
	<script type="text/javascript" charset="utf-8">
		$(function() {
			 $("img.lazy").lazyload();
			 
		});
	</script>

</body>
</html>
