<?php
$path = "D:/Bhavya/"; 

$fullPath = $path.basename($_GET['download_file']);
$ext=array("mp4","ogg","avi","3gp","mp3","pdf","doc","docx","txt");

if (is_readable ($fullPath)) {
	$fsize = filesize($fullPath);
	$path_parts = pathinfo($fullPath);
	$ext = strtolower($path_parts["extension"]);
	switch ($ext) {
		case $ext:
			header("Content-type: application/$ext"); 
			header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");    
			break;
		default;
			header("Content-type: application/octet-stream");
			header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
	}
	header("Content-length: $fsize");
	header("Cache-control: private"); 
	readfile($fullPath);
	exit;
} else {
	die("Invalid request");
}
?>