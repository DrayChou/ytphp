<?php require_once'inc/info.php'; ?><!DOCTYPE html>
<html lang="zh-cn">

<head>

    <meta charset="utf-8">
	 <!--[if lt IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Magyar András">
    <meta name="keywords" content="<?php echo $keyw_ords;?>">
    <meta name="description" content="<?php echo $descr_iption;?>">
 
    <title><?php echo $title;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
 <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    
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
 #custom-search-form {
        margin:0;
        margin-top: 5px;
        padding: 0;
    }
 
    #custom-search-form .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
 
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-transition: width  0.2s ease-in-out;
    -moz-transition:width  0.2s ease-in-out;
    -o-transition: width  0.2s ease-in-out;
    transition: width  0.2s ease-in-out;
    }
 
    #custom-search-form button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    .search-query:focus + button {
        z-index: 3;   
    }   
    .search-query:focus{
        width: 260px;
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="z-index:1000">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fa fa-youtube"></i><?php echo $title; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">使用须知</a>
                    </li>
                    <li>
                        <a href="#">用户须知</a>
                    </li>
                    <li>
                        <a href="#">自定义</a>
                    </li>
                </ul>
        <div class="col-sm-3 col-md-3 pull-right">
        <form action="search.php" method="get" class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="搜Youtube" name="q" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
        </div>  
            </div>
          </div>
      
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    