<?php
$cache=opendir("/var/www/html/Test");
$count=0;
$countarray=array();
while(($filename=readdir($cache))!==false){
	if($filename!=".." && $filename!="."){

		$countarray[$count]=$filename;
		echo "<form method=\"get\" name=\"form".$count."\" action=\"18902.php\" id=\"mform\">";
		echo  "<a href=\"javascript:document.form".$count.".submit();\"   >".$countarray[$count]."</a>";
		echo "<input type=\"hidden\" name=\"filename\" value=\"".$countarray[$count]."\"><br>";
		$count++;
		echo "</form>";
	}}
                 
		
closedir($cache);
?>

