<?php

/**
 * This is the model class for table "{{scms_parts}}".
 *
 * The followings are the available columns in table '{{scms_parts}}':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $dateAdded
 * @property string $dateUpdated
 * @property string $annotation
 * @property string $text
 * @property integer $ownerId
 * @property string $ownerClass
 * @property integer $position
 * @property integer $isActive
 */
class Part extends BaseModel
{
	
	protected 
		$_order = 'position';
	
	
	public 
		$resource;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Part the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{scms_parts}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, alias, ownerId', 'required'),
			array('ownerId, position, isActive', 'numerical', 'integerOnly'=>true),
			array('title, alias', 'length', 'max'=>255),
			array('annotation', 'length', 'max'=>500),
			array('ownerClass', 'length', 'max'=>127),
			array('dateAdded, dateUpdated, text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, alias, dateAdded, dateUpdated, annotation, text, ownerId, ownerClass, position, isActive', 'safe', 'on'=>'search'),
		);
	}

	
	public function getResourcesCount()
	{
		return Resource::model()->countByAttributes(array('ownerId'=>$this->id, 'ownerClass' => 'part'));
	}

	
	public function getAdminOwnerResLink()
	{
		echo '<a style="font-size: 18px;" href="/admin/resources/index/owner/'.$this->id.'/owner_class/part">[ '.$this->getResourcesCount().' ]</a>';
	}
	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'alias' => 'Alias',
			'dateAdded' => 'Date Added',
			'dateUpdated' => 'Date Updated',
			'annotation' => 'Annotation',
			'text' => 'Text',
			'ownerId' => 'Owner',
			'ownerClass' => 'Owner Class',
			'position' => 'Position',
			'isActive' => 'Is Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('dateAdded',$this->dateAdded,true);
		$criteria->compare('dateUpdated',$this->dateUpdated,true);
		$criteria->compare('annotation',$this->annotation,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('ownerId',Yii::app()->controller->_ownerId);
		$criteria->compare('ownerClass',Yii::app()->controller->_ownerClass,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('isActive',$this->isActive);

		$criteria->order = $this->_order;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}