<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="/res/admin/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="/res/admin/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?=$this->module->assetsUrl?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="/res/admin/css/main.css" />
	<link rel="stylesheet" type="text/css" href="/res/admin/form.css" />

    <link rel="stylesheet" href="/res/admin/bootstrap/css/bootstrap.css"/>
    <style type="text/css">
        body {
            /*padding-top: <?// echo empty($this->module->sectionMenu) ? '60px' : '96px'?>;*/
            padding-top: <?='96px'?>;
            /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link rel="stylesheet" href="/res/admin/bootstrap/css/bootstrap-responsive.css"/>
    <link rel="stylesheet" href="/res/admin/admin.css"/>
	
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<?php Yii::app()->clientScript->registerScriptFile('/res/admin/bootstrap/js/bootstrap.js'); ?>
    
	
        <?if($this->module->name == 'news'): ?>
        <script type="text/javascript" src="/res/js/main.js"></script>  
        <link rel="stylesheet" type="text/css" href="<?=$this->module->submoduleAssetsUrl ?>/css/main.css" />
        <?endif;?>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<? require_once Yii::getPathOfAlias('application').'/views/admin/admin/navbar.php' ?>
	
<div class="container" id="page">
	<div class="admin-wrapper">
		<?php echo $content;
               /*
                if(Yii::app()->user->checkAccess('moderator')){
                    echo "hello, I'm administrator";
                }
                else echo 'no!';
                */
                ?>
	</div>
</div><!-- page -->
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
</div><!-- footer -->
Отработало за <?=sprintf('%0.5f',Yii::getLogger()->getExecutionTime())?> с. <br>
Скушано памяти max: <?=round(memory_get_peak_usage(true)/(1024*1024),2)."MB"?> <br>
</body>
</html>
