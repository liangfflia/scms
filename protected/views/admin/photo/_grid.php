<?php if(Yii::app()->user->hasFlash('posError')):?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('posError'); ?>
    </div>
<?endif?>
<?php $this->widget('ext.selgridview.SelGridView', array(
	'id'=>'slider-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows' => 2,
	'columns'=>array(
        array(
			'id' => 'selectedItems',
			'class' => 'CCheckBoxColumn',
        ),
		'id',
		SGrid::image('thumb', 100),
//		SGrid::image('src', 100),
		'title',
		array(
			'name' => 'catId',
			'value' => '$data->category->title',
			'filter' => CHtml::listData( Category::model()->findAllByAttributes(array('ownerClass'=>'Photo')), 'id', 'title' ),
		),
		'text',
		SGrid::isActive(),
		array('class'=>'AdminButtonColumn',),
	),
)); ?>