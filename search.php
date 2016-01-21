<?php
require 'header.php';
$q=$_GET['q'];

$maxResults = 48;//每页显示数量 最大50
$API_key = $youtube_api;


if(strlen($_GET['pageid']) >1){
    $yesPage=$_GET['pageid'];
}else{
    $yesPage='';
};

$jsonurl='https://www.googleapis.com/youtube/v3/search?key='.$API_key.'&part=snippet&q='.$q.'&maxResults='.$maxResults.'&pageToken='.$yesPage.'&type=video';
//To try without API key: $video_list = json_decode(file_get_contents(''));
$video_list = json_decode(file_get_contents($jsonurl));
$nexts=$video_list->nextPageToken;//下一页参数
$prevs=$video_list->prevPageToken;//上一页参数

$nexturl='search.php?q='.$q.'&pageid='.$nexts;//下一页地址解析

?>
 <!-- Page Content -->
    <div class="container">
 <script src="js/jquery.js"></script>

 <style>
 /* Source: http://bootsnipp.com/snippets/featured/responsive-youtube-player */
 .vid {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 30px; height: 0; overflow: hidden;
}
 
.vid iframe,
.vid object,
.vid embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
 </style>
 
    <!-- Bootstrap Core JavaScript -->
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <div class="row">
            <div class="col-lg-12 text-center">
              
			  
                <div id="youtube-gallery"></div>
                <h3 style="text-align:center;"><strong>搜索:<?php echo $q;?></strong></h3>
<ul class="list-unstyled video-list-thumbs row">
				
			<?php
			
			foreach($video_list->items as $item)
{
	    //Embed video
		if(isset($item->id->videoId)){
		
		
		
	echo '<li id="'. $item->id->videoId .'" class="col-lg-3 col-sm-6 col-xs-6 youtube-video">
		<a href="video.php?v='. $item->id->videoId .'" title="'. $item->snippet->title .'" target="_blank">
			<img src="/thumbnail.php?vid='. $item->id->videoId .'" alt="'. $item->snippet->title .'" class="img-responsive" height="130px" />
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
		<a href="video.php?v='. $item->id->playlistId .'" title="'. $item->snippet->title .'" target="_blank>
			<img src="/thumbnail.php?vid='. $item->id->videoId  .'" alt="'. $item->snippet->title .'" class="img-responsive" height="130px" />
			<h2>'. $item->snippet->title .'</h2>
			<span class="glyphicon glyphicon-play-circle"></span>
		</a>
	</li>
	';
		}

}


function videoListDisplayError()
{
	
}


?></ul>
				
            </div>
            <?php 
            if(strlen($_GET['pageid']) >1){
echo '<span class="pull-left" style="padding-left:15px"><a href="search.php?q='.$q.'&pageid='.$prevs.'" class="btn btn-info btn-lg ">上一页</a></span>';           
            }else{
}; ?>
            <span class="pull-right" style="padding-right:15px"><a href="<?php echo $nexturl ?>"  class="btn btn-info btn-lg ">下一页</a></span>
		
   </div>
<?php require 'footer.php';?>
</html>