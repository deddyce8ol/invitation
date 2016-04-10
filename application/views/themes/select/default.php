<!DOCTYPE html>
<?php $assets = base_url()."assets/themes/select/"; ?>
<html><head>
    <meta charset="utf-8">
    <title>PDS <?php echo $title; ?></title>
    <meta property="og:url"                content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Launching Pontianak Digital Stream" />
    <meta property="og:description"        content="Kami akan menyelenggarakan acara peresmian Pontianak Digital Stream (PDS), yaitu sebuah wadah dan gerakan yang diusung para penggiat teknologi lokal yang bertujuan untuk mewujudkan ekosistem pada bidang teknologi informasi di Pontianak." />
    <meta property="og:image"              content="<?php echo $assets;?>img/pontianak-digital-stream-com.jpg" />
    <!--pageMeta-->
    <!-- Loading Bootstrap -->
    <link href="<?php echo $assets;?>css/bootstrap.css" rel="stylesheet">
    <!-- Loading Elements Styles -->
    <link href="<?php echo $assets;?>css/style.css" rel="stylesheet">
    <!-- Loading Magnific-Popup Styles -->
    <link href="<?php echo $assets;?>css/magnific-popup.css" rel="stylesheet">
    <!-- Loading Font Styles -->
    <link href="<?php echo $assets;?>css/iconfont-style.css" rel="stylesheet">
    <!-- WOW Animate-->
    <link href="<?php echo $assets;?>scripts/animations/animate.css" rel="stylesheet">
    <!-- Datepicker Styles -->
    <link href="<?php echo $assets;?>css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- fontawsome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="icon" href="<?php echo $assets;?>images/favicons/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo $assets;?>images/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $assets;?>images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $assets;?>images/favicons/apple-touch-icon-114x114.png">
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="scripts/html5shiv.js"></script>
      <script src="scripts/respond.min.js"></script>
    <![endif]-->
    <!--headerIncludes-->
    <script src="<?php echo $assets;?>scripts/jquery-1.11.2.min.js"></script>
    <script src="<?php echo $assets;?>scripts/bootstrap.min.js"></script>
    <script src="<?php echo $assets;?>scripts/jquery.validate.min.js"></script>
    <script src="<?php echo $assets;?>scripts/smoothscroll.js"></script>
    <script src="<?php echo $assets;?>scripts/jquery.smooth-scroll.min.js"></script>
    <script src="<?php echo $assets;?>scripts/placeholders.jquery.min.js"></script>
    <script src="<?php echo $assets;?>scripts/animations/wow.min.js"></script>
    <script src="<?php echo $assets;?>scripts/custom.js"></script>

    <?php
        if(!empty($meta))
        foreach($meta as $name=>$content){
            echo "\n\t\t";
            ?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
                 }
        echo "\n";

        if(!empty($canonical))
        {
            echo "\n\t\t";
            ?><link rel="canonical" href="<?php echo $canonical?>" /><?php

        }
        echo "\n\t";

        foreach($css as $file){
            echo "\n\t\t";
            ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
        } 
        echo "\n\t";

        foreach($js as $file){
                echo "\n\t\t";
                ?><script src="<?php echo $file; ?>"></script><?php
        } 
        echo "\n\t";
    ?>

</head>

<body data-spy="scroll" data-target=".navMenuCollapse">
    <!--PRELOADER-->
    <div id="preloader">
        <div class="loading-data"></div>
    </div>
    <div id="wrap">
    <!-- NAVIGATION SOCIAL SHARE 2 -->
		<nav class="navbar bg-color1 dark-bg" src="<?php echo $assets;?>images/pds-white.png" style="color: rgb(255, 255, 255); box-shadow: none; background-color: rgb(204, 0, 0);">
			<div class="container"> 
				<a class="navbar-brand goto" href="<?php echo site_url('confirmation');?>" style="color: rgb(255, 255, 255); border-color: rgb(255, 255, 255); border-width: 0px; border-radius: 0px; font-size: 24px; background-color: rgba(0, 0, 0, 0);"><img width="30px" class="img-responsive" src="<?php echo $assets;?>images/pds-white.png">  EVENT PONTIANAK DIGITAL STREAM</a> 
				<button class="round-toggle navbar-toggle menu-collapse-btn collapsed" data-toggle="collapse" data-target=".navMenuCollapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<div class="collapse navbar-collapse navMenuCollapse">
					<ul class="share-list">
                            <li>
                                <a href="https://www.facebook.com/Pontianak-Digital-Stream-2000534073505311/" class="goodshare" data-type="fb" target="blank"><i class="icon icon-facebook2"></i><span data-counter="fb"></span></a>
                            </li>
                            <li>
                                <a href="#" class="goodshare" data-type="tw" target="blank"><i class="icon icon-twitter2"></i><span data-counter="tw"></span></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/ptkdigitalstream/" class="goodshare" data-type="ig" target="blank"><i class="icon icon-instagram" style="color: rgb(255, 255, 255); font-size: 14px; opacity: 1;" src="./images/logo.png" id="ui-id-6"></i><span data-counter="li"></span></a>
                            </li>
                        </ul>
				</div>
			</div>
		</nav>
        <?php echo $output;?>        
    </div>
    <!-- /#wrap -->
</body>
</html>