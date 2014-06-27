<? JS::init('#page-grid')->delElements($this->delUrl)->search(); ?>

<h1> Manage&nbsp;Pages</h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?$this->renderPartial('_grid', array('model'=>$model));?>

<div>
    <? SHtml::button('del'); ?>
</div>