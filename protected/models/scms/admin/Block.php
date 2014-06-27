<?php

/**
 * This is the model class for table "{{block}}".
 *
 * The followings are the available columns in table '{{block}}':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $text
 * @property string $dateAdded
 * @property string $dateUpdated
 * @property integer $ownerId
 * @property string $ownerClass
 * @property integer $position
 * @property integer $isActive
 */
class Block extends CActiveRecord
{
	
	public $subblock;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Blocks the static model class
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
		return '{{block}}';
	}

	
    public function behaviors()
	{
        return array(
            'positionBehavior' => array(
                'class' => 'PositionBehavior',
            ),
            'ownerBehavior' => array(
                'class' => 'OwnerBehavior',
            ),
            'dateBehavior' => array(
                'class' => 'DateBehavior',
            ),
        );
    }
	
	
	public function getOwnersCount()
	{
		return Block::model()->countByAttributes(array('ownerId'=>$this->id));
	}
	
	
	public function getBlocksCount()
	{
		return Block::model()->countByAttributes(array('ownerId'=>$this->id, 'ownerClass' => 'Block'));
	}
	
	
	public function getAdminOwnerLink()
	{
		echo '<a style="font-size: 18px;" href="/admin/blocks/index/owner/'.$this->id.'">[ '.$this->getOwnersCount().' ]</a>';
	}
	
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alias, position', 'required'),
			array('ownerId, position, isActive', 'numerical', 'integerOnly'=>true),
			array('title, alias', 'length', 'max'=>255),
			array('ownerClass', 'length', 'max'=>127),
			array('text, dateAdded, dateUpdated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, alias, text, dateAdded, dateUpdated, ownerId, ownerClass, position, isActive', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
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
			'text' => 'Text',
			'dateAdded' => 'Date Added',
			'dateUpdated' => 'Date Updated',
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
		$criteria->compare('text',$this->text,true);
		$criteria->compare('dateAdded',$this->dateAdded,true);
		$criteria->compare('dateUpdated',$this->dateUpdated,true);
		$criteria->compare('ownerId',Yii::app()->controller->_ownerId);
		$criteria->compare('ownerClass',Yii::app()->controller->_ownerClass,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('isActive',$this->isActive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}