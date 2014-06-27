<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<!-- Mirrored from htmlstream.com/unify/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 12 Jul 2013 20:00:49 GMT -->
<head>
    <title><?=$this->pageTitle?></title>

	<?//php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$model->image,"image",array("width"=>200)); ?>
	
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/style.css">
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/headers/header1.css">
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/plugins/bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/style_responsive.css">
    <!--<link rel="shortcut icon" href="favicon.ico">-->        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/plugins/flexslider/flexslider.css" type="text/css" media="screen">    	
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/plugins/parallax-slider/css/parallax-slider.css" type="text/css">
    <!-- CSS Theme -->    
	<?if(isset(Yii::app()->request->cookies['themeColor']->value)):?>
		<?if(Yii::app()->request->cookies['themeColor'] == 'theme-default'):?>
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/default.css" id="style_color">
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/headers/header1-default.css" id="style_color-header-1">
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/res/js/jpaginator/jPaginator.default.css" id="style_color-pagination">
		<?endif;?>
		<?if(Yii::app()->request->cookies['themeColor'] == 'theme-red'):?>
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/red.css" id="style_color">
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/headers/header1-red.css" id="style_color-header-1">
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/res/js/jpaginator/jPaginator.red.css" id="style_color-pagination">
		<?endif;?>
		<?if(Yii::app()->request->cookies['themeColor']->value == 'theme-blue'):?>
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/blue.css" id="style_color">
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/headers/header1-blue.css" id="style_color-header-1">
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/res/js/jpaginator/jPaginator.blue.css" id="style_color-pagination">
		<?endif;?>
		<?if(Yii::app()->request->cookies['themeColor']->value == 'theme-orange'):?>
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/orange.css" id="style_color">
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/headers/header1-orange.css" id="style_color-header-1">
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/res/js/jpaginator/jPaginator.orange.css" id="style_color-pagination">
		<?endif;?>
		<?if(Yii::app()->request->cookies['themeColor']->value == 'theme-light'):?>
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/light.css" id="style_color">
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/headers/header1-light.css" id="style_color-header-1">
			<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/res/js/jpaginator/jPaginator.light.css" id="style_color-pagination">
		<?endif;?>
	<?else:?>
		<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/default.css" id="style_color">
		<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/themes/headers/header1-default.css" id="style_color-header-1">
		<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/res/js/jpaginator/jPaginator.default.css" id="style_color-pagination">
	<?endif;?>
		
	<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/res/css/custom.css">
	
	<?Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl.'/res/js/customTheme.js', 2);?>
	
</head>	
<?
if(!isset(Yii::app()->request->cookies['themeColor']->value))
{
	$cookie = new CHttpCookie('themeColor', 'theme-default');
	$cookie->expire = time() + (60*60*24*30*12);
	Yii::app()->request->cookies['themeColor'] = $cookie;
}
?>
<body>
	
<!--		<div align="center" style="display:none; position: fixed; width: 100%; z-index: 2000; background-color: #FFF; margin-left:0px;" class="lined_block" id="navMenu">
						<div class="nav top-2">
						<?//foreach($this->frontMenu as $elem):?>
                        <li class="active">
                        <span style="padding-left: 30px;">
                            <a href="<?//=$elem->url?>">
								<?//=$elem->title?>
                            </a>
                        </span>
						<?//endforeach;?>
						</div>
		</div>-->
	
<!--=== Style Switcher ===-->
<i class="style-switcher-btn icon-cogs"></i>
<a href="/fav" style="text-decoration: none;"><i class="fav-fixed-btn icon-star"></i></a>
<div class="style-switcher">
    <div class="theme-close"><i class="icon-remove"></i></div>
    <div class="theme-heading">Theme Colors</div>
    <ul class="unstyled">
		<li class="theme-default<?=(!isset(Yii::app()->request->cookies['themeColor']->value) || Yii::app()->request->cookies['themeColor']->value == 'theme-default')?' theme-active':''?>" data-style="default" data-header="light"></li>
        <li class="theme-blue<?=(Yii::app()->request->cookies['themeColor']->value == 'theme-blue')?' theme-active':''?>" data-style="blue" data-header="light"></li>
        <li class="theme-orange<?=(Yii::app()->request->cookies['themeColor']->value == 'theme-orange')?' theme-active':''?>" data-style="orange" data-header="light"></li>
        <li class="theme-red<?=(Yii::app()->request->cookies['themeColor']->value == 'theme-red')?' theme-active':''?>" data-style="red" data-header="light"></li>
        <li class="theme-light<?=(Yii::app()->request->cookies['themeColor']->value == 'theme-light')?' theme-active':''?>" data-style="light" data-header="light"></li>
    </ul>
</div><!--/style-switcher-->
<!--=== End Style Switcher ===-->    


<!--=== Slider ===-->
<div class="slider-inner">
    <div id="da-slider" class="da-slider" style="height: 275px;"> <!-- style="height: 300px;"  -->
		


        <nav class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>		
        </nav>
    </div><!--/da-slider-->
</div><!--/slider-->
<!--=== End Slider ===-->

<!--=== Header ===-->
<div class="header">
	
    <div class="container"> 
        <!-- Menu -->       
        <!-- Logo -->       
        <div class="logo">                                             
            <a href="index.html"><img alt="Logo" src="assets/img/logo1-default.png" id="logo-header"></a>
        </div><!-- /logo -->        
		
		<div style="height:70px;"></div>
		
		<!-- CONTENT PART -->
			<? echo $content; ?>
		<!-- //CONTENT -->
		
		
</div><!--/container-->		
<!-- End Content Part -->

<!--=== Copyright ===-->
<div class="copyright">
	<div class="container">
		<div class="row-fluid">
			<div class="span8">						
	            <p>2013 &copy; Unify. ALL Rights Reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
			</div>
			<div class="span4">
				<?if(isset(Yii::app()->request->cookies['themeColor']->value)):?>
					<?if(Yii::app()->request->cookies['themeColor']->value == 'theme-default'):?>
						<a href="index.html"><img id="logo-footer" src="<?=Yii::app()->request->baseUrl;?>/res/img/logo2-default.png" class="pull-right" alt="" /></a>
					<?endif;?>
					<?if(Yii::app()->request->cookies['themeColor']->value == 'theme-red'):?>
						<a href="index.html"><img id="logo-footer" src="<?=Yii::app()->request->baseUrl;?>/res/img/logo2-red.png" class="pull-right" alt="" /></a>
					<?endif;?>
					<?if(Yii::app()->request->cookies['themeColor']->value == 'theme-blue'):?>
						<a href="index.html"><img id="logo-footer" src="<?=Yii::app()->request->baseUrl;?>/res/img/logo2-blue.png" class="pull-right" alt="" /></a>
					<?endif;?>
					<?if(Yii::app()->request->cookies['themeColor']->value == 'theme-orange'):?>
						<a href="index.html"><img id="logo-footer" src="<?=Yii::app()->request->baseUrl;?>/res/img/logo2-orange.png" class="pull-right" alt="" /></a>
					<?endif;?>
					<?if(Yii::app()->request->cookies['themeColor']->value == 'theme-light'):?>
						<a href="index.html"><img id="logo-footer" src="<?=Yii::app()->request->baseUrl;?>/res/img/logo2-light.png" class="pull-right" alt="" /></a>
					<?endif;?>
				<?else:?>
					<a href="index.html"><img id="logo-footer" src="<?=Yii::app()->request->baseUrl;?>/res/img/logo2-default.png" class="pull-right" alt="" /></a>
				<?endif;?>
			</div>
		</div><!--/row-fluid-->
	</div><!--/container-->	
</div><!--/copyright-->	
<!--=== End Copyright ===-->

<!-- JS Global Compulsory -->			
<!--<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/res/js/jquery-1.8.2.min.js"></script>-->
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/res/js/modernizr.custom.js"></script>		
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/res/plugins/bootstrap/js/bootstrap.min.js"></script>	
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/res/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/res/plugins/parallax-slider/js/modernizr.js"></script>
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/res/plugins/parallax-slider/js/jquery.cslider.js"></script> 

<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/res/plugins/back-to-top.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/res/js/app.js"></script>
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/res/js/pages/index.js"></script>

<?Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/res/js/jpaginator/jPaginator.css');?>
<?Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/res/js/jpaginator/jPaginator.test1.css');?>

<script type="text/javascript">
    jQuery(document).ready(function() {
      	App.init();
        App.initSliders();
        Index.initParallaxSlider();
		
		var pos = 325;
		
		$(window).scroll(function() {
//			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			var scrollTop = $(window).scrollTop();

//			var menuPos = $('div.header').offset();
			
//			var pos = 275;
			if(scrollTop > pos) {
//				if(!$('.navbar').hasClass('fixed')) {
//					$('.navbar').removeClass('none_fixed');
//					$('.navbar').addClass('fixed');
					$('#navMenu').fadeIn();
			} else {
//				if($('.navbar').hasClass('fixed')) {
//					$('.navbar').removeClass('fixed');
//					$('.navbar').addClass('none_fixed');
					$('#navMenu').fadeOut();
			}
		});
		
    });
</script>
<!--[if lt IE 9]>
    <script src="assets/js/respond.js"></script>
<![endif]-->

Отработало за <?=sprintf('%0.5f',Yii::getLogger()->getExecutionTime())?> с. <br>
Скушано памяти max: <?=round(memory_get_peak_usage(true)/(1024*1024),2)."MB"?> <br>
Скушано памяти max: <?=round(memory_get_usage(true))."Байт"?> <br>

</body>
</html>	