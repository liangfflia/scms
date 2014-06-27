<? JS::init('slider-grid')->delElements($this->delUrl)->search(); ?>

<h1>Manage Sliders</h1>

<? SHtml::searchText() ?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?$this->renderPartial('_grid', array('model'=>$model));?>

	<div>
            <? SHtml::button('del') ?>
	</div>

