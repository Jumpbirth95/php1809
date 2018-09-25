<?php
$filename=$_POST['filename'];
$textcontent=$_POST['text'];
$newfile=$_POST['new'];
$handle=opendir("/var/www/html/php1809");
$count=0;
$fnameary=array();
while(($check=readdir($handle))!==false){
	if(!preg_match('/^\./',$check)){
$fnameary[$count]=$check;
$count++;
	}
}
closedir($handle);
$filenum=1;
if(empty($filename)){
	$filename=date("md").".php";
	for($i=0;$i<=count($fnameary);$i++){
		if($fnameary[$i]==$filename){
			$i=0;
			$filename=date("md").$filenum.".php";
			$filenum++;
//			echo $filename;
//			echo "<br>";
//			echo $filenum;
//			echo "<br>";	
//			echo $i;
//			echo "<br>";
//			echo count($fnameary);
//			echo "<br>";
		}	
		}	
}
if(!empty($textcontent)){
$file=fopen($filename,"w")or die('unable to open file');
fwrite($file,$textcontent);
fclose($file);
}
?>
<html>
<body>
<div class="div" align=center>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="form1" enctype="multipart/formdata">
<label for="file"><?php echo $GLOBALS["filename"]; ?></label>
<br>
<textarea rows="30" cols="100" id="text" name="text" >
<?php
$filename=$GLOBALS['filename'];
$contents=file_get_contents($filename);
if(!empty($contents)){
$contents=htmlspecialchars($contents);
echo $contents;
}
?>
</textarea>
<input type="hidden" name="filename" value="<?php echo $filename; ?>">
<br>
<input type="button" name="back" value="back" onclick="location='18901.php'" />
<input type="submit" name="save" value="Save"  />
</form>

</div>
</body>
</html>
