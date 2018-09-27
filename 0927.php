<?php 
$filename=$_POST['filename'];
echo $filename;
try{
unlink($filename);
}catch(Exception $e){
echo $e->getMessage();
}
?>
