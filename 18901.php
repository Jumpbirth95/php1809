<?php
$cache=opendir("/var/www/html/php1809");
$count=0;
$countarray=array();
while(($filename=readdir($cache))!==false){
	if(!preg_match('/^\./',$filename)){
		$countarray[$count]=$filename;
		echo "<form method=\"post\" name=\"form".$count."\" action=\"18902.php\" id=\"mform\">";
		echo  "<a href=\"javascript:document.form".$count.".submit();\"   >".$countarray[$count]."</a>";
		echo "<input type=\"hidden\" name=\"filename\" value=\"".$countarray[$count]."\"><br>";
		$count++;
		echo "</form>";
	}}
$num=1;                
echo "<form method=\"post\" name=\"newform\" action=\"18902.php\" >
        <input type=\"submit\" name=\"new\" value=\"new\">
	</form>";
closedir($cache);
?>

