<? JS::init('fav-grid')->delElements($this->delUrl)->move($this->upUrl, $this->downUrl)->search(); ?>

<h1>Manage Menu Elements</h1>

<? SHtml::searchText() ?>

<?$this->renderPartial('_grid', array('model'=>$model));?>

<div>
    <? SHtml::button('up,down,del') ?>
</div>
