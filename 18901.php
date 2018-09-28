
<html>
<body>
<?php
$cache=opendir("/var/www/html/php1809");
$count=0;
$countarray=array();
while(($filename=readdir($cache))!==false){
	if(!preg_match('/^\./',$filename)){
		$countarray[$count]=$filename;
		echo "<form method=\"post\" name=\"form".$count."\" action=\"18902.php\" id=\"mform\">";
		echo  "<a href=\"javascript:document.form".$count.".submit();\">".$countarray[$count]."</a>";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
                echo "<a href=\"javascript:void(0);\"  onclick=\"fdel("."form".$count.")\">"."删除"."</a>";
		echo "<input type=\"hidden\" name=\"filename\" value=\"".$countarray[$count]."\"><br>";
                echo "<input type=\"hidden\" name=\"page\" value=\"".$_SERVER['PHP_SELF']."\">";
		$count++;
		echo "</form>";
	}}               
closedir($cache);
if(!empty($_POST['filename'])){
unlink($_POST['filename']);
echo "<script>location.href=\"".$_SERVER['PHP_SELF']."\";</script>";
}
?>
<form method="post" action="18902.php">
<input type="submit" value="New">
<input type="hidden" name="page" value="<?php echo $_SERVER['PHP_SELF'];?>">
</form>
<script>
function fdel(name){
name.action="<?php echo $_SERVER['PHP_SELF'];?>";
name.submit();

}
</script>
</body>
</html>
