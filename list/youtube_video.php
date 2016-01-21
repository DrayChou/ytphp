<?php
/*
*@author Magyar András
*Copyright (c) 2015 Magyar András
*
*Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
*
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
*
*THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
本程序为二次开发！
*
*/
require_once'../inc/info.php';

header('Access-Control-Allow-Origin: *');
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<!--[if lt IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Magyar András">

    <title><?php echo $title;?></title>
	
</head>
<body>

<style>

/* Source: http://bootsnipp.com/snippets/featured/video-list-thumbnails */

.video-list-thumbs{}
.video-list-thumbs > li{
    margin-bottom:12px
}
.video-list-thumbs > li:last-child{}
.video-list-thumbs > li > a{
	display:block;
	position:relative;
	background-color: #212121;
	color: #fff;
	padding: 8px;
	border-radius:3px
}
.video-list-thumbs > li > a:hover{
	background-color:#000;
	transition:all 500ms ease;
	box-shadow:0 2px 4px rgba(0,0,0,.3);
	text-decoration:none
}
.video-list-thumbs h2{
	bottom: 0;
	font-size: 14px;
	height: 33px;
	margin: 8px 0 0;
}
.video-list-thumbs .glyphicon-play-circle{
    font-size: 60px;
    opacity: 0.6;
    position: absolute;
    right: 39%;
    top: 31%;
    text-shadow: 0 1px 3px rgba(0,0,0,.5);
}
.video-list-thumbs > li > a:hover .glyphicon-play-circle{
	color:#fff;
	opacity:1;
	text-shadow:0 1px 3px rgba(0,0,0,.8);
	transition:all 500ms ease;
}
.video-list-thumbs .duration{
	background-color: rgba(0, 0, 0, 0.4);
	border-radius: 2px;
	color: #fff;
	font-size: 11px;
	font-weight: bold;
	left: 12px;
	line-height: 13px;
	padding: 2px 3px 1px;
	position: absolute;
	top: 12px;
}
.video-list-thumbs > li > a:hover .duration{
	background-color:#000;
	transition:all 500ms ease;
}
@media (min-width:320px) and (max-width: 480px) { 
	.video-list-thumbs .glyphicon-play-circle{
    font-size: 35px;
    right: 36%;
    top: 27%;
	}
	.video-list-thumbs h2{
		bottom: 0;
		font-size: 12px;
		height: 22px;
		margin: 8px 0 0;
	}
}
</style>
<h3 style="text-align:center;"><img src="http://ww4.sinaimg.cn/large/8905ee52gw1f02g0c2bo3j200q00q0jb.jpg"/> 推荐视频</h3>
<ul class="list-unstyled video-list-thumbs row">
<?php

//You can see related documentation and compose own request here: https://developers.google.com/youtube/v3/docs/search/list
//You must enable Youtube Data API v3 and get API key on Google Developer Console(https://console.developers.google.com)

$channelId = $home_v;
$maxResults = 48;//首页视频显示数量，最多50
$API_key = $youtube_api;



//To try without API key: $video_list = json_decode(file_get_contents(''));
$video_list = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelId.'&maxResults='.$maxResults.'&key='.$API_key.''));

foreach($video_list->items as $item)
{
	    //Embed video
		if(isset($item->id->videoId)){
		
		
		
	echo '<li id="'. $item->id->videoId .'" class="col-lg-3 col-sm-6 col-xs-6 youtube-video">
		<a href="./video.php?v='. $item->id->videoId .'" target="_blank" title="'. $item->snippet->title .'">
			<img src="./thumbnail.php?vid='. $item->id->videoId .'" alt="'. $item->snippet->title .'" class="img-responsive" height="130px" />
			<h2>'. $item->snippet->title .'</h2>
			<span class="glyphicon glyphicon-play-circle"></span>
		</a>
	</li>
	';
	
		}
		//Embed playlist
		else if(isset($item->id->playlistId))
		{
			echo '<li id="'. $item->id->playlistId .'" class="col-lg-3 col-sm-6 col-xs-6 youtube-playlist">
		<a href="./video.php?v='. $item->id->playlistId .'" target="_blank" title="'. $item->snippet->title .'">
			<img src="./thumbnail.php?vid='. $item->id->videoId  .'" alt="'. $item->snippet->title .'" class="img-responsive" height="130px" />
			<h2>'. $item->snippet->title .'</h2>
			<span class="glyphicon glyphicon-play-circle"></span>
		</a>
	</li>
	';
		}

}


function videoListDisplayError()
{
	echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <i class="fa fa-exclamation-triangle"></i> Error while displaying videos!</div>';
}


?>
	
	
</ul>

<a href="http://ytchina.cf" target="_blank" class="btn btn-danger btn-lg">开发者官网</a>





</body>
</html>