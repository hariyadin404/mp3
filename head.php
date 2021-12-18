<html>
<head>
<meta name="google-site-verification" content="9PS1Kp_9dYzBNYpg-c6msKYfyOm6WXlLcjSWfEok1tQ" />
<title><?php echo $title; ?> | WapGol.US</title>
<meta forua="true" http-equiv="Cache-Control" content="max-age=0" />
<meta http-equiv="content-type" content="text/html ; charset=UTF-8"/>
<link rel="shortcut icon" href="/favicon.png" type="img/x-icon" />
<meta name="author" content="WapGol" />
<meta name="keywords" content="Free, Media, File, Search, Engine, Mp3, lagu, Music, Musik, Terbaru, Indo, Hits, Chart, Dangdut, Pop" />
<meta name="description" content="Free Media Music Search Engine" />
<meta name="robots" content="INDEX,FOLLOW" />
<style>
<?php
include'style.css';
?>
</style>
</head>
<body>
<div id="container">
<div id="header">
<a href="/">WAPGOL.US</a></div>
<div id="content">
<h1 class="title">
<?php echo $title; ?>
</h1>
<?php
if(!empty($_GET['id']) && !empty($_GET['permalink'])){
echo'<p id="breadcrumb"><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="/" rel="v:url" property="v:title">Home</a></span> &#187; <span typeof="v:Breadcrumb"><a href="/?genre='.$genre.'" rel="v:url" property="v:title">'.$genre.'</a></span> &#187; <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title">'.$title.'</span></span></span></p>';
}
?>
<div class="menu">
<form class="search" action="/" method="get"><input type="text" name="q" value="<?php echo queryencode($_GET['q']); ?>" /> <input type="submit" value="search" />
</form>
</div>
<div class="adv">
<a href="http://ewapi.com/?id=wapgolus" target="_blank" rel="nofollow"><?php echo $ad[0]; ?></a>
</div>
