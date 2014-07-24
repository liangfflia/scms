<? JS::init('part-grid')->delElements($this->delUrl)->move($this->upUrl, $this->downUrl)->search(); ?>

<h1>Manage Menu Elements</h1>

<? SHtml::searchText() ?>

<div style="margin-top: 20px; font-size: 17px;">
	<?=Yii::app()->controller->getOwnBreadcrumbs()?>
</div>

<br>
<a href="/<?=Yii::app()->session->get('backPageUrl')?>"><?=Yii::app()->session->get('backPageName')?></a>

<?$this->renderPartial('_grid', array('model'=>$model));?>

<div>
    <? SHtml::button('up,down,del') ?>
</div>
