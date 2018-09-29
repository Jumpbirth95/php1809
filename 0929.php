<html>
<body>
<?php
$dbconnect=mysqli_connect('localhost:3306','ll','316','php');
if(mysqli_connect_error()){
die('Connect failed '.mysqli_connect_error());}
$cache=opendir("/var/www/html/php1809");
$count=0;
$countarray=array();
echo "<table>";
while(($filename=readdir($cache))!==false){
	if(!preg_match('/^\./',$filename)){
		$countarray[$count]=$filename;
		mysqli_select_db($dbconnect,'php');
                $sql="insert into FileList(filename)values('$filename');";
		$sqlcheck="select * from FileList where filename='$filename';";
                $result=mysqli_query($dbconnect,$sqlcheck);
		if(mysqli_num_rows($result)==0){
			mysqli_query($dbconnect,$sql);
		}
		echo mysqli_error($dbconnect);
		echo "<tr>";
		echo "<form method=\"post\" name=\"form".$count."\" action=\"18902.php\" >";
		echo "<td>";
		echo  "<a href=\"javascript:document.form".$count.".submit();\">".$countarray[$count]."</a>";
		echo "</td>";
		echo "<td>";
                echo "<a href=\"javascript:void(0);\"  onclick=\"fdel("."form".$count.")\">"."删除"."</a>";
		echo "</td>";
		echo "<input type=\"hidden\" name=\"filename\" value=\"".$countarray[$count]."\">";
                echo "<input type=\"hidden\" name=\"page\" value=\"".$_SERVER['PHP_SELF']."\">";
		$count++;
		echo "</form>";
		echo "</tr>";
	}} 
echo "</table>";    
closedir($cache);
$fdelname=$_POST['filename'];
if(!empty($fdelname)){
unlink($fdelname);
mysqli_query($dbconnect,"delete from FileList where filename='$fdelname';");
echo mysqli_error($dbconnect);
echo "<script>location.href=\"".$_SERVER['PHP_SELF']."\";</script>";
}
mysqli_close($dbconnect);          
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
