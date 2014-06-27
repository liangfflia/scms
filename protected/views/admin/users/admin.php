<? JS::init('user-grid')->delElements($this->delUrl)->search(); ?>

<h1>Manage Menu Elements</h1>

<? SHtml::searchText() ?>

<?$this->renderPartial('_grid', array('model'=>$model));?>

<div>
    <? SHtml::button('del') ?>
</div>
