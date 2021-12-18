<?php
include'func.php';
$title='Top Track';
include'head.php';
if(!empty($_GET['page'])){
$noPage=$_GET['page'];
}else{
$noPage='1';
}
$json=json_decode(ngegrab('http://ws.audioscrobbler.com/2.0/?method=chart.gettoptracks&api_key=7df2ba528dcd0d495e3db6284ee6e1a3&format=json&limit=10&page='.$noPage.''));
if (!empty($json)){
foreach($json->tracks->track as $list){
$name=$list->name;
$artist=$list->artist->name;
echo'<div class="menu"><a href="/?q='.$artist.'+'.$name.'">'.$artist.' - '.$name.'</a></div>';}
echo '<div class="paging">';
if ($noPage > 1) {echo'<a href="?page='.($noPage-1).'">&laquo; Previous</a> - ';}
if ($noPage <= 100) {echo'<a href="?page='.($noPage+1).'">Next Page &raquo;</a> ';}
echo '</div>';
}else{echo'<div class="menu"><font color="red">Result Not Found, please use another keyword.</font></div>';}
include'foot.php';
?>
