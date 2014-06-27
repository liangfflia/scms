<?php if(Yii::app()->user->hasFlash('posError')):?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('posError'); ?>
    </div>
<?endif?>
<?php $this->widget('ext.selgridview.SelGridView', array(
	'id'=>'block-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows' => 2,
	'columns'=>array(
        array(
			'id' => 'selectedItems',
			'class' => 'CCheckBoxColumn',
        ),
		'position',
		'id',
		'title',
		SGrid::dateAdded(),
		array(
			'name' => 'subblock',
			'value' => '$data->getAdminOwnerLink()'
		),
		SGrid::isActive(),
		array(
			'class'=>'AdminButtonColumn',
		),
	),
)); ?>