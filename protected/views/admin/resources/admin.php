<? JS::init('resource-grid')->delElements($this->delUrl)->move($this->upUrl, $this->downUrl)->search(); ?>

<h1>Manage Menu Elements</h1>

<? SHtml::searchText() ?>
<a href="#">Add subcategory</a>
<?$this->renderPartial('_grid', array('model'=>$model));?>

<div>
    <? SHtml::button('up,down,del') ?>
</div>
