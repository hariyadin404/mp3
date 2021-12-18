<?php
include'func.php';
$title='Dangdut Indonesia';
include'head.php';
if(!empty($_GET['page'])){
$noPage=$_GET['page'];
}else{
$noPage='1';
}
$grab=urldecode(ngegrab('http://mobileproxy.mobi/index2.php?i=1&u=http%3A%2F%2Fcipcup.com%2Ffull_mp3%2Fshowcategory.jsp%3Fc%3Diddangdut%26pageid%3D'.$noPage.''));
$exp=explode('&#187; <a href="index2.php?i=1&amp;u=http://cipcup.com/download',$grab);
$exp2=explode(')',$exp[0]);
$exp3=explode('(',$exp2[0]);
$exp4=explode('/',$exp3[1]);
$jumlah=$exp4[1];
for($i=1;$i<=10;$i++){
$exp5=explode('</a>',$exp[$i]);
$exp6=explode('">',$exp5[0]);
$name=$exp6[1];
echo'<div class="menu"><a href="/?q='.$name.'">'.$name.'</a></div>';
}
echo '<div class="paging">';
if ($noPage > 1) {echo'<a href="?page='.($noPage-1).'">&laquo; Previous</a> - ';}
if ($noPage <= $jumlah) {echo'<a href="?page='.($noPage+1).'">Next Page &raquo;</a> ';}
echo '</div>';
include'foot.php';
?>
