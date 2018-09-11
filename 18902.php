<?php
$filename=$_GET['filename'];
$textcontent=$_GET['text'];
if(empty($filename)){
	$filename="Newfile".date("Ymd");
}
echo $filename;
if(!empty($textcontent)){
$file=fopen($filename,"w")or die('unable to open file');
fwrite($file,$textcontent);
fclose($file);
}
?>
<html>
<body>
<div class="div" align=center>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" name="form1" enctype="multipart/formdata">
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
<br>
<input type="button" name="back" value="back" onclick="back1()" />
<input type="submit" name="save" value="Save"  />
</form>
<script type="text/javascript">
function back1(){
	document.form1.action="18901.php";
	document.form1.submit();
}
</script>
</div>
</body>
</html>
