<?Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/res/js/jq-ui-1.10.3.slider/css/ui-lightness/jq-ui-1.10.3.custom.min.css');?>

<?Yii::app()->clientScript->registerCoreScript('jquery');?>

<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/js/jq-ui-1.10.3.slider/jq-ui-1.10.3.custom.min.js', 2);?>

<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/plugins/fancybox/source/jquery.fancybox.pack.js', 2);?>

<? //echo CVarDumper::dump(Yii::app()->session['ratedNews'],10,true);?>

	<div class="row-fluid">
		<div class="span9">
		<div class="row-fluid">
			
			<!--<div class="headline"><h2><a href="/">Главная</a> / Новости</h2></div>-->

			<ul class="breadcrumb">
				<li style="font-size: 22px;"><a href="/">Главная</a> <span class="divider">/</span></li>
				<li class="active" style="font-size: 22px;">Новости</li>
			</ul>
				<form method="POST" name="search" action="">
					<div class="input-append  margin-bottom-20 margin-left20 span3">
						<input type="text" value="<?=$search?>" name="searchtext" class="span11" placeholder="В разделе новостей">
						<button class="btn-u" type="submit">Поиск</button>
					</div>
				</form>
			<br>

				<div class="span6 margin-bottom-20">
					Сортировать:
					<a href="/news" class="btn btn-small<?=(empty($sort))?' active':''?>" type="button">По дате</a>
					<a href="?sort=rating" class="btn btn-small<?=($sort=='rating')?' active':''?>" type="button">По рейтингу</a>
					<a href="?sort=name" class="btn btn-small<?=($sort=='name')?' active':''?>" type="button">По названию</a>
				</div>
			
			<style>
				/*a:link {text-decoration: none}*/ 
				/*a:visited {text-decoration: none; color: #660099}*/ 
				/*a:active {text-decoration: none}*/ 
				/*a:hover {text-decoration: none; background-color:yellow;color:blue}*/
			</style>
			
			<!-- Grid Options -->
			<!--<div class="row-fluid margin-bottom-10">-->
			
				<?if(!empty($news)):?>
					<?$i=1;?>
					<?foreach($news as $val):?>
						<!--<div style="background-color: <?=($i%2==0)?'#E5EAE5;':'#E5E5EA;'?>" class="span11 bg-light"> Just delete "bg-light" class to hide background color -->
						<div class="span11 bg-light lined_block">
							
						<div class="alert-message success ratedItem" style="display:none; width:230px;">
							<a href="#" class="close">×</a>
							<p>Спасибо! Ваш голос будет учтен.</p>
						</div>
							
						<div>
								<h4 style="margin-bottom:-3px; margin-top:-3px;"><b><a href="<?=Yii::app()->baseUrl?>/news/<?=$val->id?>" class="underlined"><?=$val->title?></a></b></h4>
							<p>
								<?if(!empty($val->thumb)):?>
									<img class="lft-img-margin pull-left" src="<?=Yii::app()->baseUrl.'/'.$val->thumb?>" alt="">
								<?endif;?>
								<!--At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non similique sunt.-->
								<?=$val->annotation?>
							</p>
							<!--<nofollow><a href="#" onclick="return true;" class="btn btn-small favNews" data-id="<?=$val->id?>"><i class="icon-star"></i> </a></nofollow>-->
							<nofollow><a href="#" class="btn btn-small <?=in_array($val->id, $favedIds)?'faved':'fav'?>" data-id="<?=$val->id?>"><i class="icon-star"></i> </a></nofollow>
							<nofollow><a href="<?=Yii::app()->baseUrl?>/news/<?=$val->id?>" class="btn btn-small"><i class="icon-book"></i> Читать</a></nofollow>
							<div style="float: right;">Комментариев: <?=$val->getCommentsCount()?></div>
							<div class="rates" style="float: right; margin-right: 10px;">
								Рейтинг:
								+<span class="positiveVal" style="color: green;"><?=--$val->positive?></span>
								-<span class="negativeVal" style="color: red;"><?=--$val->negative?></span>
							</div>
							
							<?if($val->dislike === null):?>
								<a href="#" data-id="<?=$val->id?>" class="like">+1</a>
								<a href="#" data-id="<?=$val->id?>" class="dislike">-1</a>
							<!--1-->
							<?elseif($val->dislike):?>
								<span style="color: red;" class="rated">-1</span>
							<!--0-->
							<?else:?>
								<span style="color: green;" class="green rated">+1</span>
							<?endif;?>
							
						</div>
						</div>
					<?$i++;?>
					<?endforeach;?>
				<?endif;?>
			<!--</div>/row-fluid-->
		</div>
			
		<!--Pagination-->
		<div class="pagination" align="center">
			<?$this->widget('SPager', array(
				'pages' => $paginator,
			))?>
		</div>
		<!--End Pagination-->
		
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
	</div>

<!--

Цвет ссылок в тексте: #016BCC;

!-->

<?JS::init('')->rating('News', 'rateNews')->fav('News', 'favNews');?>