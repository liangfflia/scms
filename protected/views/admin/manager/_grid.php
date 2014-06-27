<?php if(Yii::app()->user->hasFlash('posError')):?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('posError'); ?>
    </div>
<?endif?>
<?php $this->widget('ext.selgridview.SelGridView', array(
	'id'=>'manager-grid',
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
//		'group',
		array(
			'name'=>'group',
			'value'=>'$data->group',
			'filter' => CHtml::listData( Manager::model()->findAll(), 'group', 'group' ),
		),
		SGrid::isActive(),
		array('class'=>'AdminButtonColumn',),
	),
)); ?>