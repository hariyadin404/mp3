<?php
include'func.php';
if(!empty($_GET['genre'])){
$title='Genre of '.queryencode($_GET['genre']).'';
}elseif(!empty($_GET['q'])){
$title='Result for '.queryencode($_GET['q']).'';
}else{
$title='FREE download Music MP3';
}
include'head.php';
if(!empty($_GET['genre'])){
$genrer=str_replace(' ',',',strtolower($_GET['genre']));
$genrer=str_replace('_',',',$genrer);
$genrer=str_replace('-',',',$genrer);
}else{
$q=queryencode($_GET['q']);
}
if(!empty($_GET['page'])){
$noPage=$_GET['page'];
$page=($noPage-1)*10;
}else{
$noPage='1';
$page='0';
}
if(!empty($_GET['genre'])){
$json=json_decode(ngegrab('http://api.soundcloud.com/tracks.json?genres='.$genres.'&limit=10&offset='.$page.'&offset=0&client_id=c435ec96ae345d5ce32496d339fc291d'));
}else{
$json=json_decode(ngegrab('http://api.soundcloud.com/tracks.json?q='.str_replace(' ','-',$q).'&limit=10&offset='.$page.'&client_id=c435ec96ae345d5ce32496d339fc291d'));
}
if (!empty($json[0]->title)){
foreach($json as $list){
$id=$list->id;
$permalink=$list->permalink;
$name=$list->title;
$size=format_size(getfilesize(getlinkdl($id)));
$duration=format_time($list->duration/1000);
echo'<div class="menu"><a href="/download/'.$id.'/'.$permalink.'.html">'.$name.'.mp3</a><div>Size: '.$size.'<br />Duration: '.$duration.'</div></div>';}
echo '<div class="paging">';
if(!empty($_GET['genre'])){
if ($noPage > 1) {echo'<a href="?genre='.strtolower($_GET['genre']).'&amp;page='.($noPage-1).'">&laquo; Previous</a> - ';}
if (!empty($json[9])) {echo'<a href="?genre='.strtolower($_GET['genre']).'&amp;page='.($noPage+1).'">Next Page &raquo;</a> ';}
}else{
if ($noPage > 1) {echo'<a href="?q='.querydecode($q).'&amp;page='.($noPage-1).'">&laquo; Previous</a> - ';}
if (!empty($json[9])) {echo'<a href="?q='.querydecode($q).'&amp;page='.($noPage+1).'">Next Page &raquo;</a> ';}
}
echo '</div>';
}else{echo'<div class="menu"><font color="red">Result Not Found, please use another keyword.</font></div>';}
include'foot.php';
?>
