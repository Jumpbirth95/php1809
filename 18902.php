<?php
$filename=$_POST['filename'];
$textcontent=$_POST['text'];
$newfile=$_POST['new'];
$handle=opendir("/var/www/html/php1809");
$count=0;
$fnameary=array();
while(($check=readdir($handle))!==false){
$fanmeary[$count]=$check;
$count++;
}
if(empty($filename)){
	$filename=date("md").".php";
	echo $filename;
	for(i=0;i<count($fnameary);i++){
		if($fnameary[$count]==$filename){
			break;
		}	
		}	

		closedir($handle);
if(empty($filename)&&$newfile="new"){
	$filename=date("md").".php";
	while(($check=readdir($handle))!==false){
		if($check==$filename){
			$filename=date("md").$count."1";
			break;
		}	
}
	echo $filename;
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
<label for="file">Text</label>
<br>
<textarea rows="30" cols="100" id="text" name="text" >
<?php
$filename=$GLOBALS['filename'];
$contents=file_get_contents($filename);
if(!empty($contents)){
$contents=htmlspecialchars($contents);
echo $contents;
}else{
echo "Can't read file";
}
?>
</textarea>
<input type="hidden" name="filename" value="<?php echo $filename; ?>">
<br>
<input type="button" name="back" value="back" onclick="location='18901.php'" />
<input type="submit" name="save" value="Save"  />
<input type="button" name="layertest" value="layer" onclick="layertest();">
</form>
<script type="text/javascript" src="layer.js">
</script>
<script>
function layertest(){
layer.msg("12312");};
</script>

</div>
</body>
</html>
