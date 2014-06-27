<?php if(Yii::app()->user->hasFlash('posError')):?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('posError'); ?>
    </div>
<?endif?>

<?php $this->widget('ext.selgridview.SelGridView', array(
	'id'=>'page-grid',
//	'dataProvider'=>$model->search($ownerId),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows' => 2,
	'columns'=>array(
        array(
			'id' => 'selectedItems',
			'class' => 'CCheckBoxColumn',
        ),
		'id',
//		'src',
		'title',
		'alias',
		SGrid::dateAdded(),
		SGrid::dateUpdated(),
		array(
			'name' => 'block',
			'value' => '$data->getAdminOwnerBlock()'
		),
		array(
			'name' => 'subpage',
			'value' => '$data->getAdminOwnerLink()'
		),
		SGrid::isActive(),
		array('class'=>'AdminButtonColumn',),
	),
)); ?>