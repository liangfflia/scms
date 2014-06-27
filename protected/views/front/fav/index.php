<?Yii::app()->clientScript->registerCoreScript('jquery');?>
   

<div class="row-fluid">
	<div class="span9">
<div class="headline"><h2>Избранное</h2></div>

                                <div class="input-append margin-bottom-20">
                                        <input type="text" class="span11" placeholder="По всему сайту">
                                        <button class="btn-u" type="button">Поиск</button>
                                </div>
                        <br>

	<?$slicedFavs = SArray::slice(3, $fields)?>
	<?foreach($slicedFavs as $arr):?>
		<div class="row-fluid margin-bottom-10">
		<?foreach($arr as $val):?>
			<div class="span4 bg-light lined_block"><!-- Just delete "bg-light" class to hide background color -->
					<h4><a href="<?=$val->alias?>" class="underlined"><?=$val->title?></a></h4>
					<?$stdField = $val->stdField?>
					<p>Всего Добавлено: <?=$fav->$stdField->count?></p>
					<p>Последняя: <?=$fav->$stdField->date?></p>
					<a href="<?=$val->alias?>" class="btn btn-small"><i class="icon-book"></i> Открыть</a>
			</div>
		<?endforeach;?>
		</div>
	<?endforeach;?>
		
	</div>
	<div class="span3">
		<div class="headline photoCats">
			<h3 style="margin-bottom: 20px; margin-left:10px;">Разделы</h3>
			<div style="margin-left: 15px; line-height: 30px;"><a href="/fav" class="style-color">Все</a></div>
			<?foreach($fields as $val):?>
				<div style="margin-left: 15px; line-height: 30px;"><a href="/<?=$val->alias?>" class=""><?=$val->title?></a></div>
			<?endforeach;?>
		</div>
	</div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
		
		var elementPos = $('.photoCats').offset();
		
		$(window).scroll(function() {
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
//			var pos = 366;
			var pos = elementPos.top - 7;
			if(scrollTop > pos) {
				if(!$('.photoCats').hasClass('fixed')) {
					$('.photoCats').addClass('fixed');
				}
			} else {
				if($('.photoCats').hasClass('fixed')) {
					$('.photoCats').removeClass('fixed');
				}
			}
		});
		
    });
</script>