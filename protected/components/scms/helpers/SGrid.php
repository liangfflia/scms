<?php

class SGrid
{
    static public function isActive()
    {
	return	array(      
		    'name'=>'isActive',
		    'value'=>'($data->isActive==1)?"Да":"Нет"',
		    'filter' => CHtml::listData( array(
			array('id'=>1, 'isActive'=>'Да'),
			array('id'=>0, 'isActive'=>'Нет'),
		    ), 'id', 'isActive' ),
		);
    }
    
    
    static public function image( $field, $height = 80 )
    {
	return	array(      
		    'name'=>$field,
		    'type'=>'html',
		    'value'=>'(!empty($data->'.$field.'))?CHtml::image(Yii::app()->request->getBaseUrl(true)."/".$data->'.$field.',"",array("style"=>"height:'.$height.'px;")):"Нет Изображения"',
		);
    }
    
    
    static public function dateAdded()
    {
	return	array(
		    'name'=>'dateAdded',
		    'value'=>'SDate::get($data->dateAdded)',
		);
    }
    
    
    static public function dateUpdated()
    {
	return	array(
		    'name'=>'dateUpdated',
		    'value'=>'SDate::get($data->dateUpdated)',
		);
    }
    
    
	static public function ownerClass( $modelClass )
	{
		return array(
				'name'=>'ownerClass',
				'filter' => CHtml::listData( $modelClass::model()->getOwnerGridList(), 'id', 'ownerClass' ),
				'value' => $modelClass.'::model()->getOwnerGridValue($data->ownerClass);',
		);

	}
	
}