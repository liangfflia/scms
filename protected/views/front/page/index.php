<?Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/res/js/jq-ui-1.10.3.slider/css/ui-lightness/jq-ui-1.10.3.custom.min.css');?>
<?Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/res/js/jpaginator/jPaginator.css');?>
<?Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/res/js/jpaginator/jPaginator.test1.css');?>

<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/js/jq-ui-1.10.3.slider/jq-ui-1.10.3.custom.min.js', 2);?>
<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/js/jpaginator/jPaginator-min.js', 2);?>

<?Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/res/plugins/fancybox/source/jquery.fancybox.pack.js', 2);?>
<?Yii::app()->clientScript->registerScript('initFancybox', 'App.initJpaginator();', 2);?>        

<div class="row-fluid">
	<div class="span9">
<div class="headline"><h2>Картинки На Рабочий Стол</h2></div>

<?

echo Yii::app()->controller->renderPage('asd', '/front/news/index');

$categories = array('Авто', 'Мото', 'Природа', 'Животные', 'Аниме', 'Приколы', 'Пейзажи', 'Спорт');

?>

                                <div class="input-append margin-bottom-20">
                                        <input type="text" class="span11" placeholder="По всему сайту">
                                        <button class="btn-u" type="button">Поиск</button>
                                </div>
                        <!-- Grid Options -->
                        <div class="row-fluid margin-bottom-10">
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Авто</a></h4>
                                </div>
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Мото</a></h4>
                                </div>
                        </div><!--/row-fluid-->
                        <div class="row-fluid margin-bottom-10">
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Природа</a></h4>
                                </div>
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Аниме</a></h4>
                                </div>
                        </div><!--/row-fluid-->
                        <div class="row-fluid margin-bottom-10">
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Фентези</a></h4>
                                </div>
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Оружие</a></h4>
                                </div>
                        </div><!--/row-fluid-->
                        <div class="row-fluid margin-bottom-10">
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Приколы</a></h4>
                                </div>
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">3D</a></h4>
                                </div>
                        </div><!--/row-fluid-->
                        <div class="row-fluid margin-bottom-10">
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Абстракция</a></h4>
                                </div>
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Девушки</a></h4>
                                </div>
                        </div><!--/row-fluid-->
                        <div class="row-fluid margin-bottom-10">
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Мужчины</a></h4>
                                </div>
                                <div class="span4 bg-light"><!-- Just delete "bg-light" class to hide background color -->
                                        <h4><a href="/html/new" class="underlined">Игры</a></h4>
                                </div>
                        </div><!--/row-fluid-->
		
	</div>
	<div class="clearfix"></div>
<div class="container">
	<!-- Service Blocks -->
	<!--/row-fluid-->
	<!-- //End Service Blocks -->
	
	<!-- Recent Works -->
	<div class="headline"><h3>Recent Works</h3></div>
    <ul class="thumbnails">
        <li class="span3">
			<div align="right"><a href="#" data-id="17" class="btn btn-small fav" style=""><i class="icon-star"></i> </a></div>
            <div class="thumbnail-style">
            	<div class="thumbnail-img">
                    <div class="overflow-hidden">
						<a href="#" title="BMW M3"><img src="res/img/news/bmw.jpg"></a>
					</div>
                </div>
            </div>
        </li>
        <li class="span3">
			<div align="right"><a href="#" data-id="17" class="btn btn-small fav" style=""><i class="icon-star"></i> </a></div>
            <!--<div class="thumbnail-style thumbnail-kenburn">-->
            <div class="thumbnail-style">
            	<div class="thumbnail-img">
                    <div class="overflow-hidden">
						<a href="#"><img alt="" src="res/img/news/bmw.jpg"></a>
					</div>
                </div>
            </div>
        </li>
        <li class="span3">
			<div align="right"><a href="#" data-id="17" class="btn btn-small fav" style=""><i class="icon-star"></i> </a></div>
            <div class="thumbnail-style">
            	<div class="thumbnail-img">
                    <div class="overflow-hidden">
						<a href="#"><img alt="" src="res/img/news/bmw.jpg"></a>
					</div>
                </div>
            </div>
        </li>
    </ul><!--/thumbnails-->
    <ul class="thumbnails">
        <li class="span3">
			<div align="right"><a href="#" data-id="17" class="btn btn-small fav" style=""><i class="icon-star"></i> </a></div>
            <div class="thumbnail-style">
            	<div class="thumbnail-img">
                    <div class="overflow-hidden">
						<a href="#"><img alt="Изображение" src="res/img/news/bmw.jpg"></a>
					</div>
                </div>
            </div>
        </li>
        <li class="span3">
			<div align="right"><a href="#" data-id="17" class="btn btn-small fav" style=""><i class="icon-star"></i> </a></div>
            <div class="thumbnail-style">
            	<div class="thumbnail-img">
                    <div class="overflow-hidden">
						<a href="#"><img alt="" src="res/img/news/bmw.jpg"></a>
					</div>
                </div>
            </div>
        </li>
        <li class="span3">
			<div align="right"><a href="#" data-id="17" class="btn btn-small fav" style=""><i class="icon-star"></i> </a></div>
            <div class="thumbnail-style">
            	<div class="thumbnail-img">
                    <div class="overflow-hidden">
						<a href="#"><img alt="" src="res/img/news/bmw.jpg"></a>
					</div>
                </div>
            </div>
        </li>
    </ul><!--/thumbnails-->
	
	<div class="clearfix"></div>
	<div class="input-append">
		<select class="span9">
			<?foreach($categories as $val):?>
				<option><?=$val?></option>
			<?endforeach;?>
		</select>
		<button class="btn" type="button">Перейти</button>
	</div>
	
</div>
</div>