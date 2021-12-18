<?php
include'func.php';
$id=$_GET['id'];
$grab=json_decode(ngegrab('http://api.soundcloud.com/tracks/'.$id.'.json?client_id=c435ec96ae345d5ce32496d339fc291d'));
$duration=format_time($grab->duration/1000);
if(!empty($grab->genre)){
$genre=$grab->genre;
}else{
$genre='Unknown';
}
$name=$grab->title;
$size=format_size(getfilesize(getlinkdl($id)));
if(!empty($name) && !empty($_GET['id']) && !empty($_GET['permalink'])){
$title='Download '.$name.' ('.$size.')';
include'head.php';
echo'<div class="menu"><table><tr valign="top"><td width="30%">Name</td><td>:</td><td>'.$name.'.mp3</td></tr>
<tr valign="top"><td width="30%">Genre</td><td>:</td><td><a href="/?genre='.$genre.'">'.$genre.'</a></td></tr><tr valign="top"><td width="30%">Duration</td><td>:</td><td>'.$duration.'</td></tr><tr valign="top"><td width="30%">Size</td><td>:</td><td>'.$size.'</td></tr><tr valign="top"><td width="30%">Bitrate</td><td>:</td><td>128 kbps</td></tr>';
$permexp=explode('-',$grab->permalink);
echo'<tr valign="top"><td width="30%">Tag</td><td>:</td><td>';
foreach($permexp as $perma){
echo'<a href="/?q='.$perma.'">'.ucfirst($perma).'</a>, ';
}
echo'</td></tr>';
$ttag=clearspace($genre);
$tgrab=json_decode(ngegrab('http://ws.audioscrobbler.com/2.0/?method=tag.getsimilar&tag='.strtolower($ttag).'&api_key=7df2ba528dcd0d495e3db6284ee6e1a3&format=json'));
$tjumlah=count($tgrab->similartags->tag)-1;
if($tjumlah < 10){
$tcount=$tjumlah;
}else{
$tcount='9';
}
if(!empty($tgrab->similartags->tag[0]->name)){
echo'<tr valign="top"><td width="30%">Other Genre</td><td>:</td><td>';
for($i=0;$i<=$tcount;$i++){
echo'<a href="/?genre='.$tgrab->similartags->tag[$i]->name.'">'.$tgrab->similartags->tag[$i]->name.'</a>, ';
}
echo'</td></tr>';
}
echo'<tr valign="top"><td width="30%">Download/Play</td><td>:</td><td><a href="'.getlinkdl($id).'" rel="nofollow">Download</a> | <a href="https://api.soundcloud.com/tracks/'.$id.'/stream?client_id=c435ec96ae345d5ce32496d339fc291d" rel="nofollow" target="_blank">Play</a></td></tr></table></div><div class="adv"><a href="http://ewapi.com/?id=wapgolus" rel="nofollow" target="_blank">Free Download Mp3</a></div>';
echo'<div class="menu"><!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_compact"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-534c6a746626d444"></script>
<!-- AddThis Button END --></div>';
echo'<div class="menu">
URL:<br />
<input type="text" value="http://www.wapgol.us/download/'.$_GET['id'].'/'.$_GET['permalink'].'.html" /><br />HTML Code:<br />
<input type="text" value="&lt;a href=&quot;http://www.wapgol.us/download/'.$_GET['id'].'/'.$_GET['permalink'].'.html&quot;&gt;'.$name.' ('.$size.')&lt;/a&gt;" /><br />BB Code:<br />
<input type="text" value="[url=http://www.wapgol.us/download/'.$_GET['id'].'/'.$_GET['permalink'].'.html]'.$name.' ('.$size.')[/url]" /><br /></div>';
$genrer=str_replace(' ',',',$genre);
$genrer=str_replace('_',',',$genrer);
$genrer=str_replace('-',',',$genrer);
$jsonr=json_decode(ngegrab('http://api.soundcloud.com/tracks.json?genres='.strtolower($genrer).'&limit=8&offset=0&client_id=c435ec96ae345d5ce32496d339fc291d'));
if (!empty($jsonr[0]->title)){
echo'<div class="menu"><h4>Related</h4><ul class="related">';
foreach($jsonr as $list){
$idr=$list->id;
$permalinkr=$list->permalink;
$namer=$list->title;
echo'<li><a href="/download/'.$idr.'/'.$permalinkr.'.html">'.$namer.'.mp3</a></li>';}
echo'</ul></div>';
}
}else{
$title='Not Found';
include'head.php';
echo'<div class="menu">Sorry, file not found.</div>';
}
include'foot.php';
?>
