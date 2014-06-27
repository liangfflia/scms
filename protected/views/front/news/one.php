<?Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/res/css/yii_main.css');?>

<?Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/res/plugins/fancybox/source/jquery.fancybox.css');?>
<?Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/res/css/effects.css');?>

<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/plugins/fancybox/source/jquery.fancybox.pack.js', 2);?>
<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/js/news.js', 2);?>
<?Yii::app()->clientScript->registerScript('initFancybox', 'App.initFancybox();', 2);?>

<?Yii::app()->clientScript->registerScript('news', 'News.init();', 2);?>

<?JS::init('commentElement')->delElement('news', 'ajaxdelcomment')?>

	<div class="row-fluid">

		<div class="span9">
		<div class="row-fluid">
			
			<!--<ul class="pull-right breadcrumb">-->
			<ul class="breadcrumb">
				<li style="font-size: 22px;"><a href="index.html">Главная</a> <span class="divider">/</span></li>
				<li style="font-size: 22px;"><a href="/news">Новости</a> <span class="divider">/</span></li>
				<li style="font-size: 22px;" class="active">Читать</li>
			</ul>
			
			<!--<div class="headline"><h2><a href="/">Главная / </a><a href="/news">Новости</a> / Читать</h2></div>-->

			<div class="span14">
			
				<div class="input-append  margin-bottom-20">
					<input type="text" class="span11" placeholder="В разделе новостей">
					<button class="btn-u" type="button">Поиск</button>
				</div>
			<br>
				
				
			<p>

<?php 
//$this->beginWidget('application.extensions.thumbnailer.Thumbnailer', array(
//        'thumbsDir' => 'images/news/thumbs',
//        'thumbWidth' => 400,
//    )
//); 
?>	

<div class="newsWrapper">
    <div class="imgZoomWrapper">
	<?=$data->description?>
    </div>

	<div><h4 style="margin-bottom:25px; margin-top:10px;"><b>Комментарии:</b></h4></div>
	<!--<form name="submitNewsComment" method="POST">-->
	    
	<?if($data->checkSpam()):?>
	
	    <?php $form = $this->beginWidget('CActiveForm', array(
		    'id'=>'comments-form',
		    'enableClientValidation'=>true,
		    'enableAjaxValidation'=>true,
		    'clientOptions'=>array('validateOnSubmit'=>true),
	    )); ?>

	    <?if(Yii::app()->user->role):?>
		<div>
		    <div style="margin-bottom: 15px;">
			<b>Пользователь: <?=Yii::app()->user->getName()?></b>
		    </div>
		    <?=$form->hiddenField($commentForm,'userId', array('value' => Yii::app()->user->id))?>
		    <?=$form->hiddenField($commentForm,'user', array('value' => Yii::app()->user->getName()))?>
		</div>
	    <?else:?>
		<div>
			<?=$form->error($commentForm,'user')?>
			<?=$form->textField($commentForm,'user', array('placeholder' => "Пользователь", 'class' => 'field span5'))?>
		</div>
	    <?endif;?>
	    <div>
		    <?=$form->error($commentForm,'text')?>
		    <?=$form->textArea($commentForm,'text', array('placeholder' => "Текст комментария", 'rows'=>6, 'class' => 'field span8'))?>
	    </div>
	
		<?php if(CCaptcha::checkRequirements()): ?>
		<div>
			<div class="error">
				<?=$form->error($commentForm,'verifyCode')?>
			</div>
			<?=$form->labelEx($commentForm,'verifyCode'); ?>
			<div>
			<?=Yii::app()->controller->widget("CCaptcha", array(), true);?>
			<?=$form->textField($commentForm,'verifyCode'); ?>
			</div>
		</div>
		<?php endif; ?>
	
	    <div>
		<button name="commentNews" class="btn-u">Отправить</button>
	    </div>
	    
	    <?php $this->endWidget(); ?>
	    
		<?else:?>
			<div style="margin-bottom: 30px;">
				Вы не можете оставлять комментарии 1 минуту в целях защиты от спама.
			</div>
		<?endif;?>
		
	<!--</form>-->
	<?if(!empty($comments)):?>
	<?$i=0;?>
	<?foreach($comments as $val):?>
		<div style="" class="span11 bg-light lined_block booking-blocks"><!-- Just delete "bg-light" class to hide background color -->
		    
			<?if(Yii::app()->user->role == 1):?>
			    <div align="right" class="commentElement" data-id="<?=$val->id?>" title="Удалить" style="float: right; margin-left:15px;"><a href="javascript://"><img src="/res/img/icons/delete.png"></a></div>
			    <div align="right" title="Редактировать" style="float: right; margin-left:15px;"><a href="<?=Yii::app()->baseUrl.'/admin/comments/default/update/id/'.$val->id?>"><img src="/res/img/icons/update.png"></a></div>
			<?endif;?>
			    <div align="right" style="float: right;"><?=SDate::get($val->dateAdded, 'd/m/Y H:i')?></div>
			<h4 style="margin-bottom:-3px; margin-top:-3px;"><b><?=$val->user?></b></h4>
			<p>
			    <?=$val->text?>
			</p>
			<!--<nofollow><a href="#" class="btn btn-small"><i class="icon-star"></i> В избранное</a></nofollow>-->
			<!--<nofollow><a href="<?//=Yii::app()->baseUrl?>/news/one/<?//=$val->id?>/<?//=urlencode($val->title)?>" class="btn btn-small"><i class="icon-book"></i> Читать</a></nofollow>-->
		</div>
	<hr>
	<?$i++;?>
	<?endforeach;?>
	<?else:?>
	    
	<?endif;?>
</div>
	

<?//$this->endWidget();?>

			</p>
			
			</div>
		</div><!--/row-fluid -->

		</div><!--/span9-->
		<div class="span3">
			<div class="posts margin-bottom-20">
				<?if(!empty($lastNews)):?>
					<div class="headline"><h3>Последние новости</h3></div>
					<?foreach($lastNews as $val):?>
						<dl class="dl-horizontal">
							<dt>
								<a href="<?=Yii::app()->baseUrl?>/news/one/<?=$val->id?>/<?=urlencode($val->title)?>">
									<?if(!empty($val->thumb) && is_file($val->thumb)):?>
										<img alt="" style="width:50px; height: 100%;" src="<?=Yii::app()->baseUrl.'/'.$val->thumb?>">
									<?endif;?>
								</a>
							</dt>
							<dd <?=(empty($val->thumb) || !is_file($val->thumb))?'style="margin-left: 10px;"':''?>>
								<p>
									<a href="<?=Yii::app()->baseUrl?>/news/one/<?=$val->id?>/<?=urlencode($val->title)?>">
										<?=$val->title?>
									</a>
								</p> 
							</dd>
						</dl>
					<?endforeach;?>
				<?endif;?>
            </div>
			
			<div class="headline"><h3>Еще что-то..</h3></div>
			что-то
		</div><!--/span3-->
</div><!--/row-fluid -->