<?Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/res/js/jq-ui-1.10.3.slider/css/ui-lightness/jq-ui-1.10.3.custom.min.css');?>

<?Yii::app()->clientScript->registerCoreScript('jquery');?>

<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/js/jq-ui-1.10.3.slider/jq-ui-1.10.3.custom.min.js', 2);?>
<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/js/jpaginator/jPaginator.js', 2);?>

<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/plugins/fancybox/source/jquery.fancybox.pack.js', 2);?>
<?Yii::app()->clientScript->registerScript('initFancybox', 'App.initJpaginator('.$currentPage.', '.$pages.');', 2);?>

<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/js/news.js', 2);?>
<?Yii::app()->clientScript->registerScript('news', 'News.init();', 2);?>

	<div class="row-fluid">
		<div class="span9">
		<div class="row-fluid">
			
			<!--<div class="headline"><h2><a href="/">Главная</a> / Новости</h2></div>-->

			<ul class="breadcrumb">
				<li style="font-size: 22px;"><a href="/">Главная</a> <span class="divider">/</span></li>
				<li class="active" style="font-size: 22px;">Новости</li>
			</ul>
			
				<div class="input-append  margin-bottom-20 margin-left20 span3">
					<input type="text" class="span11" placeholder="В разделе новостей">
					<button class="btn-u" type="button">Поиск</button>
				</div>
			<br>

				<div class="span6 margin-bottom-20">
					Сортировать:
					<button class="btn btn-small active" type="button">По дате</button>
					<button class="btn btn-small" type="button">По рейтингу</button>
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
						<div class="span11 bg-light lined_block booking-blocks">
							<h4 style="margin-bottom:-3px; margin-top:-3px;"><b><a href="<?=Yii::app()->baseUrl?>/новости/<?=$val->id?>/<?=urlencode($val->title)?>" class="underlined"><?=$val->title?></a></b></h4>
							<p>
								<?if(!empty($val->thumb)):?>
									<img class="lft-img-margin pull-left" src="<?=Yii::app()->baseUrl.'/'.$val->thumb?>" alt="">
								<?endif;?>
								<!--At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non similique sunt.-->
								<?=$val->annotation?>
							</p>
							<!--<nofollow><a href="#" onclick="return true;" class="btn btn-small favNews" data-id="<?=$val->id?>"><i class="icon-star"></i> </a></nofollow>-->
							<nofollow><a href="#" class="btn btn-small <?=in_array($val->id, $favedIds)?'favedNews':'favNews'?>" data-id="<?=$val->id?>"><i class="icon-star"></i> </a></nofollow>
							<nofollow><a href="<?=Yii::app()->baseUrl?>/новости/<?=$val->id?>/<?=urlencode($val->title)?>" class="btn btn-small"><i class="icon-book"></i> Читать</a></nofollow>
							<div style="float: right;">Комментариев: [ <?=$val->getCommentsCount()?> ]</div>
						</div>
					<?$i++;?>
					<?endforeach;?>
				<?endif;?>
			<!--</div>/row-fluid-->
			
			
			
		</div>
			
		<!--Pagination-->
		<div align="center">
			<div style="width:500px; margin-bottom: 40px;">
				<div class="pagination" id="test1"> <!-- pagination -->
					<!-- optional left control buttons --> 
					<nav id="test1_m_left"></nav><nav id="test1_o_left"></nav> 
					<div class="paginator_p_wrap" style="margin-top: 8px;"> 
						<div class='paginator_p_bloc'> 
							<!--<a class='paginator_p'></a> // page number : dynamically added --> 
						</div> 
					</div> 
					<!-- optional right control buttons --> 
					<nav id="test1_o_right"></nav><nav id="test1_m_right"></nav> 
					<!-- slider --> 
					<div class='paginator_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all'> 
						<a class='ui-slider-handle ui-state-default ui-corner-all' href='/news'></a> 
					</div> 
				</div>
			</div>
		</div>
		<!--End Pagination-->		
		
		</div><!--/span9-->
		<div class="span3">
			<div class="headline photoCats">
				<h3 style="margin-bottom: 20px; margin-left:10px;">Разделы</h3>
				<div style="margin-left: 15px; line-height: 30px;"><a href="/photo" class="style-color">Все</a></div>
				<div style="margin-left: 15px; line-height: 30px;"><a href="/photo/Обои" class="">Новости</a></div>
				<div style="margin-left: 15px; line-height: 30px;"><a href="/photo/Демотиваторы" class="">Фотогалерея</a></div>
				<div style="margin-left: 15px; line-height: 30px;"><a href="/photo/Демотиваторы" class="">Видеогалерея</a></div>
				<div style="margin-left: 15px; line-height: 30px;"><a href="/photo/Демотиваторы" class="">Статьи</a></div>
			</div>
		</div>
	</div>

<!--

Цвет ссылок в тексте: #016BCC;

!-->

<script>
$('.favNews').live('click', function(){
    var _this = $(this);
    var dataId = $(this).data('id');
    $.ajax({
	    type: 'POST',
	    dataType: 'html',
	    url: '/ajax/addfavnews',
	    'cache': false,
	    data: {favNews: 1, itemId: dataId, YII_CSRF_TOKEN: 1},
	    success:function(data){
			_this.css('color', '#F8BE2C');
			_this.removeClass('favNews');
			_this.addClass('favedNews');
//			return false;
	    }
    });
	return false;
});

$('.favedNews').live('click', function(){
    var _this = $(this);
    var dataId = $(this).data('id');
    $.ajax({
	    type: 'POST',
	    dataType: 'html',
	    url: '/ajax/delfavnews',
	    'cache': false,
	    data: {delFavNews: 1, itemId: dataId, YII_CSRF_TOKEN: 1},
	    success:function(data){
			_this.css('color', '');
			_this.removeClass('favedNews');
			_this.addClass('favNews');
//			return false;
	    }
    });
	return false;
});
</script>